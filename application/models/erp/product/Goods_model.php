<?php

/**
 * User: kendo
 * Date: 2018/1/20
 */
class Goods_model extends CI_Model
{
    private $_table = 'erp_goods';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($goods_id = 0)
    {
        $goods = $this->db->get_where($this->_table, ['goods_id' => $goods_id])->row_array();
        if (empty($goods)) throw new Exception('请传入正确的货品ID');
        return $goods;
    }

    public function get_goods(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $this->db->select('g.goods_id,g.goods_name,g.goods_code,g.goods_keyword,g.feature_values');
        if (!empty($param['goods_code'])) {
            $this->db->where('g.goods_code', strtoupper($param['goods_code']));
        }
        if (!empty($param['product_code'])) {
            $this->db->where('p.product_code', strtoupper($param['product_code']));
        }
        if (!empty($param['goods_name'])) {
            $this->db->like('g.goods_name', $param['goods_name']);
        }
        if (!empty($param['product_name'])) {
            $this->db->like('p.product_name', $param['product_name']);
        }
        if (!empty($param['goods_keyword'])) {
            $this->db->where('json_search(g.goods_keyword,"one","' . $param['goods_keyword'] . '") is not null');
        }
        if (!empty($param['product_keyword'])) {
            $this->db->where('json_search(p.product_keyword,"one","' . $param['goods_keyword'] . '") is not null');
        }
        if (!empty($param['feature_values'])) {
            $this->db->where('json_search(g.feature_values,"one","' . intval($param['feature_values']) . '") is not null');
        }
        if (isset($param['goods_status']) && $param['goods_status'] !== '') {
            $this->db->where('g.goods_status', intval($param['goods_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $this->db->from($this->_table.' g');
        $this->db->join('erp_product p');
        $goods_list = $this->db->get()->result_array();
        if ($is_array) {
            return $goods_list;
        } else {
            $data = [];
            foreach ($goods_list as $goods) {
                $product['create_time'] = date('Y-m-d H:i:s', $goods['create_time']);
                $data[] = $goods;
            }
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($data, $result->num_rows);
        }
    }

    public function save_goods(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['goods_id'])) {
            $this->get($data['goods_id']);
            unset($data['product_id']);
            unset($data['goods_code']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        if (!empty($data['goods_keyword'])) {
            $data['goods_keyword'] = json_encode($data['goods_keyword']);
        }
        if (!empty($data['goods_desc'])) {
            $data['goods_desc'] = json_encode($data['goods_desc']);
        }
        if (!empty($data['feature_value_ids'])) {
            $data['feature_value_ids'] = json_encode($data['feature_value_ids']);
        }
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
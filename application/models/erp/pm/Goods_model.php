<?php

/**
 * 货品模型
 * User: kendo
 */
class Goods_model extends CI_Model
{
    private $_table = 'erp_goods';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('erp/pm/brand_model');
    }

    /**
     * 获取货品
     *
     * @param int $goods_id
     * @return array
     * @throws Exception
     */
    public function get($goods_id = 0)
    {
        $goods = $this->db->get_where($this->_table, ['goods_id' => $goods_id])->row_array();
        if (empty($goods)) throw new Exception('请传入正确的货品ID');
        return $goods;
    }

    /**
     * 获取货品列表
     * @param array $param
     * @param bool $need_array
     * @param bool $need_page
     * @param array $column
     * @return string
     * @throws Exception
     */
    public function get_goods(array $param, $need_array = TRUE, $need_page = TRUE, $column = [])
    {
        if (empty($column) || !is_array($column)) {
            $column = [
                'goods_id',
                'goods_code',
                'goods_name',
                'goods_short_name',
                'goods_keyword',
                'brand_id',
                'feature_ids',
                'create_time',
                'goods_status'
            ];
        }
        $this->db->select(join(',', $column));
        if (!empty($param['goods_code'])) {
            $this->db->where('goods_code', strtoupper($param['goods_code']));
        }
        if (!empty($param['goods_name'])) {
            $this->db->like('goods_name', $param['goods_name']);
        }
        if (!empty($param['goods_keyword'])) {
            $this->db->where('json_search(goods_keyword,"one","' . $param['goods_keyword'] . '") is not null');
        }
        if (isset($param['goods_status']) && $param['goods_status'] !== '') {
            $this->db->where('goods_status', intval($param['goods_status']));
        }
        if ($need_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $goods_list = $this->db->get($this->_table)->result_array();
        if ($need_array) {
            return $goods_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            foreach ($goods_list as &$goods) {
                if ($goods['brand_id'] > 0) {
                    $goods['brand_name'] = $this->brand_model->get($goods['brand_id'])['brand_name'];
                } else {
                    $goods['brand_name'] = '';
                }
                $goods['create_time'] = date('Y-m-d H:i:s', $goods['create_time']);
            }
            return send_list_json($goods_list, $result->num_rows);
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
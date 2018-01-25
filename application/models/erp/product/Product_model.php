<?php

/**
 * 产品模型
 * User: kendo
 */
class Product_model extends CI_Model
{
    private $_table = 'erp_product';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($product_id = 0)
    {
        $product = $this->db->get_where($this->_table, ['product_id' => $product_id])->row_array();
        if (empty($product)) throw new Exception('请传入正确的产品ID');
        return $product;
    }

    public function get_product(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $this->db->select('product_id,product_code,product_name,product_short_name,product_keyword,from_unixtime(create_time) create_time');
        if (!empty($param['product_id'])) {
            $this->db->where('product_id', intval($param['product_id']));
        }
        if (isset($param['product_status']) && $param['product_status'] !== '') {
            $this->db->where('product_status', intval($param['product_status']));
        }
        if (!empty($param['product_code'])) {
            $this->db->where('product_code', $param['product_code']);
        }
        if (!empty($param['product_name'])) {
            $this->db->like('product_name', $param['product_name']);
        }
        if (!empty($param['product_short_name'])) {
            $this->db->like('product_short_name', $param['product_short_name']);
        }
        if (!empty($param['product_desc'])) {
            $this->db->like('product_desc', $param['product_desc']);
        }
        if (!empty($param['brand_id'])) {
            $this->db->where('brand_id', intval($param['brand_id']));
        }
        if (!empty($param['product_keyword'])) {
            $this->db->where('json_search(product_key,"one","' . $param['product_keyword'] . '") is not null');
        }
        if (!empty($param['feature_ids'])) {
            $this->db->where('json_search(feature_ids,"one","' . intval($param['feature_ids']) . '") is not null');
        }
        if (!empty($param['category_ids'])) {
            $this->db->where('json_search(category_ids,"one","' . intval($param['category_ids']) . '") is not null');
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $product_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $product_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($product_list, $result->num_rows);
        }
    }

    public function save_product(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['product_id'])) {
            $this->get($data['product_id']);
            unset($data['product_code']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        if (!empty($data['product_keyword'])) {
            $data['product_keyword'] = json_encode($data['product_keyword']);
        }
        if (!empty($data['feature_ids'])) {
            $data['feature_ids'] = json_encode($data['feature_ids']);
        }
        if (!empty($data['category_ids'])) {
            $data['category_ids'] = json_encode($data['category_ids']);
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        $data['category_status'] = intval(isset($data['category_status']));
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
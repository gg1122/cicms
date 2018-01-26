<?php

/**
 * 购物车模型
 * User: kendo    2018/1/26
 */
class Shipping_cart_model extends CI_Model
{
    private $_table = 'erp_shipping_cart';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($cart_id = 0)
    {
        $cart = $this->db->get_where($this->_table, ['cart_id' => intval($cart_id)])->row_array();
        if (empty($cart)) throw new Exception('cart_id is not correct');
        return $cart;
    }

    public function get_cart(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        if (!empty($param['product_code'])) {
            $this->db->where('product_code', $param['product_code']);
        }
        if (!empty($param['supplier_id'])) {
            $this->db->where('supplier_id', intval($param['supplier_id']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $cart_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $cart_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($cart_list, $result->num_rows);
        }
    }

    public function save_cart(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['cart_id'])) {
            $this->get($data['cart_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
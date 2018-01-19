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
        if (!empty($param['prodcut_id'])) {
            $this->db->where('product_id', intval($param['prodcut_id']));
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


    }
}
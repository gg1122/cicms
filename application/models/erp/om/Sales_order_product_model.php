<?php

/**
 * 销售单商品模型
 * User: kendo    2018/1/26
 */
class Sales_order_product_model extends CI_Model
{
    private $_table = 'erp_sales_order_product';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id = 0)
    {
        $product = $this->db->get_where($this->_table, ['id' => intval($id)])->row_array();
        if (empty($product)) throw new Exception('sales product id is not correct');
        return $product;
    }

    public function get_product(array $param, $is_page = TRUE, $is_array = TRUE)
    {
    }
}
<?php

/**
 * 出库单商品模型
 *
 * User: kendo
 */
class Depot_out_product_model extends CI_Model
{
    private $_table = 'erp_depot_out_product';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_product(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (!empty($param['depot_out_code'])) {
            $this->db->where('depot_out_code', $param['depot_out_code']);
        }
        if (!empty($param['product_code'])) {
            $this->db->where('product_code', $param['product_code']);
        }
        if (isset($param['product_status']) && $param['product_status'] !== '') {
            $this->db->where('product_status', intval($param['product_status']));
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
}
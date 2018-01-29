<?php

/**
 * User: kendo    Date: 2018/1/21
 */
class Platform_order_model extends CI_Model
{
    private $_table = 'erp_platform_order';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_platform_order(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (!empty($param['shop_id'])) {
            $this->db->where('shop_id', intval($param['shop_id']));
        }
        $param_string = ['order_id', 'buyer_id', 'buyer_name', 'buyer_email', 'receipt_name', 'receipt_phone'];
        foreach ($param_string as $column) {
            if (!empty($param[$column])) {
                $this->db->where($column, $param[$column]);
            }
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $platform_order_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $platform_order_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($platform_order_list, $result->num_rows);
        }
    }
}
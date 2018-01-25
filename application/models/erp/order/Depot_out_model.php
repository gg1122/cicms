<?php

/**
 * User: kendo    Date: 2018/1/21
 */
class Depot_out_model extends CI_Model
{
    private $_table = 'erp_depot_out';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_depot_out(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $param_int = ['warehouse_id', 'transport_id', 'shop_id', 'order_status', 'flag_lable', 'depot_out_type'];
        foreach ($param_int as $column) {
            if (isset($param[$column]) && $param[$column] !== '') {
                $this->db->where($column, intval($param[$column]));
            }
        }
        $param_string = ['depot_out_code', 'tracking_number', ''];
        foreach ($param_string as $column) {
            if (isset($param[$column]) && $param[$column] !== '') {
                $this->db->where($column, $param[$column]);
            }
        }
        if (!empty($param['from_order'])) {
            $this->db->where('json_search("from_order","one","' . $param['from_order'] . '")');
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $depot_out_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $depot_out_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($depot_out_list, $result->num_rows);
        }
    }

    public function get_out_product()
    {

    }
}
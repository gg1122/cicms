<?php

/**
 * User: kendo    Date: 2018/1/21
 */
class Parcel_model extends CI_Model
{
    private $_table = 'erp_parcel';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($parcel_id = 0)
    {
        $parcel = $this->db->get_where($this->_table, intval($parcel_id));
        if (empty($parcel)) throw new Exception('请传入正确的包裹ID');
        return $parcel;
    }

    public function get_parcel(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $select_column = [
            'p.parcel_id',
            'p.parcel_code',
            'p.shop_id',
            'p.warehouse_id',
            'p.transport_id',
            'p.tracking_number',
            'p.weight_calc',
            'p.weight_actual',
            'p.parcel_status',
            'p.create_time',
            'p.parcel_time',
        ];
        $this->db->select(join(',', $select_column));
        $param_int = ['shop_id', 'warehouse_id', 'transport_id', 'parcel_status'];
        foreach ($param_int as $column) {
            if (isset($param[$column]) && $param[$column] !== '') {
                $this->db->where('p.' . $column, intval($param[$column]));
            }
        }
        if (!empty($param['parcel_code'])) {
            $this->db->where('p.parcel_code', $param['parcel_code']);
        }
        if (!empty($param['tracking_number'])) {
            $this->db->where('p.tracking_number', $param['tracking_number']);
        }
        if (!empty($param['order_id'])) {
            $this->db->where('po.order_id', $param['order_id']);
        }
        if (!empty($param['depot_out_code'])) {
            $this->db->where('po.depot_out_code', $param['depot_out_code']);
        }
        $this->db->from($this->_table . ' p');
        $this->db->join('erp_parcel_order po', 'p.parcel_code = po.parcel_code');
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $parcel_list = $this->db->get()->result_array();
        if ($is_array) {
            return $parcel_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($parcel_list, $result->num_rows);
        }
    }

    public function save_parcel()
    {

    }
}
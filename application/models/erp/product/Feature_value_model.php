<?php

/**
 * 规格值模型／特性值模型
 *
 * User: kendo
 */
class Feature_value_model extends CI_Model
{
    private $_table = 'erp_feature_value';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_feature_values(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $select_column = [
            'f.feature_name',
            'f.feature_id',
            'v.value_id',
            'v.value_name',
            'v.value_code',
            'v.value_status',
        ];
        $this->db->select(join(',', $select_column));
        $this->db->from($this->_table . ' v');
        $this->db->join('erp_feature f', 'v.feature_id = v.feature_id');
        if (!empty($param['feature_id'])) {
            $this->db->where('f.feature_id', intval($param['feature_id']));
        }
        if (!empty($param['feature_name'])) {
            $this->db->like('f.feature_name', $param['feature_name']);
        }
        if (!empty($param['value_code'])) {
            $this->db->like('v.value_code', $param['value_code']);
        }
        if (!empty($param['value_status'])) {
            $this->db->where('v.value_status', intval($param['value_status']));
        }
        if (!empty($param['feature_status'])) {
            $this->db->where('f.feature_status', intval($param['feature_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $value_list = $this->db->get()->result_array();
        if ($is_array) {
            return $value_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($value_list, $result->num_rows);
        }
    }
}
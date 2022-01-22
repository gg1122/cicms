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

    public function get($value_id = 0)
    {
        $feature_value = $this->db->get_where($this->_table, ['value_id' => intval($value_id)])->row_array();
        if (empty($feature_value)) throw new Exception('Feature_value id is not correct');
        return $feature_value;
    }

    /**
     * 获取规格值列表
     *
     * @param array $param
     * @param bool $need_array
     * @param bool $need_page
     * @param array $column
     * @return string
     */
    public function get_feature_value(array $param, $need_array = TRUE, $need_page = TRUE, $column = [])
    {
        $select_column = [
            'f.feature_name',
            'f.feature_id',
            'v.value_id',
            'v.value_name',
            'v.value_code',
            'v.value_status',
            'from_unixtime(v.create_time) create_time',
        ];
        if (!empty($column) && is_array($column)) {
            $select_column = $column;
        }
        $this->db->select(join(',', $select_column));
        $this->db->from($this->_table . ' v');
        $this->db->join('erp_feature f', 'v.feature_id = f.feature_id');
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
        if ($need_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $value_list = $this->db->get()->result_array();
        if ($need_array) {
            return $value_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($value_list, $result->num_rows);
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_feature_value(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['value_id'])) {
            $this->get($data['value_id']);
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        $info['feature_id'] = intval($data['feature_id']);
        $info['value_name'] = trim($data['value_name']);
        $info['value_code'] = trim($data['value_code']);
        $info['value_status'] = intval(isset($data['value_status']));
        if (isset($data['value_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['value_id' => intval($data['value_id'])]);
        } else {
            $done_status = $this->db->insert($this->_table, $info);
        }
        if ($done_status) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
<?php

/**
 * 规格模型／特性模型
 *
 * User: kendo
 */
class Feature_model extends CI_Model
{
    private $_table = 'erp_feature';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($feature_id = 0)
    {
        $feature = $this->db->get_where($this->_table, ['feature_id' => intval($feature_id)])->row_array();
        if (empty($feature)) throw new Exception('Feature id is not correct');
        return $feature;
    }

    public function get_feature(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        if (!empty($param['feature_name'])) {
            $this->db->like('feature_name', $param['feature_name']);
        }
        if (isset($param['feature_status']) && $param['feature_status'] !== '') {
            $this->db->where('feature_status', intval($param['feature_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $feature_list = $this->db->get()->result_array();
        if ($is_array) {
            return $feature_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($feature_list, $result->num_rows);
        }
    }

    public function save_feature(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['feature_id'])) {
            $this->get($data['feature_id']);
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

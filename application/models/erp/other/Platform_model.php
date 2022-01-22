<?php

/**
 * 多平台模型
 * User: kendo
 */
class Platform_model extends CI_Model
{
    private $_table = 'erp_platform';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($platform_id = 0)
    {
        $platform = $this->db->get_where($this->_table, ['platform_id' => intval($platform_id)])->row_array();
        if (empty($platform)) throw new Exception('platform id is not correct');
        return $platform;
    }

    public function get_platform(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        if (!empty($param['platform_type'])) {
            $this->db->where('platform_type', intval($param['platform_type']));
        }
        if (!empty($param['platform_code'])) {
            $this->db->where('platform_code', $param['platform_code']);
        }
        if (!empty($param['platform_name'])) {
            $this->db->like('platform_name', $param['platform_name']);
        }
        if (isset($param['platform_status']) && $param['platform_status'] !== '') {
            $this->db->where('platform_status', $param['platform_status']);
        }
        if (isset($param['autho_type']) && $param['autho_type'] !== '') {
            $this->db->where('autho_type', $param['autho_type']);
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $platform_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $platform_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($platform_list, $result->num_rows);
        }
    }

    public function save_platform(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['platform_id'])) {
            $this->get($data['platform_id']);
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
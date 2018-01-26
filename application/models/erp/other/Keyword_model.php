<?php

/**
 * 关键词词库模型
 * User: kendo
 */
class Keyword_model extends CI_Model
{
    private $_table = 'erp_keyword';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($key_id = 0)
    {
        $keyword = $this->db->get_where($this->_table, ['key_id' => intval($key_id)])->row_array();
        if (empty($keyword)) throw new Exception('key id is not correct');
        return $keyword;
    }

    public function get_keyword(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        if (!empty($param['type_name'])) {
            $this->db->like('type_name', $param['type_name']);
        }
        if (isset($param['key_status']) && $param['key_status'] !== '') {
            $this->db->where('key_status', intval($param['key_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $keyword_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $keyword_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($keyword_list, $result->num_rows);
        }
    }

    public function save_keyword(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['key_id'])) {
            $this->get($data['key_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        if (!empty($data['key_name'])) {
            $data['key_name'] = json_encode($data['key_name']);
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
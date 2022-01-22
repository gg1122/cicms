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

    /**
     * 获取关键词
     *
     * @param int $key_id
     * @return array
     * @throws Exception
     */
    public function get($key_id = 0)
    {
        $keyword = $this->db->get_where($this->_table, ['key_id' => intval($key_id)])->row_array();
        if (empty($keyword)) throw new Exception('key id is not correct');
        return $keyword;
    }

    /**
     * 获取关键词列表
     *
     * @param array $param
     * @param bool $need_array
     * @param bool $need_page
     * @param array $column
     * @return string
     */
    public function get_keyword(array $param, $need_array = TRUE, $need_page = TRUE, $column = [])
    {
        if (!empty($column) && is_array($column)) {
            $this->db->select(join(',', $column));
        } else {
            $this->db->select('key_id,key_name,key_pool,key_status,from_unixtime(create_time) create_time');
        }

        if (!empty($param['key_name'])) {
            $this->db->where('key_name', trim($param['key_name']));
        }
        if (!empty($param['key_pool'])) {
            $this->db->where('json_search(key_pool,"one","' . trim($param['key_pool']) . '") is not null');
        }
        if (isset($param['key_status']) && $param['key_status'] !== '') {
            $this->db->where('key_status', intval($param['key_status']));
        }
        if ($need_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $keyword_list = $this->db->get($this->_table)->result_array();
        if ($need_array) {
            return $keyword_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($keyword_list, $result->num_rows);
        }
    }

    /**
     * 保存关键词数据
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_keyword(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['key_id'])) {
            $this->get($data['key_id']);
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        if (!empty($data['key_name'])) {
            $info['key_name'] = trim($data['key_name']);
        }
        if (!empty($data['key_pool'])) {
            $info['key_pool'] = json_encode(array_filter(explode('|', trim($data['key_pool']))));
        }
        $info['update_time'] = $time;
        $info['update_userid'] = $user_id;
        $info['key_status'] = intval(isset($data['key_status']));
        if (isset($data['key_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['key_id' => intval($data['key_id'])]);
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
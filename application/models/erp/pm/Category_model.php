<?php

/**
 * 分类模型
 *
 * User: kendo
 */
class Category_model extends CI_Model
{
    private $_table = 'erp_category';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($category_id = 0)
    {
        $category = $this->db->get_where($this->_table, ['category_id' => intval($category_id)])->row_array();
        if (empty($category)) throw new Exception('Missing Record');
    }

    public function get_category(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->where('category_status', 1);
        return $this->db->get($this->_table)->result_array();
    }

    public function save_category(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['category_id'])) {
            $this->get($data['category_id']);
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
<?php

/**
 * 多平台产品模型
 * User: kendo
 */
class Platform_listing_model extends CI_Model
{
    private $_table = 'erp_platform_listing';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($list_id = 0)
    {
        $listing = $this->db->get_where($this->_table, ['list_id' => intval($list_id)])->row_array();
        if (empty($listing)) throw new Exception('list id is not correct');
        return $listing;
    }

    public function get_listing(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        if (!empty($param['shop_id'])) {
            $this->db->where('shop_id', intval($param['shop_id']));
        }
        if (!empty($param['listing_id'])) {
            $this->db->where('listing_id', $param['listing_id']);
        }
        if (!empty($param['listing_title'])) {
            $this->db->like('listing_title', $param['listing_title']);
        }
        if (isset($param['listing_status']) && $param['listing_status'] !== '') {
            $this->db->where('listing_status', intval($param['listing_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $listing_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $listing_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($listing_list, $result->num_rows);
        }
    }

    public function save_listing(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['list_id'])) {
            $this->get($data['list_id']);
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
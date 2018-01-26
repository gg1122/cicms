<?php

/**
 * 多平台商品模型
 * User: kendo
 */
class Platform_item_model extends CI_Model
{
    private $_table = 'erp_platform_item';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($item_id = 0)
    {
        $item = $this->db->get_where($this->_table, ['item_id' => intval($item_id)])->row_array();
        if (empty($item)) throw new Exception('item id is not correct');
        return $item;
    }

    public function get_item(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $this->db->from($this->_table . ' i');
        $this->db->join('erp_platform_listing l', 'i.list_id = l.list_id');
        if (!empty($param['shop_id'])) {
            $this->db->where('l.shop_id', intval($param['shop_id']));
        }
        if (!empty($param['listing_id'])) {
            $this->db->where('l.listing_id', $param['listing_id']);
        }
        if (!empty($param['listing_title'])) {
            $this->db->like('l.listing_title', $param['listing_title']);
        }
        if (!empty($param['item_sku'])) {
            $this->db->like('l.item_sku', $param['listing_title'], 'after');
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $item_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $item_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($item_list, $result->num_rows);
        }
    }

    public function save_item(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['item_id'])) {
            $this->get($data['item_id']);
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
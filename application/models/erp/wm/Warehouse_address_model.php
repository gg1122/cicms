<?php

/**
 * 仓库地址模型
 *
 * User: kendo
 */
class Warehouse_address_model extends CI_Model
{
    private $_table = 'erp_warehouse_address';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($address_id = 0)
    {
        $address = $this->db->get_where($this->_table, ['address_id' => intval($address_id)])->row_array();
        if (empty($address)) throw new Exception('请传入正确的仓库地址ID');
        return $address;
    }

    public function get_address(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (!empty($param['warehouse_code'])) {
            $this->db->where('warehouse_code', $param['warehouse_code']);
        }
        if (!empty($param['lang'])) {
            $this->db->where('lang', $param['lang']);
        }
        if (!empty($param['warehouse_name'])) {
            $this->db->where('warehouse_name', $param['warehouse_name']);
        }
        if (isset($param['address_status']) && $param['address_status'] !== '') {
            $this->db->where('address_status', intval($param['address_status']));
        }
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $address_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $address_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($address_list, $result->num_rows);
        }
    }

    public function save_address(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['address_id'])) {
            $this->get($data['address_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        $data['address_status'] = intval(isset($data['address_status']));
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
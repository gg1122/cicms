<?php

/**
 * 黑名单模型
 * User: kendo    2018/1/26
 */
class Poi_model extends CI_Model
{
    private $_table = 'erp_poi';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($poi_id = 0)
    {
        $poi = $this->db->get_where($this->_table, ['poi_id' => intval($poi_id)])->row_array();
        if (empty($poi)) throw new Exception('poi id is not correct');
        return $poi;
    }

    public function get_poi(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        if (!empty($param['platform_id'])) {
            $this->db->where('platform_id', intval($param['platform_id']));
        }
        if (!empty($param['poi_level'])) {
            $this->db->where('poi_level', intval($param['poi_level']));
        }
        if (isset($param['poi_status']) && $param['poi_status'] !== '') {
            $this->db->where('poi_status', intval($param['poi_status']));
        }
        if (!empty($param['buyer_id'])) {
            $this->db->where('buyer_id', $param['buyer_id']);
        }
        if (!empty($param['buyer_name'])) {
            $this->db->where('buyer_name', $param['buyer_name']);
        }
        if (!empty($param['buyer_email'])) {
            $this->db->where('buyer_email', $param['buyer_email']);
        }
        if (!empty($param['receipt_country_code'])) {
            $this->db->where('receipt_country_code', $param['receipt_country_code']);
        }
        if (!empty($param['receipt_phone'])) {
            $this->db->where('receipt_phone', $param['receipt_phone']);
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $poi_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $poi_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($poi_list, $result->num_rows);
        }
    }

    public function save_sync(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['poi_id'])) {
            $this->get($data['poi_id']);
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
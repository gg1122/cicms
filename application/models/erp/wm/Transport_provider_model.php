<?php

/**
 * 物流服务商模型
 *
 * User: kendo
 */
class Transport_provider_model extends CI_Model
{
    private $_table = 'erp_transport_provider';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($provider_id = 0)
    {
        $provider = $this->db->get_where($this->_table, ['provider_id' => intval($provider_id)])->row_array();
        if (empty($provider)) throw new Exception('请传入正确的物流服务商ID');
        return $provider;
    }

    public function get_provider(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('provider_id,provider_name,provider_website,provider_contact,provider_address,provider_status,from_unixtime(create_time) create_time');
        if (isset($param['provider_status']) && $param['provider_status'] !== '') {
            $this->db->where('provider_status', intval($param['provider_status']));
        }
        if (!empty($param['provider_name'])) {
            $this->db->like('provider_name', $param['provider_name']);
        }
        if (!empty($param['provider_contact'])) {
            $this->db->like('provider_contact', $param['provider_contact']);
        }
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $provider_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $provider_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($provider_list, $result->num_rows);
        }
    }
}
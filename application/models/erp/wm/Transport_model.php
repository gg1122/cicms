<?php

/**
 * 物流模型
 *
 * User: kendo    Date: 2018/1/23
 */
class Transport_model extends CI_Model
{
    private $_table = 'erp_transport';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($transport_id = 0)
    {
        $transport = $this->db->get_where($this->_table, ['transport_id' => intval($transport_id)])->row_array();
        if (empty($transport)) {
            throw new Exception('请传入正确的物流ID');
        }
        return $transport;
    }

    public function get_transport(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('transport_id,provider_name,provider_website,transport_code,transport_name,transport_status,from_unixtime(t.create_time) create_time');
        if (!empty($param['transport_code'])) {
            $this->db->where('t.transport_code', $param['transport_code']);
        }
        if (!empty($param['provider_name'])) {
            $this->db->like('p.provider_name', $param['provider_name']);
        }
        if (!empty($param['transport_name'])) {
            $this->db->like('t.transport_name', $param['transport_name']);
        }
        if (isset($param['transport_status']) && $param['transport_status'] !== '') {
            $this->db->where('transport_status', intval($param['transport_status']));
        }
        if (isset($param['provider_status']) && $param['provider_status'] !== '') {
            $this->db->where('provider_status', intval($param['provider_status']));
        }
        $this->db->from($this->_table . ' t');
        $this->db->join('erp_transport_provider p', 't.provider_id = p.provider_id');
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $transport_list = $this->db->get()->result_array();
        if ($is_array) {
            return $transport_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($transport_list, $result->num_rows);
        }
    }

    public function save_transport(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['transport_id'])) {
            $this->get($data['transport_id']);
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        $info['transport_code'] = $data['transport_code'];
        $info['transport_name'] = $data['transport_name'];
        $info['provider_id'] = intval($data['provider_id']);
        $info['transport_status'] = intval(isset($data['transport_status']));
        $info['transport_desc'] = $data['transport_desc'];
        $info['update_time'] = $time;
        $info['update_userid'] = $user_id;
        if (isset($data['transport_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['transport_id' => intval($data['transport_id'])]);
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
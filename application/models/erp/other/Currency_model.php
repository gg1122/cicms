<?php

/**
 * 货币模型
 *
 * User: kendo
 */
class Currency_model extends CI_Model
{
    private $_table = 'erp_currency';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($currency_id = 0)
    {
        $currency = $this->db->get_where($this->_table, ['currency_id' => intval($currency_id)])->row_array();
        if (empty($currency)) throw new Exception('Currency id is not correct');
        return $currency;
    }

    public function get_currency(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (!empty($param['currency_name'])) {
            $this->db->like('currency_name', $param['currency_name']);
        }
        if (!empty($param['currency_code'])) {
            $this->db->where('currency_code', $param['currency_code']);
        }
        if (isset($param['currency_status']) && $param['currency_status'] !== '') {
            $this->db->where('currency_status', intval($param['currency_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $currency_list = $this->db->get()->result_array();
        if ($is_array) {
            return $currency_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($currency_list, $result->num_rows);
        }
    }

    public function save_currency(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['currency_id'])) {
            $this->get($data['currency_id']);
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
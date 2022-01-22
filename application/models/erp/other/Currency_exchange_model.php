<?php

/**
 * 币种汇率模型
 *
 * User: kendo
 */
class Currency_exchange_model extends CI_Model
{
    private $_table = 'erp_cuccrency_exchange';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_currency_rate(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (!empty($param['exchange_from'])) {
            $this->db->where('exchange_from', $param['exchange_from']);
        }
        if (!empty($param['exchange_to'])) {
            $this->db->where('exchange_to', $param['exchange_to']);
        }
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $currency_rate_list = $this->db->get()->result_array();
        if ($is_array) {
            return $currency_rate_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($currency_rate_list, $result->num_rows);
        }
    }

    public function get_rate($exchange_from = '', $exchange_to = '')
    {
        $where = [
            'exchange_from' => $exchange_from,
            'exchange_to' => $exchange_to,
            'exchange_status' => 1,
        ];
        return $this->db->get_where($this->_table, $where)->row_array();
    }
}
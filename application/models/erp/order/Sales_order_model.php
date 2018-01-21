<?php
/**
 * User: kendo    Date: 2018/1/21
 */

class Sales_order_model extends CI_Model
{
    private $_table = 'erp_sales_order';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($sales_order_id = 0)
    {
        $sales_order = $this->db->get_where($this->_table, ['sales_order_id' => $sales_order_id])->row_array();
        if (empty($sales_order)) throw new Exception('请传入正确的销售单ID');
        return $sales_order;
    }

    public function get_sales_order(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (!empty($param['shop_id'])) {
            $this->db->where('shop_id', intval($param['shop_id']));
        }
        $param_string = ['sales_order_code', 'buyer_id', 'buyer_name', 'buyer_email', 'receipt_name', 'receipt_phone'];
        foreach ($param_string as $column) {
            if (!empty($param[$column])) {
                $this->db->where($column, $param[$column]);
            }
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $sales_order_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $sales_order_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($sales_order_list, $result->num_rows);
        }
    }

    public function save_sales_order(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['sales_order_id'])) {
            $this->get($data['sales_order_id']);
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
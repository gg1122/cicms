<?php

/**
 * 订单同步模型
 * User: kendo    2018/1/26
 */
class Platform_sync_model extends CI_Model
{
    private $_table = 'erp_platform_sync';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($sync_id = 0)
    {
        $sync = $this->db->get_where('sync_id', intval($sync_id))->row_array();
        if (empty($sync)) throw new Exception('sync_id is not correct');
        return $sync;
    }

    public function get_sync(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $select_column = [
            'sync_id',
            'shop_id',
            'order_id',
            'transport_id',
            'tracking_number',
            'sync_status',
            'done_status',
            'callback',
            'create_time',
        ];
        $this->db->select(join(',', $select_column));
        if (!empty($param['shop_id'])) {
            $this->db->where('shop_id', intval($param['shop_id']));
        }
        if (!empty($param['transport_id'])) {
            $this->db->where('transport_id', intval($param['shop_id']));
        }
        if (!empty($param['tracking_number'])) {
            $this->db->where('tracking_number', $param['tracking_number']);
        }
        if (!empty($param['order_id'])) {
            $this->db->where('order_id', $param['order_id']);
        }
        if (isset($param['shipment_status']) && $param['shipment_status'] !== '') {
            $this->db->where('shipment_status', intval($param['shipment_status']));
        }
        if (isset($param['sync_status']) && $param['sync_status'] !== '') {
            $this->db->where('sync_status', intval($param['sync_status']));
        }
        if (isset($param['done_status']) && $param['done_status'] !== '') {
            $this->db->where('done_status', intval($param['done_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $sync_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $sync_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($sync_list, $result->num_rows);
        }
    }

    public function save_sync(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['sync_id'])) {
            $sync = $this->get($data['sync_id']);
            if($sync['sync_status'] === 1){
                throw new Exception('can not update now');
            }
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
<?php

/**
 * 平台店铺模型／平台站点模型
 * User: kendo
 */
class Platform_shop_model extends CI_Model
{
    private $_table = 'erp_platform_shop';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($shop_id = 0)
    {
        $shop = $this->db->get_where($this->_table, ['shop_id' => intval($shop_id)])->row_array();
        if (empty($shop)) throw new Exception('shop id is not correct');
        return $shop;
    }

    public function get_shop(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $select_column = [
            'p.platform_id',
            'p.platform_name',
            'p.platform_type',
            's.shop_id',
            's.shop_code',
            's.shop_name',
            's.shop_url',
            's.api_status',
            's.shop_status',
        ];
        $this->db->select(join(',', $select_column));
        $this->db->from($this->_table . ' s');
        $this->db->join('erp_platform p', 's.platform_id = p.platform_id');
        if (!empty($param['platform_id'])) {
            $this->db->where('s.platform_id', intval($param['platform_id']));
        }
        if (!empty($param['shop_id'])) {
            $this->db->where('s.shop_id', intval($param['shop_id']));
        }
        if (!empty($param['platform_type'])) {
            $this->db->where('p.platform_type', intval($param['platform_type']));
        }
        if (!empty($param['platform_code'])) {
            $this->db->where('p.platform_code', $param['platform_code']);
        }
        if (!empty($param['platform_name'])) {
            $this->db->like('p.platform_name', $param['platform_name']);
        }
        if (isset($param['autho_type']) && $param['autho_type'] !== '') {
            $this->db->where('p.autho_type', $param['autho_type']);
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $shop_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $shop_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($shop_list, $result->num_rows);
        }
    }

    public function save_shop(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['shop_id'])) {
            $this->get($data['shop_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        if (!empty($data['shop_config'])) {
            $data['shop_config'] = json_encode($data['shop_config']);
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
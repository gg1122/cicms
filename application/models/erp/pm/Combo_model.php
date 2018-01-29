<?php

/**
 * User: kendo    Date: 2018/1/20
 */
class Combo_model extends CI_Model
{
    private $_table = 'erp_combo';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($combo_id = 0)
    {
        $goods = $this->db->get_where($this->_table, ['combo_id' => $combo_id])->row_array();
        if (empty($goods)) throw new Exception('请传入正确的套装ID');
        return $goods;
    }

    public function get_combo(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('combo_id,combo_sku,combo_title,combo_status,from_unixtime(create_time) create_time');
        if (!empty($param['combo_sku'])) {
            $this->db->where('combo_sku', $param['combo_sku']);
        }
        if (!empty($param['combo_title'])) {
            $this->db->like('combo_title', $param['combo_title']);
        }
        if (!empty($param['combo_status'])) {
            $this->db->where('combo_status', intval($param['combo_status']));
        }
        if (!empty($param['combo_desc'])) {
            $this->db->like('combo_desc', $param['combo_desc']);
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $combo_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $combo_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($combo_list, $result->num_rows);
        }
    }

    public function save_combo(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['combo_id'])) {
            $this->get($data['combo_id']);
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
<?php

/**
 * 品牌模型
 *
 * User: kendo
 */
class Brand_model extends CI_Model
{
    private $_table = 'erp_brand';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($brand_id = 0)
    {
        $brand = $this->db->get_where($this->_table, ['brand_id' => intval($brand_id)])->row_array();
        if (empty($brand)) throw new Exception('请传入争取的品牌ID');
        return $brand;
    }

    public function get_brand(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('brand_id,brand_code,brand_website,brand_logo,brand_status,create_time');
        if (!empty($param['brand_name'])) {
            $this->db->like('brand_name', $param['brand_name']);
        }
        if (!empty($param['brand_code'])) {
            $this->db->like('brand_code', $param['brand_code']);
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $brand_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $brand_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($brand_list, $result->num_rows);
        }
    }

    public function save_brand(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['brand_id'])) {
            $this->get($data['brand_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        $data['category_status'] = intval(isset($data['category_status']));
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
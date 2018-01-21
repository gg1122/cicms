<?php
/**
 * User: kendo    Date: 2018/1/21
 */

class Combo_goods extends CI_Model
{
    private $_table = 'erp_combo_goods';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_combo_goods(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('cg.goods_code,cg.g.goods_quantity,c.combo_sku,c.combo_title,g.goods_name');
        if (!empty($param['combo_sku'])) {
            $this->db->where('cg.combo_sku', $param['combo_sku']);
        }
        if (!empty($param['goods_code'])) {
            $this->db->where('cg.goods_code', $param['goods_code']);
        }
        if (!empty($param['combo_title'])) {
            $this->db->like('c.combo_title', $param['combo_title']);
        }
        if (!empty($param['goods_name'])) {
            $this->db->like('g.goods_name', $param['goods_name']);
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $combo_goods_list = $this->db->get($this->_table)->result_array();
        if ($is_array) {
            return $combo_goods_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($combo_goods_list, $result->num_rows);
        }
    }
}
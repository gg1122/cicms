<?php
/**
 * 费用类型模型
 *
 * User: kendo
 */
class Fee_type_model extends CI_Model{
    private $_table = 'erp_fee_type';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($type_id = 0){
        $fee_type = $this->db->get_where($this->_table.['type_id' => intval($type_id)])->row_array();
        if(empty($fee_type))throw new Exception('Feetype id is not correct');
    }

    public function get_fee_type(array $param, $is_page = TRUE, $is_array = TRUE){
        if(!empty($param['type_name'])){
            $this->db->like('type_name',$param['type_name']);
        }
        if(isset($param['type_status']) && $param['type_status'] !== ''){
            $this->db->where('type_status',intval($param['type_status']));
        }
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $type_list = $this->db->get()->result_array();
        if ($is_array) {
            return $type_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($type_list, $result->num_rows);
        }
    }

    public function save_fee_type(array $data){
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['type_id'])) {
            $this->get($data['type_id']);
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
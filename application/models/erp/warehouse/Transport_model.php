<?php

/**
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

    public function get($transport_id = 0){
        $transport = $this->db->get_where($this->_table,['transport_id' => intval($transport_id)])->row_array();
        if(empty($transport)){
            throw new Exception('请传入正确的物流ID');
        }
        return $transport;
    }

    public function get_transport(array $param,$is_array = TRUE,$is_page = TRUE){
    }
}
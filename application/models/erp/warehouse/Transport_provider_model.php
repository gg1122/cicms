<?php
/**
 * 物流服务商模型
 *
 * User: kendo
 */
class Transport_provider_model extends CI_Model{
    private $_table = 'erp_transport_provider';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($provider_id = 0 ){
        $provider = $this->db->get_where($this->_table,['provider_id' => intval($provider_id)])->row_array();
        if(empty($provider))throw new Exception('请传入正确的物流服务商ID');
        return $provider;
    }

    public function get_provider(array $param,$is_array = TRUE,$is_page = TRUE){

    }
}
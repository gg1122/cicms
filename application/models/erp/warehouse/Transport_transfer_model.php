<?php
/**
 * User: kendo    2018/1/29
 */
class Transport_transfer_model extends CI_Model{
    private $_table = 'erp_transport_transfer';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/warehouse/transport_model');
    }

}
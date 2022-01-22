<?php

/**
 * User: kendo    2018/1/29
 */
class Worker_model extends CI_Model
{
    private $_table = 'sys_worker';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($worker_id = 0){
        $worker = $this->db->get_where($this->_table,['worker_id' => intval($worker_id)])->row_array();
        if(empty($worker))throw new Exception('worker id is not correct');
        return $worker;
    }

    public function get_worker(){}
}
<?php

/**
 * 系统资源版本
 *
 * User: kendo
 */
class Version_model extends CI_Model
{
    private $_model = 'sys_version';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_version_list(){
        return $this->db->get_where($this->_model)->result_array();
    }
}
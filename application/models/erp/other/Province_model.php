<?php

/**
 * 省份模型
 *
 * User: kendo
 */
class Province_model extends CI_Model
{
    private $_table = 'erp_province';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_province()
    {
        return $this->db->get($this->_table)->result_array();
    }
}
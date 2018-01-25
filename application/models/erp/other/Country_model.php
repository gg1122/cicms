<?php

/**
 * 国家模型
 *
 * User: kendo
 */
class Country_model extends CI_Model
{
    private $_table = 'erp_country';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_country()
    {
        return $this->db->get($this->_table)->reuslt_array();
    }
}
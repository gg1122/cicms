<?php

/**
 * 城市模块
 *
 * User: kendo
 */
class City_model extends CI_Model
{
    private $_table = 'erp_city';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_city(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        return $this->db->get($this->_table)->result_array();
    }
}
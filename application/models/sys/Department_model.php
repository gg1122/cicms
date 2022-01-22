<?php

/**
 * User: kendo    2018/1/29
 */
class Department_model extends CI_Model
{
    private $_table = 'sys_department';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
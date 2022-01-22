<?php

/**
 * User: kendo    2018/1/29
 */
class User_login_log_model extends CI_Model
{
    private $_table = 'sys_user_log';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
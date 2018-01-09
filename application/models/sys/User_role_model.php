<?php

/**
 * 系统用户-角色
 *
 * User: kendo
 */
class User_role_model extends CI_Model
{
    private $_model = 'sys_user_role';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_role(){}
}
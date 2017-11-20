<?php

/**
 * 前端控制器，不用走登录验证逻辑
 *
 * User: kendo
 */
class Front extends CI_Controller
{
    public $need_login = FALSE;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys/user_model');
    }

    public function logout()
    {
        logout();
    }

    public function isLogin()
    {
        $user_data = $this->session->get_userdata();
        if (isset($user_data['user_name']) && isset($user_data['expire_time']) && $user_data['expire_time'] >= time()) {
            exit(json_encode(array('status' => TRUE)));
        } else {
            exit(json_encode(array('status' => FALSE)));
        }
    }
}
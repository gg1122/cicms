<?php

/**
 * User: kendo
 */
class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys/user_model');
    }

    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('loginname', 'LoginName', 'required');
        $this->form_validation->set_rules('loginpwd', 'LoginPwd', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = '登录页面';
            $this->load->view('sys/login', $data);
        } else {
            $this->user_model->login();
        }
    }
}
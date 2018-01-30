<?php

/**
 * 控制权限类
 *
 * 潮馆
 * User: kendo
 */
class Acl
{
    private $_ci;
    private $_model;
    private $_method;


    public function acl_control()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->library('session');
        $route = $this->_ci->uri->uri_string();
        $session = $this->_ci->session->get_userdata()['user_id'];
        $this->_ci->load->model('sys/user_model');
        if($this->_ci->user_model->login())
    }



}
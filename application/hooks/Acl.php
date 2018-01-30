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
        $route = $this->_ci->uri->uri_string();
        if(!empty($route)){
            $white_list = $this->_ci->config->item('white_list');
            if(!empty($white_list) && in_array(strtolower($route),$white_list)){
                return true;
            }
            $this->_ci->load->library('session');
            $user_id = $this->_ci->session->get_userdata()['user_id'];
            $this->_ci->load->model('sys/user_model');
            $this->_ci->user_model->check_acl($user_id,$route);
        }
    }
}
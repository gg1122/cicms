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
        $this->_model = $this->_ci->uri->segment(1);
        $this->_method = $this->_ci->uri->segment(2);
    }



}
<?php

/**
 * 角色管理
 *
 * User: kendo
 */
class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper('url');
    }

    /**
     * 角色列表
     */
    public function index()
    {

    }

    /**
     * 新增角色
     */
    public function create()
    {

    }

    /**
     * 更新角色
     */
    public function update()
    {

    }


}
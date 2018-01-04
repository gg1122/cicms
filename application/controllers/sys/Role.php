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
        $this->load->model('sys/role_model');
        $this->load->helper('url');
    }

    /**
     * 角色列表
     */
    public function index()
    {
        $data['title'] = '角色列表';
        if (!empty($this->input->get())) {
            exit($this->role_model->get_role($this->input->get(), 'json'));
        }
        $this->load->view('sys/role/index', $data);
    }

    /**
     * 新增角色
     */
    public function create()
    {
        print_r($_SERVER);

//        $this->load->view('sys/);
    }

    /**
     * 更新角色
     */
    public function update()
    {

    }


}
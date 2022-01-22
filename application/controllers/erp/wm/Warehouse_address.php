<?php

/**
 * 仓库地址管理
 *
 * User: kendo    2018/1/30
 */
class Warehouse_address extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/warehouse_address');
    }

    /**
     * 仓库地址列表
     */
    public function index()
    {

    }

    /**
     * 新增仓库地址
     */
    public function create()
    {

    }

    /**
     * 更新仓库地址
     */
    public function update()
    {

    }

    /**
     * 变更仓库地址状态
     */
    public function change_status()
    {

    }
}
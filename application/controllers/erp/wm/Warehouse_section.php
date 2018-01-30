<?php

/**
 * 仓库区域管理
 *
 * User: kendo
 */
class Warehouse_section extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/warehouse_section_model');
    }

    /**
     * 仓库区域列表
     */
    public function index()
    {

    }

    /**
     * 新增仓库区域
     */
    public function create()
    {

    }

    /**
     * 更新仓库区域
     */
    public function update()
    {

    }

    /**
     * 变更仓库区域状态
     */
    public function change_status()
    {

    }
}
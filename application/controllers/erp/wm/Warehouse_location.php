<?php

/**
 * 库位管理
 *
 * User: kendo    2018/1/30
 */
class Warehouse_location extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/warehouse_location');
    }

    /**
     * 库位列表
     */
    public function index()
    {

    }

    /**
     * 新增库位
     */
    public function create()
    {

    }

    /**
     * 更新库位
     */
    public function update()
    {
    }

    /**
     * 变更库位状态
     */
    public function change_status()
    {

    }
}
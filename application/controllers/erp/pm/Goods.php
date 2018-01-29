<?php

/**
 * 货品管理
 * User: kendo    Date: 2018/1/29
 */
class Goods extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/goods_model');
    }

    /**
     * 货品列表
     */
    public function index()
    {

    }

    /**
     * 新增货品
     */
    public function create()
    {

    }

    /**
     * 更新货品
     */
    public function update()
    {
    }

    public function export()
    {
    }
}
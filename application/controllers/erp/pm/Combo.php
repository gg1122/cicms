<?php

/**
 * 套装管理
 *
 * User: kendo    2018/1/30
 */
class Combo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/combo_model');
    }

    /**
     * 套装列表
     */
    public function index()
    {
    }

    /**
     * 新增套装
     */
    public function create()
    {
    }

    /**
     * 更新套装
     */
    public function update()
    {
    }
}
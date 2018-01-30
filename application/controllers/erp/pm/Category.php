<?php

/**
 * 分类管理
 *
 * User: kendo    2018/1/30
 */
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/category_model');
    }

    /**
     * 分类列表
     */
    public function index()
    {
    }

    /**
     * 新增分类
     */
    public function create()
    {
    }

    /**
     * 更新分类
     */
    public function update()
    {

    }
}
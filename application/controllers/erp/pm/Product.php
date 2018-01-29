<?php

/**
 * 商品管理
 * User: kendo    Date: 2018/1/29
 */
class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/product_model');
    }

    /**
     * 商品列表
     */
    public function index()
    {

    }

    /**
     * 新增商品
     */
    public function create()
    {
    }

    /**
     * 更新商品
     */
    public function update()
    {
    }
}
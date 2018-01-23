<?php

/**
 * 物流方式管理
 *
 * User: kendo    Date: 2018/1/23
 */
class Transport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 物流方式首页
     */
    public function index()
    {

        $this->load->view();
    }

    /**
     * 新增物流方式
     */
    public function create()
    {

    }

    /**
     * 更新物流方式
     */
    public function update()
    {
    }

}
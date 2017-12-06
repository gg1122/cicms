<?php

/**
 * 测试页面
 *
 * User: kendo
 */
class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $a = $this->menu_model->get_module();
        print_r($a);
    }
}

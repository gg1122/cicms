<?php

/**
 * User: kendo
 */
class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper('url');
    }

    public function index()
    {
//        $a = $this->menu_model->get_module('sys/menu');
        $a = $this->menu_model->get_module('');
        print_r($a);die;

        $ob = new ReflectionClass($this->menu_model);

        $doc = $ob->getDocComment();
        $method_list = $ob->getMethods();
        foreach ($method_list as $item){
            echo $item->getName(),PHP_EOL;
//            echo $item->getDocComment(),PHP_EOL;
        }
        die;
        $list = $this->menu_model->get_module('sys/Menu');
        print_r($list);
    }
}

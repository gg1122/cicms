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
        $this->load->library('cache');
        $this->ca
        echo strlen($this->encryption->create_key(16));

        die;
        //echo $this->config->base_url();die;
        $this->load->library('calendar',$pref);
        echo $this->calendar->generate($this->uri->segment(3),$this->uri->segment(4));
        die;
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

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
        $files = glob(APPPATH.'controllers/*');
        $module_list = array();
        if (!empty($files)) {
            foreach ($files as $item){
                if(is_dir($item)){
                    $php_list = glob($item.'/*.php');
                    if(!empty($php_list)){
                        foreach ($php_list as $php){
                            include_once $php;
                            print_r(get_class_methods('Menu'));die;
                        }
                    }
                }else{
                    include_once $item;
                }
            }
        }
        print_r($module_list);
    }

}
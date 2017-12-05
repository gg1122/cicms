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
        $this->load->helper('captcha');
        $vals = array(
//            'word'      => 'Random word',
            'img_path'  => APPPATH.'/captcha/',
            'img_url'   => site_url().'/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => 100,
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size' => 50,
            'img_id'    => 'Imageid',
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap =  create_captcha($vals);
//        echo $cap['image'];
    }
}

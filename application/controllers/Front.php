<?php

/**
 * 前端控制器，不用走登录验证逻辑
 *
 * User: kendo
 */
class Front extends CI_Controller
{
    public $need_login = FALSE;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys/user_model');
    }

    /**
     * 登出
     */
    public function logout()
    {
        logout();
    }

    /**
     * 登录检测,返回JSON
     */
    public function check_login()
    {
        $user_data = $this->session->get_userdata();
        if (isset($user_data['user_name']) && isset($user_data['expire_time']) && $user_data['expire_time'] >= time()) {
            exit(json_encode(array('status' => TRUE)));
        } else {
            exit(json_encode(array('status' => FALSE)));
        }
    }

    /**
     * 显示验证码
     */
    public function get_verification_code()
    {
        $this->load->helper('captcha');
        $vals = array(
//            'word'      => 'Random word',
            'img_path' => APPPATH . '/captcha/',
            'img_url' => site_url() . '/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => 100,
            'img_height' => 30,
            'expiration' => 7200,
            'word_length' => 5,
            'font_size' => 50,
            'img_id' => 'Imageid',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);
        echo $cap['image'];
    }
}
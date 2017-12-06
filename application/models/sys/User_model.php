<?php

/**
 * 系统用户模型
 *
 * User: kendo
 */
class User_model extends CI_Model
{
    private $_model = 'sys_user';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    public function login()
    {
        //重复登录验证
        $user_data = $this->session->get_userdata();
        if (isset($user_data['user_name']) && isset($user_data['expire_time']) && $user_data['expire_time'] >= time()) {
            if ($user_data['user_name'] != $this->input->post('loginname')) throw new Exception('当前已有登录账号，请刷新页面');
            $this->session->set_userdata('expire_time', time() + 3600);
            exit(json_encode(array('status' => TRUE, 'message' => 'Already Logged In')));
        } else {    //正常登录
            if (strtoupper($this->input->post('captchacode')) != strtoupper($user_data['captcha']['captcha_code'])) {
                exit(json_encode(array('status' => FALSE, 'message' => '验证码不匹配！')));
            }
            $data = $this->db->get_where($this->_model, array('user_name' => $this->input->post('loginname')))->row_array();
            if (empty($data)) {
                exit(json_encode(array('status' => FALSE, 'message' => '用户名或密码不正确！')));
            }
            if (password_verify($this->input->post('loginpwd'), $data['user_pass']) === FALSE) {
                exit(json_encode(array('status' => FALSE, 'message' => '密码错误！')));
            } else {
                $user_data = array(
                    'user_name' => $data['user_name'],
                    'display_name' => $data['display_name'],
                    'expire_time' => time() + $this->config->item('sess_expiration'),
                    'login_ip' => $_SERVER['REMOTE_ADDR']
                );
                $this->session->set_userdata($user_data);
                if ($this->input->post('rememberMe') === 'true') {
                    $_COOKIE['loginname'] = $this->input->post('loginname');
                }
                exit(json_encode(array('status' => TRUE, 'message' => 'Success')));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        if (IS_AJAX) {
            exit(json_encode(array('status' => TRUE, 'message' => 'Success')));
        } else {
            header('location:/login');
        }
    }
}
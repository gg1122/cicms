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
        $this->lang->load('user');
        $this->load->database();
    }

    /**
     * 用户登录
     *
     * @throws Exception
     */
    public function login()
    {
        try {
            $user_data = $this->session->get_userdata();
            $user_name = $this->input->post('loginname');
            $user_pass = $this->input->post('loginpass');
            if (isset($user_data['user_name']) && isset($user_data['expire_time']) && $user_data['expire_time'] >= time()) {
                if ($user_data['user_name'] != $user_name) {
                    throw new Exception($this->lang->line('user_login_already'));
                }
                //延长session的过期时间
                $this->session->set_userdata('expire_time', time() + $this->config->item('sess_expiration'));
            } else {    //正常登录
                if (strtoupper($this->input->post('captchacode')) != strtoupper($user_data['captcha']['captcha_code'])) {
                    //验证码比对失败
//                    throw new Exception($this->lang->line('user_captcha_error'));
                }
                $data = $this->db->get_where($this->_model, ['user_name' => $user_name])
                    ->row_array();
                if (empty($data)) {
                    throw new Exception($this->lang->line('user_info_error'));
                }
                if (password_verify($user_pass, $data['user_pass']) === FALSE) {
                    throw new Exception($this->lang->line('user_info_error'));
                } else {
                    $user_data = [
                        'user_name' => $data['user_name'],
                        'display_name' => $data['display_name'],
                        'expire_time' => time() + $this->config->item('sess_expiration'),
                        'login_ip' => $_SERVER['REMOTE_ADDR']
                    ];
                    $this->session->set_userdata($user_data);
                    if ($this->input->post('rememberMe') === 'true') {
                        $_COOKIE['loginname'] = $this->input->post('loginname');
                    }
                }
            }
            send_json(TRUE, $this->lang->line('user_login_success'));
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }

    /**
     * 用户登出
     */
    public function logout()
    {
        $this->session->sess_destroy();
        if (IS_AJAX) {
            send_json(TRUE, $this->lang->line('user_logout_success'));
        } else {
            header('location:/login');
        }
    }
}
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
     * 根据用户ID获取用户信息
     *
     * @param int $user_id
     * @return array
     */
    public function get($user_id = 0)
    {
        $user = $this->db->get_where($this->_model, ['user_id' => $user_id])->result_array();
        if (!$user) show_error('请输入正确的用户ID');
        return $user;
    }

    /**
     * 获取用户列表
     *
     * @param array $param
     * @param string $data_type
     * @param bool $need_page
     * @return string
     */
    public function get_user(array $param, $data_type = 'array', $need_page = TRUE)
    {
        if (!empty($param['search_type']) && isset($param['search_value'])) {
            $this->db->where($param['search_type'], $param['search_value']);
        }
        $this->db->from($this->_model);
        $db = clone($this->db);
        if ($need_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $db->limit($limit, ($page - 1) * $limit);
        }
        $menu = $db->get()->result_array();
        if ($data_type == 'json') { //只获取一层
            $user_list['code'] = 0;
            $user_list['rel'] = true;
            $user_list['msg'] = '获取成功';
            $user_list['count'] = $this->db->count_all_results();
            foreach ($menu as $item) {
                $user_list['data'][] = [
                    'user_id' => $item['user_id'],
                    'user_name' => $item['user_name'],
                    'user_email' => $item['user_email'],
                    'display_name' => $item['display_name'],
                    'user_status' => $item['user_status'],
                    'last_ip' => long2ip($item['last_ip']),
                    'last_login' => date('Y-m-d H:i:s', $item['last_login']),
                ];
            }
            return json_encode($user_list);
        }
        return $menu;
    }

    public function save_user(array $param)
    {
        $data = [
            'user_name' => $param['user_name'],
            'user_email' => $param['user_email'],
            'display_name' => $param['display_name'],
            'user_pass' => password_hash($param['user_pass'], PASSWORD_DEFAULT),
            'user_level' => $param['user_level'],
            'create_time' => time(),
            'update_time' => time(),
        ];
        if (isset($param['user_id'])) {
            unset($param['create_time']);
        }
        if ($this->db->replace($this->_model, $data)) {
            $a = $this->db->insert_id();
            echo $a;
            return $a;
        } else {
            throw new Exception($this->db->error());
        }
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
                        'user_id' => $data['user_id'],
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
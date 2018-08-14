<?php

/**
 * 角色管理
 *
 * User: kendo
 */
class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys/role_model');
        $this->load->helper('url');
    }

    /**
     * 角色列表
     */
    public function index()
    {
        $data['title'] = '角色列表';
        if (IS_GET && IS_AJAX) {
            exit($this->role_model->get_role($this->input->get(), FALSE));
        }
        $this->load->view('', $data);
    }

    /**
     * 表单验证
     *
     * @throws Exception
     */
    private function _formValidation()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_name', 'RoleName', 'required');
        $this->form_validation->set_rules('role_desc', 'RoleDesc', 'required');
        if (!$this->form_validation->run()) {
            throw new Exception($this->form_validation->error_string());
        }
    }

    /**
     * 新增角色
     */
    public function create()
    {
        if ($this->_formValidation() === FALSE) {
            $this->load->view();
        } else {
            try {
                $this->role_model->save_role($this->input->post());
                send_json(TRUE);
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新角色
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $this->load->helper('form');
                    $data['role'] = $this->role_model->get($this->input->get('role_id'));
                    $html = $this->load->view('', $data, TRUE);
                    send_json(TRUE, $html);
                } else {
                    $this->_formValidation('update');
                    $this->role_model->save_role($this->input->post());
                    send_json(TRUE, 'Success');
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 设置权限
     */
    public function set_access()
    {
        if(IS_AJAX){
            $role_id = $this->input->get_post('role_id');
            if (IS_GET) {
                $this->load->helper('form');
                $data['role'] = $this->role_model->get($role_id);
                $data['menu_tree'] = json_encode($this->role_model->get_role_menu($role_id));
                send_json(TRUE, ['accessList' => $this->load->view('', $data, TRUE)]);
            } else {
                $this->role_model->set_role_menu($this->input->post());
                send_json();
            }
        }
    }

    public function get_access_tree()
    {

    }
}
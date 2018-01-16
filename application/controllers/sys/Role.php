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
        if (!empty($this->input->get()) && IS_AJAX) {
            exit($this->role_model->get_role($this->input->get(), TRUE,'json'));
        }
        $this->load->view('', $data);
    }

    /**
     * 表单验证
     *
     * @return mixed
     */
    private function _formValidation()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_name', 'RoleName', 'required');
        $this->form_validation->set_rules('role_desc', 'RoleDesc', 'required');
        return $this->form_validation->run();
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
        $role_id = $this->input->get_post('role_id');
        if ($this->_formValidation() === FALSE || empty($role_id)) {
            $data['role'] = $this->role_model->get($role_id);
            $this->load->view('', $data);
        } else {
            try {
                $this->role_model->save_role($this->input->post());
                send_json(TRUE, 'Success');
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
        try {
            if (!IS_AJAX) {
                throw new Exception('拒绝非AJAX访问请求！');
            } else {
                $role_id = $this->input->get_post('role_id');
                if (IS_GET) {
                    $this->load->helper('form');
                    $data['role'] = $this->role_model->get($role_id);
                    $data['menu_tree'] = json_encode($this->role_model->get_role_menu($role_id));
                    $this->output->set_output($this->load->view('', $data, TRUE));
                    send_json(TRUE, ['accessList' => $this->output->get_output()]);
                } else {
                    $this->role_model->set_role_menu($this->input->post());
                    send_json();
                }
            }
        } catch (Exception $e) {
            if (IS_AJAX) {
                send_json(FALSE, $e->getMessage());
            } else {
                throw new Exception($e->getMessage());
            }
        }
    }

    public function get_access_tree()
    {

    }
}
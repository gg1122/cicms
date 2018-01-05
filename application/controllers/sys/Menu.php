<?php

/**
 * 菜单管理
 *
 * User: kendo
 */
class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper('url');
    }

    /**
     * 系统菜单首页
     */
    public function index()
    {
        $param['menu_id'] = $this->input->get('menu_id');
        $param['menu_fid'] = $this->input->get('menu_fid');
        $param['menu_type'] = $this->input->get('menu_type');
        $param['menu_status'] = $this->input->get('menu_status');
        $data['menu'] = $this->menu_model->get_menu($param);
        $data['title'] = 'Menu List';
        $data['menuList'] = $this->menu_model->get_all_menu();
        $this->load->view('sys/menu/index', $data);
    }

    /**
     * 新增菜单
     */
    public function add()
    {
        $data['title'] = '新增菜单';
        if ($this->_formValidation() === FALSE) {
            $data['menuList'] = $this->menu_model->get_all_menu();
            $this->load->view('sys/menu/add', $data);
        } else {
            $this->menu_model->set_menu();
            exit(json_encode(['status' => TRUE, 'message' => 'Success']));
        }
    }

    /**
     * 更新菜单
     */
    public function update()
    {
        $data['title'] = '更新菜单';
        $menu_id = $this->input->get_post('menu_id');
        if ($this->_formValidation() === FALSE || empty($menu_id)) {
            $data['menuList'] = $this->menu_model->get_all_menu();
            $data['menuObj'] = $this->menu_model->get($menu_id);
            $this->load->view('sys/menu/update', $data);
        } else {
            $this->menu_model->set_menu();
            exit(json_encode(['status' => TRUE, 'message' => 'Success']));
        }
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
        $this->form_validation->set_rules('menu_name', 'MenuName', 'required');
        $this->form_validation->set_rules('menu_icon', 'MenuIcon', 'required');
        $this->form_validation->set_rules('menu_type', 'MenuType', 'required');
        return $this->form_validation->run();
    }

    /**
     * 禁用菜单
     */
    public function disable()
    {
        try {
            if ($this->menu_model->disable()) {
                exit(json_encode(array('status' => TRUE, 'message' => 'Success')));
            } else {
                throw new Exception('禁用失败');
            }
        } catch (Exception $e) {
            exit(json_encode(array('status' => FALSE, 'message' => $e->getMessage())));
        }
    }

    /**
     * 菜单详情
     */
    public function view()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = '菜单详情';
        $menu_id = $this->uri->segment(3);
        $data['menu'] = $this->menu_model->get_menu_byid($menu_id);
        $this->load->view('sys/menu/view', $data);
    }

    /**
     * 获取菜单列表
     */
    public function getList()
    {
        $params = $this->input->get();
        exit($this->menu_model->get_menu($params, 'json'));
    }

    /**
     * 清除菜单缓存
     */
    public function clean_cache()
    {
        $this->menu_model->save_menu();
        exit(json_encode(['status' => TRUE, 'callback' => ['message' => 'Success']]));
    }

    /**
     * 获取菜单树,未使用
     */
    public function get_module_tree()
    {
        try {
            if (IS_AJAX) {
                $module = strval($this->input->get_post('module'));
                send_json(TRUE, $this->menu_model->get_module($module));
            } else {
                send_json(FALSE, '非法提交');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }

    /**
     * 获取菜单树，已经使用了的
     */
    public function get_module_tree_used()
    {
        try {
            if (IS_AJAX) {
                $menu_type = intval($this->input->get_post('menu_type'));
                $menu_list = $this->menu_model->get_menu(['menu_type' => $menu_type - 1, 'menu_status' => 1]);
                send_json(TRUE, $menu_list);
            } else {
                send_json(FALSE, '非法提交');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }
}
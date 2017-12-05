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
        $this->benchmark->mark('a_start');
        $data['menu'] = $this->menu_model->get_menu(array('menu_fid' => 0));
        $data['title'] = 'Menu List';
        $data['menuList'] = $this->menu_model->get_all_menu();
        $this->load->view('sys/menu/index', $data);
        $this->benchmark->mark('a_end');
        echo $this->benchmark->elapsed_time('a_start', 'a_end');
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
            exit(json_encode(array('status' => TRUE, 'message' => 'Success')));
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
            exit(json_encode(array('status' => TRUE, 'message' => 'Success')));
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
        $this->form_validation->set_rules('menu_fid', 'Upper level menu', 'required');
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
    public function cleanCache()
    {
        $this->menu_model->save_menu();
        exit(json_encode(array('status' => TRUE, 'callback' => ['message' => 'Success'])));
    }

    /**
     * 获取菜单树
     */
    public function getModTree()
    {
        try {
            if (IS_AJAX) {
                $module = strval($this->input->post());
                return json_encode($this->menu_model->get_module($module));
            }
        } catch (Exception $e) {
            exit(json_decode(['status' => FALSE, 'callback' => ['message' => $e->getMessage()]]));
        }
    }
}
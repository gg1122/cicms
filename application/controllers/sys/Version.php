<?php

/**
 * 版本控制
 *
 * User: kendo
 */
class Version extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys/version_model');
        $this->load->helper('url');
    }

    /**
     * 表单验证
     *
     * @throws Exception
     */
    public function _formValidation()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name[css]', 'cssVersion', 'required');
        $this->form_validation->set_rules('name[js]', 'jsVersion', 'required');
        if (!$this->form_validation->run()) {
            throw new Exception($this->form_validation->error_string());
        }
    }

    /**
     * 默认界面
     */
    public function index()
    {
        $this->output->enable_profiler(TRUE);
        $data['title'] = '资源版本控制';
        if (IS_POST) {
            try {
                $this->_formValidation();
                $this->version_model->set_version();
                $data['version_list'] = $this->version_model->get_version_list();
                $this->load->view('sys/version/index', $data);
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $this->load->helper('form');
            $data['version_list'] = $this->version_model->get_version_list();
            $this->load->view('sys/version/index', $data);
        }
    }
}
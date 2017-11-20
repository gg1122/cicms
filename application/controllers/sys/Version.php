<?php

/**
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
     * @return mixed
     */
    public function _formValidation()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name[css]', 'cssVersion', 'required');
        $this->form_validation->set_rules('name[js]', 'jsVersion', 'required');
        return $this->form_validation->run();
    }

    public function index()
    {

        $data['title'] = '资源版本控制';
        if ($this->_formValidation() === FALSE) {
            $data['version_list'] = $this->version_model->get_version_list();
            $this->load->view('sys/version/index', $data);
        } else {
            $this->version_model->set_version();
            $data['version_list'] = $this->version_model->get_version_list();
            $this->load->view('sys/version/index', $data);
        }
    }
}
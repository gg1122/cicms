<?php

/**
 * User: kendo
 */
class Version extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('version_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $versiol_list = $this->version_model->get_version_list();
        $this->load->view('sys/version/index',array('version_list' => $versiol_list));
    }
}
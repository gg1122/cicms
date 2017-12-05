<?php

/**
 * 默认首页
 *
 * User: kendo
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index($page = 'index')
    {
        if (!file_exists(APPPATH . 'views/home/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = '网站ERP'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
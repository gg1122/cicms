<?php

/**
 * 分类管理
 *
 * User: kendo    2018/1/30
 */
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/category_model');
    }

    /**
     * 分类列表
     */
    public function index()
    {
        if (!empty($this->input->post())) {
            $this->category_model->save_category($this->input->post());
        }
        $data['category_tree'] = json_encode($this->category_model->get_category_tree());
        $this->load->view('', $data);
    }
}
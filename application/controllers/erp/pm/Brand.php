<?php

/**
 * 品牌管理
 * User: kendo    Date: 2018/1/29
 */
class Brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/brand_model');
    }

    /**
     * 品牌列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                exit($this->brand_model->get_brand($this->input->get(), FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $data['brand_list'] = $this->brand_model->get_brand($this->input->get(), FALSE);
            $this->load->view('',$data);
        }
    }

    /**
     * 新增品牌
     */
    public function create()
    {


    }

    /**
     * 更新品牌
     */
    public function update()
    {

    }
}


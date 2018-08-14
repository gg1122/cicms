<?php

/**
 * 商品管理
 * User: kendo    Date: 2018/1/29
 */
class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/goods_model');
        $this->load->model('erp/pm/product_model');
        $this->load->model('erp/wm/warehouse_model');
        $this->load->model('erp/pm/keyword_model');
        $this->load->model('erp/pm/feature_model');
    }

    /**
     * 商品列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                exit($this->product_model->get_product($this->input->get(), FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $data['warehouse_list'] = $this->warehouse_model->get_warehouse(['warehouse_status' => 1], TRUE, FALSE);
            $this->load->view('', $data);
        }
    }

    private function _formValidation($type = 'create')
    {
        $this->load->library('form_validation');
        if ($type === 'update') {
            $this->form_validation->set_rules('product_id', '货品ID', 'required|integer');
        }
        $this->form_validation->set_rules('product_name', '货品名称', 'required|max_lenght[255]');
        $this->form_validation->set_rules('product_short_name', '货品简称', 'required|min_length[2]|max_length[125]');
        $this->form_validation->set_rules('product_keyword', '货品关键字', 'required');
        $this->form_validation->set_rules('basic_price', '货品基价', 'required|decimal');
        $this->form_validation->set_rules('product_desc', '货品描述', 'required');
        $this->form_validation->set_rules('brand_id', '品牌ID', 'required|integer');
        $this->form_validation->set_rules('category_ids', '分类ID', 'required');
        $this->form_validation->set_rules('feature_ids', '属性ID', 'required');
    }

    /**
     * 新增商品
     */
    public function create()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $data['goods_list'] = $this->goods_model->get_goods(['goods_status' => 1]);
                    $data['feature_list'] = $this->feature_model->get_feature(['feature_status' => 1], TRUE, FALSE);
                    $data['keyword_list'] = $this->keyword_model->get_keyword(['key_status' => 1], TRUE, FALSE);
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $data, TRUE));
                } else {
                    $this->_formValidation();
                    $this->product_model->save_product($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新商品
     */
    public function update()
    {
    }
}
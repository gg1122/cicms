<?php

/**
 * 规格值&特性值
 * User: kendo    Date: 2018/2/23
 */
class Feature_value extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/feature_model');
        $this->load->model('erp/pm/feature_value_model');
    }

    /**
     * 规格值列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                exit($this->feature_value_model->get_feature_value($this->input->get(), FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $this->load->view();
        }
    }

    public function _formValidation($type = 'create')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('feature_id', '规格ID', 'required|integer');
        if ($type === 'update') {
            $this->form_validation->set_rules('value_id', '规格值ID', 'required|integer');
        }
        $this->form_validation->set_rules('value_name', '规格值名称', 'required|trim)');
        $this->form_validation->set_rules('value_code', '规格值编码', 'required|trim)');
    }

    /**
     * 新增规格值
     */
    public function create()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $this->load->helper('form');
                    $data['feature_list'] = $this->feature_model->get_feature(['feature_status' => 1], TRUE, FALSE);
                    send_json(TRUE, $this->load->view('', $data, TRUE));
                } else {
                    $this->_formValidation();
                    $this->feature_value_model->save_feature_value($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新规格值
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $data['info'] = $this->feature_value_model->get($this->input->get('value_id'));
                    $data['feature_list'] = $this->feature_model->get_feature(['feature_status' => 1], TRUE, FALSE);
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $data, TRUE));
                } else {
                    $this->_formValidation('update');
                    $this->feature_value_model->save_feature_value($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }
}
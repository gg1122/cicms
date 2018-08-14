<?php

/**
 * 规格&特性
 * User: kendo    Date: 2018/2/23
 */
class Feature extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/feature_model');
    }

    /**
     * 规格列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                exit($this->feature_model->get_feature($this->input->get(), FALSE));
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
        if ($type === 'update') {
            $this->form_validation->set_rules('feature_id', '规格ID', 'required|integer');
        } else {
            $this->form_validation->set_rules('feature_name', '规格名称', 'required|is_unique(erp_feature.feature_name)');
        }
    }

    /**
     * 创建规格
     */
    public function create()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', '', TRUE));
                } else {
                    $this->_formValidation();
                    $this->feature_model->save_feature($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新规格
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $data['info'] = $this->feature_model->get($this->input->get('feature_id'));
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $data, TRUE));
                } else {
                    $this->_formValidation('update');
                    $this->feature_model->save_feature($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }
}
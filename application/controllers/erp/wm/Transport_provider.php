<?php

/**
 * 物流服务商管理
 *
 * User: kendo
 */
class Transport_provider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/transport_provider_model');
    }

    /**
     * 物流服务商
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                exit($this->transport_provider_model->get_provider($this->input->get(), FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $this->load->view('');
        }
    }

    public function _formValidation($type = 'create'){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('','','required');
        $this->form_validation->set_rules('','','required');
        $this->form_validation->set_rules('','','required');
    }

    /**
     * 新增物流服务商
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
                    $this->transport_model->save_transport($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新物流服务商
     */
    public function update()
    {

    }

    /**
     * 变更物流服务商状态
     */
    public function change_status()
    {

    }
}
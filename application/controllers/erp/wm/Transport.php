<?php

/**
 * 物流管理
 *
 * User: kendo    Date: 2018/1/23
 */
class Transport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/transport_model');
        $this->load->model('erp/wm/transport_provider_model');
    }

    /**
     * 物流列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                $get = $this->input->get();
                exit($this->transport_model->get_transport($get, FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $this->load->view('');
        }
    }

    public function _formValidation($type = 'create')
    {
        $this->load->library('form_validation');
        if ($type === 'update') {
            $this->form_validation->set_rules('transport_id', '物流ID', 'required|integer');
        }
        $this->form_validation->set_rules('provider_id', '物流服务商', 'required|integer');
        $this->form_validation->set_rules('transport_code', '物流编码', 'required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('transport_name', '物流名称', 'required|min_length[2]|max_length[45]');
    }

    /**
     * 新增物流
     */
    public function create()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $provider_list = $this->transport_provider_model
                        ->get_provider(['provider_status' => 1], TRUE, FALSE);
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', ['provider_list' => $provider_list], TRUE));
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
     * 更新物流
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $param['transport'] = $this->transport_model->get($this->input->get('transport_id'));
                    $param['provider_list'] = $this->transport_provider_model
                        ->get_provider(['provider_status' => 1], TRUE, FALSE);
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $param, TRUE));
                } else {
                    $this->_formValidation('update');
                    $this->transport_model->save_transport($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }
}
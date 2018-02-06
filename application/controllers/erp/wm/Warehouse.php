<?php

/**
 * 仓库管理
 *
 * User: kendo
 */
class Warehouse extends CI_Controller
{
    public $_warehouse_type = [1 => '自建仓库', '海外仓', '虚拟仓'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/warehouse_model');
        $this->load->helper('url');
    }

    /**
     * 仓库列表
     */
    public function index()
    {
        if (IS_AJAX) {
            try {
                $param = $this->input->get();
                exit($this->warehouse_model->get_warehouse($param, FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $this->load->view('');
        }
    }

    public function _formValidation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('warehouse_code', 'warehouseCode', 'required');
        $this->form_validation->set_rules('warehouse_name', 'warehouseName', 'required');
        $this->form_validation->set_rules('warehouse_type', 'warehouseType', 'required');
        if (!$this->form_validation->run()) {
            throw new Exception($this->form_validation->error_string());
        }
    }

    /**
     * 新增仓库
     */
    public function create()
    {
        $this->load->helper('form');
        if (IS_AJAX) {
            if (IS_GET) {
                send_json(TRUE, $this->load->view('', ['type_list' => $this->_warehouse_type], TRUE));
            } else {
                try {
                    $this->_formValidation();
                    $this->warehouse_model->save_warehouse($this->input->post());
                    send_json();
                } catch (Exception $e) {
                    send_json(FALSE, $e->getMessage());
                }
            }
        }
    }

    /**
     * 更新仓库
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $warehouse_id = $this->input->get_post('warehouse_id');
                    $warehouse = $this->warehouse_model->get($warehouse_id);
                    $data['type_list'] = $this->_warehouse_type;
                    $data['warehouse'] = $warehouse;
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $data, TRUE));
                } else {
                    $this->_formValidation();
                    if (!array_key_exists($this->input->post()['warehouse_type'], $this->_warehouse_type)) {
                        throw new Exception('仓库类型未定义');
                    }
                    $this->warehouse_model->save_warehouse($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 禁用仓库
     */
    public function disable()
    {
        try {
            if (IS_AJAX) {
                $this->warehouse_model->change_status($this->input->get_post('warehouse_id'), 0);
                send_json(TRUE);
            } else {
                throw new Exception('invalid request');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }

    /**
     * 启用仓库
     */
    public function enable()
    {
        try {
            if (IS_AJAX) {
                $this->warehouse_model->change_status($this->input->get_post('warehouse_id'), 1);
                send_json(TRUE);
            } else {
                throw new Exception('invalid request');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }
}
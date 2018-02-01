<?php

/**
 * 仓库区域管理
 *
 * User: kendo
 */
class Warehouse_section extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/warehouse_model');
        $this->load->model('erp/wm/warehouse_section_model');
    }

    public function _formValidation($type = 'create')
    {
        $this->load->library('form_validation');
        if ($type === 'update') {
            $this->form_validation->set_rules('section_id', 'section_id', 'required|integer');
        }
        $this->form_validation->set_rules('section_name', 'section_name', 'trim|required');
        $this->form_validation->set_rules('section_code', 'section_code', 'trim|required');
        if (!$this->form_validation->run()) {
            throw new Exception($this->form_validation->error_string());
        }
    }

    /**
     * 区域列表
     */
    public function index()
    {
        if (IS_AJAX) {
            try {
                $param = $this->input->get();
                if (!empty($param['search_type']) && !empty($param['search_value'])) {
                    $param[$param['search_type']] = $param['search_value'];
                }
                $is_page = TRUE;
                if(isset($param['is_page'])){
                    $is_page = boolval($param['is_page']);
                }
                exit($this->warehouse_section_model->get_section($param, FALSE,$is_page));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $param['warehouse_list'] = $this->warehouse_model->get_warehouse(['warehouse_status' => 1, 'warehouse_type' => 1], TRUE, FALSE);
            $this->load->view('', $param);
        }
    }

    /**
     * 新增仓库区域
     */
    public function create()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $warehouse_list = $this->warehouse_model
                        ->get_warehouse(['warehouse_type' => 1, 'warehouse_status' => 1], TRUE, FALSE);
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', ['warehouse_list' => $warehouse_list], TRUE));
                } else {
                    $this->_formValidation();
                    $this->warehouse_section_model->save_section($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新仓库区域
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $param['warehouse_list'] = $this->warehouse_model
                        ->get_warehouse(['warehouse_type' => 1, 'warehouse_status' => 1], TRUE, FALSE);
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $param, TRUE));
                } else {
                    $this->_formValidation('update');
                    $this->warehouse_location_model->save_location($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    public function disable()
    {
        try {
            if (IS_AJAX) {
                $this->warehouse_section_model->change_status($this->input->get_post('section_id'), 0);
                send_json(TRUE);
            } else {
                throw new Exception('invalid request');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }

    public function enable()
    {
        try {
            if (IS_AJAX) {
                $this->warehouse_section_model->change_status($this->input->get_post('section_id'), 1);
                send_json(TRUE);
            } else {
                throw new Exception('invalid request');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }
}
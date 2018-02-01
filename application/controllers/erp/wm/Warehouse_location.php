<?php

/**
 * 库位管理
 *
 * User: kendo    2018/1/30
 */
class Warehouse_location extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/wm/warehouse_model');
        $this->load->model('erp/wm/warehouse_section_model');
        $this->load->model('erp/wm/warehouse_location_model');
    }

    private function _formValidation($type = 'create')
    {
        $this->load->library('form_validation');
        if ($type === 'update') {
            $this->form_validation->set_rules('location_id', 'location_id', 'required|integer');
        } else {
            $this->form_validation->set_rules('location_code', 'locationCode', 'required|is_unique[erp_warehouse_location.location_code]');
        }
        $this->form_validation->set_rules('warehouse_id', 'warehouse_id', 'required|integer');
        $this->form_validation->set_rules('section_id', 'section_id', 'required|integer');
        if (!$this->form_validation->run()) {
            throw new Exception($this->form_validation->error_string());
        }
    }

    /**
     * 库位列表
     */
    public function index()
    {
        print_r($this->config);
        if (IS_AJAX) {
            try {
                $param = $this->input->get();
                if (!empty($param['search_type']) && !empty($param['search_value'])) {
                    $param[$param['search_type']] = $param['search_value'];
                }
                exit($this->warehouse_location_model->get_location($param, FALSE));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        } else {
            $param['warehouse_list'] = $this->warehouse_model->get_warehouse(['warehouse_status' => 1, 'warehouse_type' => 1], TRUE, FALSE);
            $param['section_list'] = $this->warehouse_section_model->get_section(['section_status' => 1], TRUE, FALSE);
            $this->load->view('', $param);
        }
    }

    /**
     * 新增库位
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
                    $this->warehouse_location_model->save_location($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 更新库位
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $param['location'] = $this->warehouse_location_model->get($this->input->get('location_id'));
                    $param['warehouse_list'] = $this->warehouse_model
                        ->get_warehouse(['warehouse_type' => 1, 'warehouse_status' => 1], TRUE, FALSE);
                    $param['section_list'] = $this->warehouse_section_model
                        ->get_section(['warehouse_id' => $param['location']['warehouse_id']]);
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

    public function import()
    {
        if (IS_AJAX) {
            if (IS_GET) {
                $param = [
                    'type' => 'upload_excel',
                    'upload' => 'import',
                    'template' => $this->config->item('base_templates_url').'import_location.xlsx'
                ];
                $html = $this->load->view('templates/upload', $param, TRUE);
                send_json(TRUE, $html);
            } else {
                print_r($_FILES);
            }
        }
    }
}
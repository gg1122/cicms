<?php

/**
 * 仓库管理
 *
 * User: kendo
 */
class Wmanager extends CI_Controller
{
    private $_warehouse_type =  [1 => '自建仓库', '海外仓', '虚拟仓'];
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/warehouse/warehouse_model');
        $this->load->helper('url');
    }

    /**
     * 仓库列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                $get = $this->input->get();
                $get['warehouse_type'] = $this->_warehouse_type;
                exit($this->warehouse_model->get_warehouse($get, FALSE));
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
        return $this->form_validation->run();
    }

    /**
     * 新增仓库
     */
    public function create()
    {
        $this->load->helper('form');
        if (IS_AJAX) {
            if (IS_GET) {
                send_json(TRUE, $this->load->view('erp/warehouse/create', ['type_list' => [1 => '自建仓库', '海外仓', '虚拟仓']], TRUE));
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
        try {
            $warehouse_id = $this->input->get_post('warehouse_id');
            if (IS_AJAX) {
                if (IS_GET) {
                    $this->load->helper('form');
                    $warehouse = $this->warehouse_model->get($warehouse_id);
                    $data['type_list'] = $this->_warehouse_type;
                    $data['warehouse'] = $warehouse;
                    $html = $this->load->view('erp/warehouse/update', $data, TRUE);
                    send_json(TRUE, $html);
                } else {
                    $this->_formValidation();
                    $post = $this->input->post();
                    if (empty($this->input->post())) {
                        throw new Exception('提交的数据不能为空');
                    } else {
                        if(!array_key_exists($post['warehouse_type'],$this->_warehouse_type)){
                            throw new Exception('仓库类型未定义');
                        }
                        $this->warehouse_model->save_warehouse($post);
                        send_json();
                    }
                }
            } else {
                throw new Exception('非法请求');
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }
}
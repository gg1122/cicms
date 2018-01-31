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

    /**
     * 库位列表
     */
    public function index()
    {
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

    }

    /**
     * 更新库位
     */
    public function update()
    {
    }

    /**
     * 变更库位状态
     */
    public function change_status()
    {

    }
}
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

    /**
     * 新增物流
     */
    public function create()
    {

    }

    /**
     * 更新物流
     */
    public function update()
    {
    }
}
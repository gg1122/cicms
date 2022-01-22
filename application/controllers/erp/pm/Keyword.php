<?php

/**
 * 关键词词库管理
 * User: kendo    Date: 2018/2/10
 */
class Keyword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('erp/pm/keyword_model');
    }

    /**
     * 词库列表
     */
    public function index()
    {
        if (IS_AJAX && IS_GET) {
            try {
                exit($this->keyword_model->get_keyword($this->input->get(), FALSE));
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
            $this->form_validation->set_rules('key_id', '词库ID', 'required|integer');
        }
        $this->form_validation->set_rules('key_name', '词库名称', 'required|is_unique(erp_keyword.key_name)');
        $this->form_validation->set_rules('key_pool', '词库内容', 'required');
    }

    /**
     * 新增词库
     */
    public function create()
    {
        try {
            if (IS_GET) {
                $this->load->helper('form');
                send_json(TRUE, $this->load->view('', '', TRUE));
            } else {
                $this->_formValidation();
                $this->keyword_model->save_keyword($this->input->post());
                send_json();
            }
        } catch (Exception $e) {
            send_json(FALSE, $e->getMessage());
        }
    }

    /**
     * 更新词库
     */
    public function update()
    {
        if (IS_AJAX) {
            try {
                if (IS_GET) {
                    $data['keyword'] = $this->keyword_model->get($this->input->get('key_id'));
                    $this->load->helper('form');
                    send_json(TRUE, $this->load->view('', $data, TRUE));
                } else {
                    $this->_formValidation('update');
                    $this->keyword_model->save_keyword($this->input->post());
                    send_json();
                }
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }

    /**
     * 获取词库内容
     */
    public function get()
    {
        if (IS_AJAX) {
            try {
                $keyword = $this->keyword_model->get($this->input->get('key_id'));
                if ($keyword['key_status'] === 0) {
                    throw new Exception('词库：' . $keyword['key_name'] . '--已禁用');
                }
                send_json(TRUE, json_decode($keyword['key_pool']));
            } catch (Exception $e) {
                send_json(FALSE, $e->getMessage());
            }
        }
    }
}
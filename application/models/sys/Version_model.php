<?php

/**
 * 系统资源版本
 *
 * User: kendo
 */
class Version_model extends CI_Model
{
    private $_model = 'sys_version';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_version_list()
    {
        return $this->db->get_where($this->_model)->result_array();
    }

    public function set_version()
    {
        if (!empty($this->input->post())) {
            foreach ($this->input->post('name') as $key => $item) {
                $this->db->reset_query();
                $this->db->set('version',time());
                $this->db->where('name', $key);
                $this->db->update($this->_model);
            }
        } else {
            throw new Exception('非法提交');
        }
    }
}
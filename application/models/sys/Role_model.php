<?php
/**
 * 系统角色模型
 *
 * User: kendo
 */
class Role_model extends CI_Model{
    private $_model = 'sys_role';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
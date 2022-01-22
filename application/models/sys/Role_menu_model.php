<?php

/**
 * 系统角色-菜单权限
 *
 * User: kendo
 */
class Role_menu_model extends CI_Model
{
    private $_table = 'sys_role_menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($params)
    {
    }

    /**
     * 获取混合权限后的角色-菜单
     *
     * @param int $role_id
     * @return array
     */
    public function get_role_menu($role_id = 0)
    {
        $this->load->model('menu_model');
        $menu_tree = $this->menu_model->get_menu_tree();
        if (!empty($menu_tree)) {
            $role_menu = $this->db->select('menu_id')->get_where($this->_table, ['role_id' => $role_id, 'access_status' => 1])->result_array();
            $role_access_old = [];
            if (!empty($role_menu)) {
                $role_access_old = array_column($role_menu, 'menu_id');
            }
            $data = [];
            foreach ($menu_tree as $menu) {
                $data[] = [
                    'id' => $menu['menu_id'],
                    'pId' => $menu['menu_fid'],
                    'name' => $menu['menu_name'],
                    'open' => ($menu['menu_right'] - $menu['menu_left']) > 1,
                    'checked' => in_array($menu['menu_id'], $role_access_old),
                ];
            }
            return $data;
        } else {
            return [];
        }
    }

    /**
     * 设置角色-菜单
     *
     * @param array $param
     * @throws Exception
     */
    public function set_role_menu(array $param)
    {
        try {
            $this->db->trans_begin();
            $time = time();
            $user_id = $this->session->get_userdata()['user_id'];
            $this->db->query("update {$this->_table} set access_status = 0,update_time = {$time},update_userid = {$user_id} where role_id = {$param['role_id']}");
            if (!empty($param['access'])) {
                $access_menu = explode(',', $param['access']);
                foreach ($access_menu as $menu_id) {
                    $data = [
                        'role_id' => $param['role_id'],
                        'menu_id' => $menu_id,
                        'access_status' => 1,
                        'create_time' => $time,
                        'update_time' => $time,
                        'create_userid' => $user_id,
                        'update_userid' => $user_id
                    ];
                    $role_menu = $this->db->select('id,access_status')->get_where($this->_table, ['role_id' => $param['role_id'], 'menu_id' => $menu_id])->row_array();
                    if ($role_menu) {
                        unset($data['create_time']);
                        unset($data['create_userid']);
                        $this->db->update($this->_table, $data, ['id' => $role_menu['id']]);
                    } else {
                        $this->db->insert($this->_table, $data);
                    }
                }
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                throw new Exception('保存失败');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
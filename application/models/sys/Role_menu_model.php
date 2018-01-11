<?php

/**
 * 系统角色-菜单权限
 *
 * User: kendo
 */
class Role_menu_model extends CI_Model
{
    private $_model = 'sys_role_menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($params)
    {
        echo 11;
        die;
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
        $role_menu = $this->db->select('menu_id')->get_where($this->_model, ['role_id' => $role_id, 'access_status' => 1])->result_array();
        $role_access_old = [];
        if (!empty($role_menu)) {
            $role_access_old = array_column($role_menu, 'menu_id');
        }
        $role_access_new = [];
        if (!empty($menu_tree)) {
            $last_key_one = -1;
            $last_key_two = -1;
            foreach ($menu_tree as $key => $menu) {
                $have_access = '';
                if (in_array($menu['menu_id'], $role_access_old)) {
                    $have_access = 'checked';
                }
                $menu_check = '<input type="checkbox" name="access[' . $menu['menu_id'] . ']" id="menu_' . $menu['menu_right'] . '" value="' . $menu['menu_id'] . '" ' . $have_access . '>';
                $menu['have_access'] = $have_access;
                if ($menu['menu_type'] == 2) {    //左部菜单
                    $last_key_one++;
                    $role_access_new[$key] = [
                        'id' => $menu['menu_id'],
                        'name' => $menu['menu_name'] . $menu_check,
                        'menu_left' => $menu['menu_left'],
                        'menu_right' => $menu['menu_right'],
                    ];
                } elseif ($menu['menu_type'] == 3) {    //左部子菜单
                    $role_access_new[$last_key_one]['children'][] = [
                        'id' => $menu['menu_id'],
                        'name' => $menu['menu_name'] . $menu_check,
                        'menu_left' => $menu['menu_left'],
                        'menu_right' => $menu['menu_right'],
                    ];
                    $last_key_two++;
                } elseif ($menu['menu_type'] == 4) {  //左部子菜单模块
                    $role_access_new[$last_key_one]['children'][$last_key_two]['children'][] = [
                        'id' => $menu['menu_id'],
                        'name' => $menu['menu_name'] . $menu_check,
                        'menu_left' => $menu['menu_left'],
                        'menu_right' => $menu['menu_right'],
                    ];
                }
            }
            return $role_access_new;
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
            $this->db->query("update {$this->_model} set access_status = 0,update_time = {$time},update_userid = {$user_id} where role_id = {$param['role_id']}");
            if (!empty($param['access'])) {
                foreach ($param['access'] as $menu_id) {
                    $data = [
                        'role_id' => $param['role_id'],
                        'menu_id' => $menu_id,
                        'access_status' => 1,
                        'create_time' => $time,
                        'update_time' => $time,
                        'create_userid' => $user_id,
                        'update_userid' => $user_id
                    ];
                    $role_menu = $this->db->select('id,access_status')->get_where($this->_model, ['role_id' => $param['role_id'], 'menu_id' => $menu_id])->row_array();
                    if ($role_menu) {
                        unset($data['create_time']);
                        unset($data['create_userid']);
                        $this->db->update($this->_model, $data, ['id' => $role_menu['id']]);
                    } else {
                        $this->db->insert($this->_model, $data);
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
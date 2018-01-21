<?php

/**
 * 系统角色模型
 *
 * User: kendo
 */
class Role_model extends CI_Model
{
    private $_table = 'sys_role';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 获取角色数据
     *
     * @param int $role_id
     * @return array
     * @throws Exception
     */
    public function get($role_id = 0)
    {
        $role = $this->db->get_where($this->_table, ['role_id' => $role_id])->row_array();
        if (empty($role)) throw new Exception('请传入正确的角色ID');
        return $role;
    }

    /**
     * 获取角色列表
     *
     * @param array $param
     * @param bool $is_page
     * @param bool $is_array
     * @return string
     */
    public function get_role(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $this->db->select(['role_id', 'role_name', 'role_desc', 'role_status', 'create_time']);
        if (isset($param['role_status'])) {
            $this->db->where('role_status', boolval($param['role_status']));
        } else {
            $this->db->where('role_status = 1');
        }
        if (!empty($param['role_name'])) {
            $this->db->like('role_name', $param['role_name']);
        }
        if (!empty($param['role_id'])) {
            $this->db->where('role_id', intval($param['role_id']));
        }
        $this->db->from($this->_table);
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $role_list = $this->db->get()->result_array();
        if ($is_array) {
            return $role_list;
        } else {
            $data = [];
            foreach ($role_list as $role) {
                $data[] = [
                    'role_id' => $role['role_id'],
                    'role_name' => $role['role_name'],
                    'role_desc' => $role['role_desc'],
                    'role_status' => $role['role_status'] ? '启用中' : '禁用中',
                    'create_time' => date('Y-m-d H:i:s', $role['create_time']),
                ];
            }
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($data, $result->num_rows);
        }
    }

    /**
     * 保存角色数据
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_role(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['role_id'])) {
            $this->get($data['role_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['role_status'] = $data['role_status'] === 'on' ? 1 : 0;
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }

    /**
     * 获取角色-菜单
     *
     * @param int $role_id
     * @return array
     */
    public function get_role_menu($role_id = 0)
    {
        $this->load->model('sys/role_menu_model');
        return $this->role_menu_model->get_role_menu($role_id);
    }

    /**
     * 设置角色-菜单
     *
     * @param array $param
     * @throws Exception
     */
    public function set_role_menu(array $param)
    {
        $this->load->model('sys/role_menu_model');
        return $this->role_menu_model->set_role_menu($param);
    }
}
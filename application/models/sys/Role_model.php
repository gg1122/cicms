<?php

/**
 * 系统角色模型
 *
 * User: kendo
 */
class Role_model extends CI_Model
{
    private $_model = 'sys_role';

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
     */
    public function get($role_id = 0)
    {
        $role = $this->db->get_where($this->_model, ['role_id' => $role_id])->row_array();
        if (empty($role)) show_error('请传入正确的角色ID');
        return $role;
    }

    /**
     * 获取角色列表
     *
     * @param array $param
     * @param string $data_type
     * @return string
     */
    public function get_role(array $param, $data_type = 'array')
    {
        $page = isset($param['page']) ? intval($param['page']) : 1;
        $limit = isset($param['limit']) ? intval($param['limit']) : 10;
        if (isset($param['role_status'])) {
            $this->db->where('role_status', boolval($param['role_status']));
        } else {
            $this->db->where('role_status = 1');
        }
        if(!empty($param['role_name'])){
            $this->db->like('role_name',$param['role_name']);
        }
        if (!empty($param['role_id'])) {
            $this->db->where('role_id', intval($param['role_id']));
        }
        $this->db->from($this->_model);
        $db = clone($this->db);
        $db->limit($limit, ($page - 1) * $limit);
        $role_list = $db->get()->result_array();
        if ($data_type == 'json') { //只获取一层
            $json_info['code'] = 0;
            $json_info['rel'] = true;
            $json_info['msg'] = '获取成功';
            $json_info['count'] = $this->db->count_all_results();
            foreach ($role_list as $role) {
                $json_info['data'][] = [
                    'role_id' => $role['role_id'],
                    'role_name' => $role['role_name'],
                    'role_desc' => $role['role_desc'],
                    'role_status' => $role['role_status'] ? '启用中' : '禁用中',
                    'create_time' => date('Y-m-d H:i:s', $role['create_time']),
                ];
            }
            return json_encode($json_info);
        }
        return $role_list;
    }

    /**
     * 保存角色数据
     *
     * @param array $param
     * @return bool
     * @throws Exception
     */
    public function save_role(array $param)
    {
        if (isset($param['role_status'])) {
            if ($param['role_status'] === 'on') {
                $param['role_status'] = 1;
            } else {
                $param['role_status'] = 0;
            }
        } else {
            $param['role_status'] = 0;
        }
        if ($this->db->replace($this->_model, $param)) {
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
     * @return array
     */
    public function set_role_menu(array $param)
    {
        $this->load->model('sys/role_menu_model');
        return $this->role_menu_model->set_role_menu($param);
    }
}
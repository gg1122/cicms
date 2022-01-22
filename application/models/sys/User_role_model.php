<?php

/**
 * 系统用户-角色
 *
 * User: kendo
 */
class User_role_model extends CI_Model
{
    private $_table = 'sys_user_role';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 根据用户ID，获取用户有效的角色组
     *
     * @param int $user_id
     * @return array
     */
    public function get_user_role($user_id = 0)
    {
        $user_role = $this->db->select('role_id')
            ->get_where($this->_table, ['user_id' => $user_id, 'user_role_status' => 1])
            ->result_array();
        if (empty($user_role)) return [];
        return array_column($user_role, 'role_id');
    }


    /**
     * 保存用户-角色配置
     *
     * @param int $user_id
     * @param array $role_list / string
     */
    public function save_user_role($user_id = 0, $role_list = [])
    {
        if (!is_array($role_list)) {
            $role_list = [$role_list];
        }
        $time = time();
        $operator_userid = $this->session->get_userdata()['user_id'];
        //重制旧的角色组
        $data = [
            'user_role_status' => 0,
            'update_time' => $time,
            'update_userid' => $operator_userid,
        ];
        $this->db->where('user_id', $user_id);
        $this->db->update($this->_table, $data);
        //更新角色组
        foreach ($role_list as $role_id) {
            $info = $this->db->select('id')->get_where($this->_table, ['user_id' => $user_id, 'role_id' => $role_id])->row_array();
            if ($info) {
                $this->db->set('user_role_status', 1);
                $this->db->where('id', $info['id']);
                $this->db->update($this->_table);
            } else {
                $user_role = [
                    'user_id' => $user_id,
                    'role_id' => $role_id,
                    'create_time' => $time,
                    'update_time' => $time,
                    'create_userid' => $operator_userid,
                    'update_userid' => $operator_userid,
                ];
                $this->db->insert($this->_table, $user_role);
            }
        }
    }
}
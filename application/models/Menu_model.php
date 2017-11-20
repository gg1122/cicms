<?php

/**
 * 系统菜单设置
 *
 * User: kendo
 */
class Menu_model extends CI_Model
{
    private $_model = 'sys_menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($menu_id = 0)
    {
        $menu = $this->db->get_where($this->_model, array('menu_id' => $menu_id))->row_array();
        if (!$menu) show_error('请传入正确的菜单ID');
        return $menu;
    }

    public function delete()
    {
    }


    public function disable()
    {
        $menu_id = $this->input->get('menu_id');
        $this->db->set('menu_status', 0);
        $this->db->where('menu_id', $menu_id);
        return $this->db->update($this->_model);
    }

    /**
     * 获取全部可用菜单
     *
     * @return mixed
     */
    public function get_all_menu()
    {
        $this->db->reset_query();
        $this->db->select('menu_id,menu_name,menu_type,menu_icon');
        $this->db->from($this->_model);
        $this->db->where('menu_status', 1);
        $this->db->order_by('menu_sort asc');
        $menu = $this->db->get()->result_array();
        foreach ($menu as &$item) {
            $item['menu_name'] = str_repeat('--', ($item['menu_type'] - 1) * 2) . $item['menu_name'];
            $item['menu_icon'] = get_icon_str($item['menu_icon']);
        }
        return $menu;
    }

    /**
     * 对可用菜单重新进行排序
     *
     * @param int $menu_fid
     * @param int $menu_sort
     * @param int $deep
     */
    public function reset_menu_sort($menu_fid = 0, $menu_sort = 0, $deep = 0)
    {
        $this->db->reset_query();
        $this->db->select('menu_id');
        $this->db->from($this->_model);
        $this->db->where('menu_status', 1);
        $this->db->where('menu_fid', $menu_fid);
        $this->db->order_by('menu_sort asc');
        $menu = $this->db->get()->result_array();
        if (!empty($menu)) {
            $deep++;
            foreach ($menu as $item) {
                $menu_sort++;
                $this->db->reset_query();
                $this->db->set('menu_sort', $menu_sort, FALSE);
                $this->db->set('menu_type', $deep, FALSE);
                $this->db->where('menu_id', $item['menu_id']);
                $this->db->update($this->_model);
                $this->reset_menu_sort($item['menu_id'], $menu_sort, $deep);
            }
        }
    }

    /**
     * 获取菜单
     *
     * @param array $param
     * @param string $data_type
     * @return string
     */
    public function get_menu(array $param, $data_type = 'array')
    {
        $page = isset($param['page']) ? intval($param['page']) : 1;
        $limit = isset($param['limit']) ? intval($param['limit']) : 10;
        if (!isset($param['menu_status'])) {
            $param['menu_status'] = 1;
        }
        if (!empty($this->input->get('menu_id'))) {
            $this->db->where('menu_id', $this->input->get('menu_id'));
        } else {
            $menu_fid = isset($param['menu_fid']) ? intval($param['menu_fid']) : 0;
            $this->db->where('menu_fid', $menu_fid);
        }
        $this->db->where('menu_status', $param['menu_status']);
        $this->db->from($this->_model);
        $db = clone($this->db);
        $db->limit($limit, ($page - 1) * $limit);
        $menu = $db->get()->result_array();
        if ($data_type == 'json') { //只获取一层
            $row_num = $this->db->count_all_results();
            $menu_list = array();
            $menu_list['code'] = 0;
            $menu_list['rel'] = true;
            $menu_list['msg'] = '获取成功';
            foreach ($menu as $item) {
                $menu_icon = get_icon_str($item['menu_icon']);
                $menu_list['data'][] = array(
                    'menu_id' => $item['menu_id'],
                    'menu_name' => $item['menu_name'],
                    'menu_uri' => $item['menu_uri'],
                    'menu_icon' => $menu_icon,
                    'menu_status' => $item['menu_status'],
                    'create_time' => date('Y-m-d H:i:s', $item['create_time']),
                );
            }
            $menu_list['count'] = $row_num;
            return json_encode($menu_list);
        } elseif ($data_type == 'list') {  //返回全部的订单,select
            $menu = $this->db->order_by('menu_sort asc')->get()->result_array();
            $menu_list = array();
            foreach ($menu as $item) {
                $menu_list[] = array(
                    'menu_id' => $item['menu_id'],
                    'menu_name' => str_repeat('-', $item['menu_type']) . $item['menu_name']
                );
            }
        }
        return $menu;
    }

    /**
     * 设置菜单信息
     *
     * @throws Exception
     */
    public function set_menu()
    {
        $this->load->helper('url');
        $data = array(
            'menu_name' => $this->input->post('menu_name'),
            'menu_fid' => $this->input->post('menu_fid'),
            'menu_uri' => $this->input->post('menu_uri'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_type' => $this->input->post('menu_type'),
            'menu_status' => strtolower($this->input->post('menu_status')) == 'on' ? 1 : 0,
            'menu_desc' => $this->input->post('menu_desc'),
            'update_time' => time(),
        );
        if (!empty($this->input->post('menu_id'))) {
            $data['menu_id'] = $this->input->post('menu_id');
        } else {
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'menu_fid' => $this->input->post('menu_fid'),
                'menu_uri' => $this->input->post('menu_uri'),
                'menu_icon' => $this->input->post('menu_icon'),
                'menu_type' => $this->input->post('menu_type'),
                'menu_status' => strtolower($this->input->post('menu_status')) == 'on' ? 1 : 0,
                'menu_desc' => $this->input->post('menu_desc'),
                'create_time' => time(),
                'update_time' => time(),
            );
        }
        if ($this->db->replace($this->_model, $data)) {
            $this->save_menu();
        } else {
            throw new Exception($this->db->error());
        }
    }

    public function get_menu_byid($menu_id = 0)
    {
        return $this->db->get_where($this->_model, array('menu_id' => $menu_id, 'menu_status' => 1))->row_array();
    }

    public function save_menu()
    {
        $this->reset_menu_sort(0);
        $menu_list = [];
        foreach ($this->db->get_where($this->_model, array('menu_fid' => 0, 'menu_status' => 1))->result_array() as $k => $item) {
            $children_list = $this->db->get_where($this->_model, array('menu_fid' => $item['menu_id'], 'menu_status' => 1))->result_array();
            $menu = array();
            $menu['title'] = $item['menu_name'];
            $menu['icon'] = $item['menu_icon'];
            if (!empty($item['menu_uri'])) {
                $menu['href'] = $item['menu_uri'];
            }
            if (!empty($children_list)) {
                foreach ($children_list as $children) {
                    $c_item = array(
                        'title' => $children['menu_name'],
                        'icon' => $children['menu_icon'],
                    );
                    if (!empty($children['menu_uri'])) {
                        $c_item['href'] = $children['menu_uri'];
                    }
                    $menu['children'][] = $c_item;
                }
            }
            $menu_list[] = $menu;
        }
        file_put_contents('assets/menu.json', json_encode($menu_list));
    }
}
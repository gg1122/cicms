<?php

/**
 * 仓库区域模型
 *
 * User: kendo
 */
class Warehouse_section_model extends CI_Model
{
    private $_table = 'erp_warehouse_section';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 根据【仓库区域ID|仓库区域编码】获取数据
     *
     * @param string $value
     * @param string $field
     * @return array
     * @throws Exception
     */
    public function get($value = '', $field = 'section_id')
    {
        if (in_array($field, ['section_id', 'section_code'])) {
            if ($field === 'section_id') {
                $section = $this->db->get_where($this->_table, ['section_id' => intval($value)])->row_array();
            } else {
                $section = $this->db->get_where($this->_table, ['section_code' => strtoupper(trim($value))])->row_array();
            }
            if (empty($section)) throw new Exception('请传入正确的【仓库区域ID|仓库区域编码】');
            return $section;
        } else {
            throw new Exception('请传入【仓库区域ID|仓库区域编码】');
        }
    }

    /**
     * 获取仓库区域列表数据
     *
     * @param array $param
     * @param bool $is_page
     * @param bool $is_array
     * @return string
     */
    public function get_section(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('s.section_id,s.section_name,s.section_code,s.section_status,s.create_time,w.warehouse_name');
        $param_int = ['section_id', 'warehouse_id', 'section_status'];
        foreach ($param_int as $column) {
            if (isset($param[$column]) && $param[$column] !== '') {
                $this->db->where('s.' . $column, intval($param[$column]));
            }
        }
        if (isset($param['section_name'])) {
            $this->db->like('section_name', $param['section_name']);
        }
        if (isset($param['section_code'])) {
            $this->db->where('section_code', $param['section_code']);
        }
        if (isset($param['section_status']) && $param['section_status'] !== '') {
            $this->db->where('section_status', $param['section_status']);
        } else {
            $this->db->where('section_status', 1);
            $this->db->where('warehouse_status', 1);
        }
        $this->db->where('warehouse_type', 1);
        $this->db->from($this->_table . ' s');
        $this->db->join('erp_warehouse w', 's.warehouse_id = w.warehouse_id');
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $section_list = $this->db->get()->result_array();
        if ($is_array) {
            return $section_list;
        } else {
            $status_tips = ['已删除', '未使用', '使用中'];
            foreach ($section_list as &$section) {
                $section['section_status'] = $status_tips[$section['section_status']];
                $section['create_time'] = date('Y-m-d H:i:s', $section['create_time']);
            }
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($section_list, $result->num_rows);
        }
    }

    /**
     * 保存仓库区域数据
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_section(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (!empty($data['section_id'])) {
            $this->get($data['section_id']);
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        $info['warehouse_id'] = $data['warehouse_id'];
        $info['section_name'] = $data['section_name'];
        $info['section_code'] = strtoupper($data['section_name']);
        $info['section_status'] = intval(isset($data['section_status']));
        $info['update_time'] = $time;
        $info['update_userid'] = $user_id;
        if (!empty($data['section_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['section_id' => $data['section_id']]);
        } else {
            $done_status = $this->db->insert($this->_table, $info);
        }
        if ($done_status) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }

    public function change_status($section_id = 0, $section_status = 0)
    {
        $section = $this->get($section_id);
        if ($section['section_status'] === intval($section_status)) {
            return TRUE;
        }
        $exec_status = $this->db->update($this->_table, ['section_status' => intval($section_status)], 'section_id = ' . intval($section_id));
        if ($exec_status) {
            return TRUE;
        } else {
            return $this->db->error();
        }
    }
}

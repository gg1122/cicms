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
     * 根据仓库区域ID获取数据
     *
     * @param int $section_id
     * @return array
     * @throws Exception
     */
    public function get($section_id = 0)
    {
        $section = $this->db->get_where($this->_table, ['section_id' => intval($section_id)])->row_array();
        if (empty($section)) throw new Exception('请传入正确的仓库区域ID');
        return $section;
    }

    /**
     * 获取仓库区域列表数据
     *
     * @param array $param
     * @param bool $is_page
     * @param bool $is_array
     * @return string
     */
    public function get_section(array $param, $is_page = TRUE, $is_array = TRUE)
    {
        $this->db->select('s.section_id,s.section_name,s.section_code,s.section_status,w.warehouse_name');
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
        $this->db->from($this->_table . ' s');
        $this->db->join('erp_warehouse w', 's.warehouse_id = w.wareshouse_id');
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $section_list = $this->db->get()->result_array();
        if ($is_array) {
            return $section_list;
        } else {
            $data = [];
            $status_tips = ['已删除', '未使用', '使用中'];
            foreach ($section_list as $section) {
                $data[] = [
                    'section_id' => $section['section_id'],
                    'section_name' => $section['section_name'],
                    'section_code' => $section['section_code'],
                    'warehouse_name' => $section['warehouse_name'],
                    'section_status' => $status_tips[$section['section_status']],
                    'create_time' => date('Y-m-d H:i:s', $section['create_time']),
                ];
            }
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($data, $result->nuw_rows);
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
        if (isset($data['section_id'])) {
            $this->get($data['section_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['section_status'] = $data['location_status'] === 'on' ? 1 : 0;
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}

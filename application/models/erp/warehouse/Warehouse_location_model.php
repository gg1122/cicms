<?php

/**
 * 仓库库位模型
 *
 * User: kendo
 */
class Warehouse_location_model extends CI_Model
{
    private $_table = 'erp_warehouse_location';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 根据库位ID获取库位数据
     *
     * @param int $location_id
     * @return array
     * @throws Exception
     */
    public function get($location_id = 0)
    {
        $location = $this->db->get_where($this->_table, ['location_id' => intval($location_id)])
            ->row_array();
        if (empty($location)) throw new Exception('请传入正确的仓库库位ID');
        return $location;
    }

    /**
     * 获取库位列表
     *
     * @param array $param
     * @param bool $is_page
     * @param bool $is_array
     * @return string
     */
    public function get_location(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('l.location_id,l.location_code,l.location_status,s.section_name,w.warehouse_name,from_unixtime(l.create_time) create_time');
        $param_int = ['location_id', 'warehouse_id', 'section_id', 'location_status'];
        foreach ($param_int as $column) {
            if (isset($param[$column]) && $param[$column] !== '') {
                $this->db->where('l.' . $column, intval($param[$column]));
            }
        }
        if (!empty($param['location_code'])) {
            $this->db->where('l.location_code', $param['location_code']);
        }
        $this->db->from($this->_table . ' l');
        $this->db->join('erp_warehouse_section s', 'l.section_id = s.section_id');
        $this->db->join('erp_warehouse w', 'l.warehouse_id = w.warehouse_id');
        if ($is_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $location_list = $this->db->get()->result_array();
        if ($is_array) {
            return $location_list;
        } else {
            $data = [];
            $status_tips = ['已删除', '未使用', '使用中'];
            foreach ($location_list as $location) {
                $location['location_status'] = $status_tips[$location['location_status']];
                $data[] = $location;
            }
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($data, $result->num_rows);
        }
    }

    /**
     * 保存库位信息
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_location(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['location_id'])) {
            $this->get($data['location_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['location_status'] = $data['location_status'] === 'on' ? 1 : 0;
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
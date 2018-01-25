<?php

/**
 * 仓库模型
 *
 * User: kendo
 */
class Warehouse_model extends CI_Model
{
    private $_table = 'erp_warehouse';

    /**
     * 仓库类型
     *
     * @var array
     */
    private $_warehouse_type = [
        '1' => '自建仓库',
        '2' => '海外仓',
        '3' => '虚拟仓',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 根据仓库ID获取仓库信息
     *
     * @param int $warehouse_id
     * @return array
     * @throws Exception
     */
    public function get($warehouse_id = 0)
    {
        $warehouse = $this->db->get_where($this->_table, ['warehouse_id' => $warehouse_id])->row_array();
        if (empty($warehouse)) throw new Exception('请传入正确的仓库ID');
        return $warehouse;
    }

    /**
     * 获取仓库列表
     *
     * @param array $param
     * @param bool $is_page
     * @param bool $is_array
     * @return string
     */
    public function get_warehouse(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        if (isset($param['warehouse_status']) && $param['warehouse_status'] !== '') {
            $this->db->where('warehouse_status', intval($param['warehouse_status']));
        } elseif (!empty($param['warehouse_name'])) {
            $this->db->like('warehouse_name', $param['warehouse_name']);
        } elseif (!empty($param['warehouse_code'])) {
            $this->db->where('warehouse_code', $param['warehouse_code']);
        }
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $warehouse_list = $this->db->get($this->_table)->result_array();
        foreach ($warehouse_list as &$warehouse){
            $warehouse['warehouse_type'] = $param['warehouse_type'][$warehouse['warehouse_type']];
        }
        if ($is_array) {
            return $warehouse_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($warehouse_list, $result->num_rows);
        }
    }

    /**
     * 保存仓库数据
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_warehouse(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['warehouse_id'])) {
            $this->get($data['warehouse_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        $data['warehouse_status'] = intval(isset($data['warehouse_status']));
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
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
     * 根据【仓库ID|仓库编码】获取仓库信息
     *
     * @param string $value
     * @param string $field
     * @return array
     * @throws Exception
     */
    public function get($value = '', $field = 'warehouse_id')
    {
        if (in_array($field, ['warehouse_id', 'warehouse_code'])) {
            if ($field === 'warehouse_id') {
                $warehouse = $this->db->get_where($this->_table, ['warehouse_id' => intval($value)])->row_array();
            } else {
                $warehouse = $this->db->get_where($this->_table, ['warehouse_code' => strtoupper(trim($value))])->row_array();
            }
            if (empty($warehouse)) throw new Exception('请传入正确的【仓库ID|仓库编码】' . $value);
            return $warehouse;
        } else {
            throw new Exception('请传入【仓库ID|仓库编码】');
        }
    }

    /**
     * 返回仓库类型
     *
     * @return array
     */
    public function get_warehouse_type()
    {
        return $this->_warehouse_type;
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
        }
        if (!empty($param['warehouse_type'])) {
            $this->db->where('warehouse_type', intval($param['warehouse_type']));
        }
        if (!empty($param['warehouse_name'])) {
            $this->db->like('warehouse_name', $param['warehouse_name']);
        }
        if (!empty($param['warehouse_code'])) {
            $this->db->where('warehouse_code', $param['warehouse_code']);
        }
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $warehouse_list = $this->db->get($this->_table)->result_array();
        foreach ($warehouse_list as &$warehouse) {
            $warehouse['warehouse_type'] = $this->_warehouse_type[$warehouse['warehouse_type']];
            $warehouse['create_time'] = date('Y-m-d H:i:s', $warehouse['create_time']);
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
        if (!isset($this->_warehouse_type[$data['warehouse_type']])) {
            throw new Exception('仓库类型无效');
        }
        if (!empty($data['warehouse_id'])) {
            $this->get($data['warehouse_id']);
            $where['warehouse_id !='] = $data['warehouse_id'];
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        $where['warehouse_code'] = $data['warehouse_code'];
        $warehouse = $this->db->get_where($this->_table, $where)->row_array();
        if (!empty($warehouse)) {
            throw new Exception($data['warehouse_code'] . '--已经存在该仓库编码');
        }
        $info['warehouse_code'] = $data['warehouse_code'];
        $info['warehouse_name'] = $data['warehouse_name'];
        $info['warehouse_type'] = intval($data['warehouse_type']);
        $info['update_userid'] = $user_id;
        $info['warehouse_status'] = intval(isset($data['warehouse_status']));
        if (!empty($data['warehouse_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['warehouse_id' => $data['warehouse_id']]);
        } else {
            $done_status = $this->db->insert($this->_table, $info);
        }
        if ($done_status) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }

    /**
     * 变更仓库状态
     *
     * @param int $warehouse_id
     * @param int $warehouse_status
     * @return array|bool
     * @throws Exception
     */
    public function change_status($warehouse_id = 0, $warehouse_status = 0)
    {
        $warehosue = $this->get($warehouse_id);
        if ($warehosue['warehouse_status'] === intval($warehouse_status)) {
            return TRUE;
        }
        $exec_status = $this->db->update($this->_table, ['warehouse_status' => intval($warehouse_status)], 'warehouse_id = ' . intval($warehouse_id));
        if ($exec_status) {
            return TRUE;
        } else {
            return $this->db->error();
        }
    }
}
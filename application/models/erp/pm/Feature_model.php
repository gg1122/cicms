<?php

/**
 * 规格模型／特性模型
 * User: kendo
 */
class Feature_model extends CI_Model
{
    private $_table = 'erp_feature';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($feature_id = 0)
    {
        $feature = $this->db->get_where($this->_table, ['feature_id' => intval($feature_id)])->row_array();
        if (empty($feature)) throw new Exception('Feature id is not correct');
        return $feature;
    }

    /**
     * 获取规格列表/特性列表
     *
     * @param array $param
     * @param bool $need_array
     * @param bool $need_page
     * @return string
     */
    public function get_feature(array $param, $need_array = TRUE, $need_page = TRUE, $column = [])
    {
        if (!empty($column) && is_array($column)) {
            $this->db->select(join(',', $column));
        } else {
            $this->db->select('feature_id,feature_name,feature_status,from_unixtime(create_time) create_time');
        }
        if (!empty($param['feature_name'])) {
            $this->db->like('feature_name', $param['feature_name']);
        }
        if (isset($param['feature_status']) && $param['feature_status'] !== '') {
            $this->db->where('feature_status', intval($param['feature_status']));
        }
        if ($need_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $feature_list = $this->db->get($this->_table)->result_array();
        if ($need_array) {
            return $feature_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($feature_list, $result->num_rows);
        }
    }

    /**
     * 保存规格/特性
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_feature(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        $info['feature_name'] = trim($data['feature_name']);
        if (isset($data['feature_id'])) {
            $this->get($data['feature_id']);
            $check_exists = $this->db->select('feature_id')->get_where($this->_table, ['feature_name' => $info['feature_name'], 'feature_id !=' => $data['feature_id']])->row_array();
            if (!is_null($check_exists)) {
                throw new Exception('当前规格已经存在');
            }
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        $info['update_time'] = $time;
        $info['update_userid'] = $user_id;
        $info['feature_status'] = intval(isset($data['feature_status']));
        if (isset($data['feature_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['feature_id' => intval($data['feature_id'])]);
        } else {
            $done_status = $this->db->insert($this->_table, $info);
        }
        if ($done_status) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}

<?php

/**
 * 品牌系列模型
 *
 * User: kendo
 */
class Brand_series_model extends CI_Model
{
    private $_table = 'erp_brand_series';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 根据系列ID获取系列数据
     *
     * @param int $series_id
     * @return array
     * @throws Exception
     */
    public function get($series_id = 0)
    {
        $series = $this->db->get_where($this->_table, ['series_id' => intval($series_id)])->row_array();
        if (empty($series)) throw new Exception(' 请传入正确的系列ID');
        return $series;
    }

    /**
     * 获取系列列表
     *
     * @param array $param
     * @param bool $is_array
     * @param bool $is_page
     * @return string
     */
    public function get_series(array $param, $is_array = TRUE, $is_page = TRUE)
    {
        $this->db->select('s.series_id,s.series_name,s.series_code,b.brand_name,b.brand_code');
        $this->db->from($this->_table . ' s');
        $this->db->join('erp_brand b', 's.brand_id = b.brand_id');
        if (!empty($param['brand_id'])) {
            $this->db->where('b.brand_id', intval($param['brand_id']));
        }
        if (!empty($param['series_name'])) {
            $this->db->like('series_name', $param['series_name']);
        }
        if (isset($param['series_status']) && $param['series_status'] !== '') {
            $this->db->where('series_status', intval($param['series_status']));
        }
        if ($is_page) {
            $page = isset($param['page']) ? intval($param['page']) : 1;
            $limit = isset($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $series_list = $this->db->get()->result_array();
        if ($is_array) {
            return $series_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($series_list, $result->num_rows);
        }
    }

    /**
     * 保存系列数据
     *
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_series(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (isset($data['series_id'])) {
            $this->get($data['series_id']);
        } else {
            $data['create_time'] = $time;
            $data['create_userid'] = $user_id;
        }
        $data['update_time'] = $time;
        $data['update_userid'] = $user_id;
        $data['series_status'] = intval(isset($data['category_status']));
        if ($this->db->replace($this->_table, $data)) {
            return TRUE;
        } else {
            throw new Exception($this->db->error());
        }
    }
}
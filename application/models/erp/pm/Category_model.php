<?php

/**
 * 分类模型
 * User: kendo
 */
class Category_model extends CI_Model
{
    private $_table = 'erp_category';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 获取分类
     * @param int $category_id
     * @throws Exception
     */
    public function get($category_id = 0)
    {
        $category = $this->db->get_where($this->_table, ['category_id' => intval($category_id)])->row_array();
        if (empty($category)) throw new Exception('Missing Record');
    }

    /**
     * 获取分类列表
     * @param array $param
     * @param bool $need_array
     * @param bool $need_page
     * @param array $column
     * @return mixed
     */
    public function get_category(array $param, $need_array = TRUE, $need_page = TRUE, $column = [])
    {
        if (empty($column) || !is_array($column)) {
            $column = [
                'category_id',
                'category_fid',
                'category_level',
                'category_name',
                'category_desc',
                'category_code',
                'category_status',
                'from_unixtime(create_time) create_time'
            ];
        }
        $this->db->select(join(',', $column));
        if (!empty($param['category_name'])) {
            $this->db->like('category_name', trim($param['category_name']));
        }
        if (!empty($param['category_code'])) {
            $this->db->where('category_code', strtoupper(trim($param['category_code'])));
        }
        if (!empty($param['category_desc'])) {
            $this->db->like('category_desc', $param['category_desc']);
        }
        if (!empty($param['category_level'])) {
            $this->db->where('category_level', intval($param['category_level']));
        }
        if ($need_page) {
            $page = !empty($param['page']) ? intval($param['page']) : 1;
            $limit = !empty($param['limit']) ? intval($param['limit']) : 10;
            $this->db->limit($limit, ($page - 1) * $limit);
        }
        $category_list = $this->db->get($this->_table)->result_array();
        if ($need_array) {
            return $category_list;
        } else {
            $result = $this->db->simple_query(filter_limit_sql($this->db->last_query()));
            return send_list_json($category_list, $result->num_rows);
        }
    }

    public function get_category_tree()
    {
        $this->db->select('category_id,category_fid,category_name,category_right,category_left,category_status');
        $this->db->where('category_status', 1);
        $this->db->order_by('category_sort');
        $category_list = $this->db->get($this->_table)->result_array();
        $tree = [];
        foreach ($category_list as $category) {
            $tree[] = [
                'id' => $category['category_id'],
                'pId' => $category['category_fid'],
                'name' => $category['category_name'],
                'open' => ($category['category_right'] - $category['category_left']) > 1,
                'checked' => boolval($category['category_status']),
                'noRemoveBtn' => TRUE,
                'noEditBtn' => TRUE,
            ];
        }
        return $tree;
    }

    /**
     * 保存分类数据
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function save_category(array $data)
    {
        $time = time();
        $user_id = $this->session->get_userdata()['user_id'];
        if (!isset($data['category'])) {
            show_error('缺少category参数');
        }
        $category_list = explode(',', $data['category']);
        $category_list_new = [];
        //分类ID+父级ID+分类名称+分类htmlID+分类层级
        foreach ($category_list as $category_sort => $category_str) {
            $category = explode('::', $category_str);
            $tree = explode('_', $category[3]);
            $category_id = intval($category[0]);
            $category_list_new[$tree[1]] = [
                'category_id' => $category_id,
                'category_fid' => $category[1], //这里父级树ID
                'category_name' => trim($category[2]),
                'category_sort' => $category_sort,
                'category_level' => intval($category[4]),
            ];
        }
        try {
            $this->db->trans_begin();
            $this->db->update($this->_table, ['category_status' => 0, 'update_time' => $time, 'update_userid' => $user_id]);
            foreach ($category_list_new as $category) {
                if ($category['category_fid'] > 0) {
                    $category['category_fid'] = $category_list_new[$category['category_fid']]['category_id'];
                }
                $check_exists = $this->db->select('category_id')->get_where($this->_table, ['category_id' => $category['category_id']])->row_array();
                $category['update_time'] = $time;
                $category['update_userid'] = $user_id;
                $category['category_status'] = 1;
                if (is_null($check_exists)) { //新的分类
                    unset($category['category_id']);
                    $category['create_time'] = $time;
                    $category['create_userid'] = $user_id;
                    $done_status = $this->db->insert($this->_table, $category);
                } else {
                    $done_status = $this->db->update($this->_table, $category, ['category_id' => $category['category_id']]);
                }
                if (!$done_status) {
                    throw new Exception($this->db->error());
                }
            }
            $this->db->trans_commit();
            return TRUE;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            throw new Exception($e->getMessage());
        }
    }
}
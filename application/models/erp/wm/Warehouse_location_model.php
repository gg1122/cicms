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
        $param_int = ['location_id', 'warehouse_id', 'section_id'];
        foreach ($param_int as $column) {
            if (!empty($param[$column])) {
                $this->db->where('l.' . $column, intval($param[$column]));
            }
        }
        if (isset($param['location_status']) && $param['location_status'] !== '') {
            $this->db->where('location_status', intval($param['location_status']));
        }
        if (!empty($param['location_code'])) {
            $this->db->where('location_code', $param['location_code']);
        }
        if (!empty($param['section_code'])) {
            $this->db->where('section_code', $param['section_code']);
        }
        if (!empty($param['section_name'])) {
            $this->db->where('section_name', $param['section_name']);
        }
        $this->db->from($this->_table . ' l');
        $this->db->join('erp_warehouse_section s', 'l.section_id = s.section_id');
        $this->db->join('erp_warehouse w', 'l.warehouse_id = w.warehouse_id');
        $this->db->order_by('location_sort asc');
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
        $info = [];
        if (!empty($data['location_id'])) {
            $this->get($data['location_id']);
            $where['location_id !='] = $data['location_id'];
        } else {
            $info['create_time'] = $time;
            $info['create_userid'] = $user_id;
        }
        if (!empty($data['warehouse_id'])) {
            $info['warehouse_id'] = intval($data['warehouse_id']);
        } elseif (!empty($data['warehouse_code'])) {
            $warehouse = $this->warehouse_model->get($data['warehouse_code'], 'warehouse_code');
            $info['warehouse_id'] = $warehouse['warehouse_id'];
        }
        if (!empty($data['section_id'])) {
            $info['section_id'] = intval($data['section_id']);
        } elseif (!empty($data['section_code'])) {
            $section = $this->warehouse_section_model->get($data['section_code'], 'section_code');
            if ($section['warehouse_id'] !== $info['warehouse_id']) {
                throw new Exception('区域:' . $data['section_code'] . '--仓库归属错误');
            }
            $info['section_id'] = $section['section_id'];
        }
        $info['location_code'] = strtoupper(trim($data['location_code']));
        //库位查重
        $where['location_code'] = $info['location_code'];
        $where['section_id'] = $info['section_id'];
        $where['warehouse_id'] = $info['warehouse_id'];
        $location = $this->db->get_where($this->_table, $where)->row_array();
        if (!empty($location)) {
            throw new Exception($info['location_code'] . '--已经存在该仓库库位');
        }
        $info['location_sort'] = intval($data['location_sort']);
        $info['location_status'] = intval(isset($data['location_status']));
        $info['update_time'] = $time;
        $info['update_userid'] = $user_id;
        if (!empty($data['location_id'])) {
            $done_status = $this->db->update($this->_table, $info, ['location_id' => $data['location_id']]);
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
     * 保存导入的库位
     *
     * @param string $file_name
     * @throws Exception
     */
    public function save_import($file_name = '')
    {
        $this->load->library("excel");
        $header_column = ['库位编码', '区域编码', '仓库编码', '库位排序'];
        $excelSheet = $this->excel->get_data($file_name, $header_column);
        try {
            $this->db->trans_begin();
            for ($i = 2; $i <= $excelSheet->getHighestRow(); $i++) {
                if (empty($excelSheet->getCell('A' . $i)->getValue())) {
                    continue;
                }
                $data = [
                    'location_code' => $excelSheet->getCell('A' . $i)->getValue(),
                    'location_sort' => $excelSheet->getCell('D' . $i)->getValue(),
                    'section_code' => $excelSheet->getCell('B' . $i)->getValue(),
                    'warehouse_code' => $excelSheet->getCell('C' . $i)->getValue(),
                    'location_status' => 1
                ];
                $this->save_location($data);
            }
            $config['file_name'] = 'import_location_' . date('YmdHis') . '_' . $this->session->get_userdata()['user_id'];
            $this->load->model('erp/lm/upload_log_model');
            $this->upload_log_model->do_upload('file', 'excel', $config);
            $this->db->trans_commit();
        } catch (Exception $e) {
            $this->db->trans_rollback();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * 导出库位数据
     *
     * @param array $param
     * @param string $type
     * @return mixed
     * @throws Exception
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     * @throws PHPExcel_Writer_Exception
     */
    public function get_export(array $param, $type = 'excel')
    {
        if (empty($param['warehouse_id']) && (empty($param['search_type']) && empty($param['search_value']))) {
            throw new Exception('请选择仓库或者填写搜索条件和内容');
        }
        $location_list = $this->get_location($param, TRUE, FALSE);
        if (!empty($location_list)) {
            foreach ($location_list as $location) {
                $data['list'][] = [
                    $location['location_code'],
                    $location['warehouse_name'],
                    $location['section_name'],
                ];
            }
            $this->load->library("excel");
            $data['table_name'] = '库位列表_' . date('dHis') . '_' . $this->session->get_userdata()['user_id'];
            $data['table_header'] = ['库位编码', '仓库名称', '区域名称'];
            if ($type === 'excel') {
                $final_name = $this->excel->export_excel($data, $data['table_name']);
                return str_replace(FCPATH, $this->config->item('base_url'), $final_name);
            } else {
                $this->excel->export_csv($data);
            }
        } else {
            throw new Exception('暂无数据可导出');
        }
    }
}
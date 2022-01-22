<?php

/**
 * 文件上传记录模型
 *
 * User: kendo    2018/2/2
 */
class Upload_log_model extends CI_Model
{
    private $_table = 'erp_upload_log';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 上传文件
     *      检测文件夹是否存在，不存在的情况下，检测文件存储目录的合法性，合法即可循环创建目录
     * @param string $field
     * @param string $type
     * @param array $config
     * @return bool
     * @throws Exception
     */
    public function do_upload($field = '', $type = '', $config = [])
    {
        if (!empty($type)) {
            if (isset($this->config->item('upload')['excel'])) {
                $config = array_merge($this->config->item('upload')['excel'], $config);
            } else {
                throw new Exception($type . '--请设置文件的上传配置!');
            }
        }
        if (empty($config)) {
            throw new Exception($type . '--请设置文件有效的上传配置');
        }
        $config['upload_path'] .= date('Ym');
        if (!file_exists($config['upload_path'])) {
            if (strpos($config['upload_path'], BASEUPLOAD) === 0) {
                @mkdir($config['upload_path'], 0777, TRUE);
            } else {
                throw new Exception('文件存储目录非法');
            }
        }
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($field)) {
            throw new Exception($this->upload->display_errors());
        } else {
            $this->save_log($this->upload->data());
            return TRUE;
        }
    }

    /**
     * 记录上传文件信息
     *
     * @param array $data
     * @return CI_DB_active_record|CI_DB_result
     */
    public function save_log(array $data)
    {
        $info = [
            'upload_to' => $this->uri->uri_string(),
            'client_name' => $data['client_name'],
            'file_name' => $data['file_name'],
            'file_path' => str_replace(FCPATH, '', $data['full_path']),
            'upload_time' => time(),
            'upload_userid' => $this->session->get_userdata()['user_id'],
        ];
        return $this->db->insert($this->_table, $info);
    }
}
<?php
/**
 * User: kendo    2018/2/2
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

Class Excel
{
    private $_excelSheet;

    /**
     * 检测EXCEL表头是否合法
     *
     * A-Z  65-90
     * @param array $header_column
     * @throws Exception
     */
    public function check_excel(array $header_column)
    {
        foreach ($header_column as $key => $column) {
            if ($this->_excelSheet->getCell(strtoupper(chr(65 + $key)) . '1')->getValue() !== $column) {
                throw new Exception(strtoupper(chr(65 + $key)) . '1，名称不是:' . $column);
            }
        }
    }

    /**
     * 获取EXCEL数据
     *
     * @param string $file_name
     * @param array $header_column
     * @return PHPExcel_Worksheet
     * @throws Exception
     */
    public function get_info($file_name = '', $header_column = [])
    {
        $excelReader = PHPExcel_IOFactory::createReader('Excel2007');
        $excelList = $excelReader->load($file_name);
        $excelSheet = $excelList->getActiveSheet();
        $this->_excelSheet = $excelSheet;
        if (!empty($header_column)) {
            $this->check_excel($header_column);
        }
        if ($excelSheet->getHighestDataRow() < 1 + intval(!empty($header_column))) {
            throw new Exception('上传的EXCEL没有有效的行数据');
        }
        if ($excelSheet->getHighestDataRow() > 1000) {
            throw new Exception('上传的EXCEL行数大于1000行');
        }
        if ($excelSheet->getHighestColumn() > 26) {
            throw new Exception('上传的EXCEL列数不可超过26列');
        }
        return $this->_excelSheet;
    }
}
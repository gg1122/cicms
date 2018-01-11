<?php
/**
 * User: kendo
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 图片的配置
 */
$config['image']['upload_path'] = './upload/image/';
$config['image']['allowed_types'] = 'gif|jpg|jpeg|png';
$config['image']['max_size'] = '2048';
$config['image']['max_width'] = '1024';
$config['image']['max_height'] = '768';

/**
 * EXCEL的配置
 */
$config['excel']['upload_path'] = './upload/excel/';
$config['excel']['allowed_types'] = 'xls';
$config['excel']['max_size'] = '10';


/**
 * CSV的配置
 */
$config['csv']['upload_path'] = './upload/csv/';
$config['csv']['allowed_types'] = 'csv';
$config['csv']['max_size'] = '10';
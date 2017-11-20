<?php

/**
 * 自定义函数
 *
 * User: kendo
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 获取文字图标
 *
 * @param string $icon
 * @return string
 */
function get_icon_str($icon = '')
{
    if (empty($icon)) return '';
    if (strstr($icon, 'fa')) {
        $menu_icon = '<i class="fa ' . $icon . '" aria-hidden="true" data-icon="' . $icon . '"></i>';
    } else {
        $menu_icon = '<i class="layui-icon" data-icon="' . $icon . '">' . $icon . '</i>';
    }
    return $menu_icon;
}

/**
 * 登出
 */
function logout()
{
    $ci = &load_class('Model', 'core');
    $ci->session->unset_userdata('user_name');
    if (IS_AJAX) {
        exit(json_encode(array('status' => TRUE, 'message' => 'Success')));
    } else {
        header('location:/login');
    }
}
<?php
/**
 * 重写错误展示
 * User: kendo
 */

/**
 * 重写404页面，AJAX提交时，返回JSON数据
 */
if (!function_exists('show_404')) {
    function show_404($page = '', $log_error = TRUE)
    {
        if (IS_AJAX) {
            exit(json_encode(array('status' => FALSE, 'message' => 'The page you requested was not found.')));
        }
        $_error =& load_class('Exceptions', 'core');
        $_error->show_404($page, $log_error);
        exit(4); // EXIT_UNKNOWN_FILE
    }
}
<?php

/**
 * 订单商品模型
 * User: kendo    2018/1/26
 */
class Platform_order_item_model extends CI_Model
{
    private $_table = 'erp_platform_order_item';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}

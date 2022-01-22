<?php

/**
 * User: kendo    2018/1/29
 */
class Inventory_frozen_model extends CI_Model
{
    private $_table = 'erp_inventory frozen';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
<?php
/**
 * User: kendo    2018/1/29
 */
class Supplier_product_model extends CI_Model{
    private $_table = 'erp_supplier_product';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get(){}
}
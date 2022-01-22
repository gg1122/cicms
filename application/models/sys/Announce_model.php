<?php

/**
 * User: kendo    2018/1/29
 */
class Announce_model extends CI_Model
{
    private $_table = 'sys_announce';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

}
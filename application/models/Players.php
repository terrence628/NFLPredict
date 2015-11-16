<?php

class Players extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function form_insert($data) 
    {
        $this->db->insert('roster', $data);
    }
}
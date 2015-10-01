<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Images
 *
 * @author Terrence
 */
class Images extends CI_Model {
    // constructor (a good pratice)
    function __construct()
    {
        parent::__construct();
    }
    
    //return all images, descending order by post date
    function all()
    {
        $this -> db -> order_by("id", "desc");
        $query = $this -> db -> get('images');
        return $query -> result_array();
    }
    
    function newest()
    {
        $this->db->order_by("id", "desc");
        $this->db->limit(3);
        $query = $this->db->get('images');
        return $query->result_array();
    }
}

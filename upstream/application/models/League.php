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
class League extends CI_Model {
    // constructor (a good pratice)
    function __construct()
    {
        parent::__construct();
    }
    
    //return all images, descending order by post date
    function league()
    {
        $this -> db -> order_by("id", "asc");
        $query = $this -> db -> get('league');
        return $query -> result_array();
    }
}

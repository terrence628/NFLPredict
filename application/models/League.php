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
        $sort = $this->session->userdata("team_ordering");
        $sort2= $this->session->userdata("team_point");
        $this -> db -> order_by($sort, "asc");
        $query = $this -> db -> get('league');
        return $query -> result_array();
    }
    
    function conference($conference)
    {
        $sort = $this->session->userdata("team_ordering");
        $sort2= $this->session->userdata("team_point");
        $this -> db -> where("conference = '$conference'");
        $this -> db -> order_by($sort, "asc");
        $this -> db -> order_by($sort2, "asc");       
        $query = $this -> db -> get('league');
        return $query -> result_array();
    }
    
    function division($division)
    {
        $sort = $this->session->userdata("team_ordering");
        $sort2= $this->session->userdata("team_point");
        $this -> db -> where("division = '$division'");
        $this -> db -> order_by($sort, "asc");
        $this -> db -> order_by($sort2, "asc");       
        $query = $this -> db -> get('league');
        return $query -> result_array();
    }
}

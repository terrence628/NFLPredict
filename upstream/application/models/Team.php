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
class Team extends CI_Model {
    // constructor (a good pratice)
    function __construct()
    {
        parent::__construct();
    }
    
    //return all images, descending order by post date
    function roster()
    {
        $this -> db -> order_by("id", "asc");
        $query = $this -> db -> get('roster');
        return $query -> result_array();
    }   
        //return all images, descending order by post date
    function roster_name()
    {
        $this -> db -> order_by("name", "asc");
        $query = $this -> db -> get('roster');
        return $query -> result_array();
    }   
    
    function roster_jersey()
    {
        $this -> db -> order_by("player_number", "asc");
        $query = $this -> db -> get('roster');
        return $query -> result_array();
    }  
    
    function roster_position()
    {
        $this -> db -> order_by("Pos", "asc");
        $query = $this -> db -> get('roster');
        return $query -> result_array();
    }  
    
    function get($which)
    {
        $this -> db -> where("id = $which");
        $query = $this -> db -> get('roster');
        return $query -> result_array();
    }
    
    function update_player($id,$data){
        $this->db->where('id', $id);
        $this->db->update('roster', $data);
    }
    
    function delete_player($id){
        $this->db->where('id', $id);
        $this->db->delete('roster');
    }
}

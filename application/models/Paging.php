<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Paging model for querying database and preparing for pagingation
 *
 * @author Pouya Sarang
 */
class Paging extends CI_Model {
    // constructor (a good pratice)
    function __construct()
    {
        parent::__construct();
    }
    
    //return all images, descending order by post date
    function page_records($per_page, $offset)
    {
        $query = $this->db->query(" SELECT * FROM roster  LIMIT $offset, $per_page");
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $f)
              {
                 $records[] = $f;
             }
            return $records;
        }
    }
}

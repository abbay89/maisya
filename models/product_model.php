<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
   
	public function get_detail(){
		 $query = "select * from events";
        return $this->db->query($query)->result();
	}
	public function getfilter($filter){
		
		 $query = "select * from masterfilter where groupFilter = '".$filter."'";
        return $this->db->query($query)->result_array();
	}
}

?>

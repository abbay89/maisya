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

class Admin_model extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
    }

    function getProductM() {
		$this->db->order_by('product_id','asc');
        return $this->db->get_where('wedding_rings',array('gender'=>'L'))->result();
    }
	
	function getProductF() {
		$this->db->order_by('product_id','asc');
        return $this->db->get_where('wedding_rings',array('gender'=>'P'))->result();
    }
	
	 function getWedding() {
        return $this->db->query('SELECT wedding_bond.*, 
							(SELECT suggest_price FROM wedding_rings WHERE product_id = wedding_bond.product_male_id) as suggest_m, 
							(SELECT suggest_price FROM wedding_rings WHERE product_id = wedding_bond.product_female_id) as suggest_p, 
							(SELECT unit_price FROM wedding_rings WHERE product_id = wedding_bond.product_male_id) as unit_m, 
							(SELECT unit_price FROM wedding_rings WHERE product_id = wedding_bond.product_female_id) as unit_p FROM wedding_bond')->result();
    }
	
}
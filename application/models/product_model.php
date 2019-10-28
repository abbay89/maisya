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
	
	public function insertProduct($data){
		
		$check = $this->db->get_where('wedding_rings',array('product_id'=>$data['product_id']));
		
		if(count($check->result()) == 0){
			$this->db->insert('wedding_rings',$data);
		}
	}
	
	public function getWeddingDetail($id){
		
	
		
        $query = $this->db->query("SELECT * FROM wedding_bond WHERE wedding_id = '".$id."'");
		
		foreach($query->result() as $rows){
			
			 $male = $this->db->query("SELECT * FROM wedding_rings WHERE product_id = '".$rows->product_male_id."'")->row();
			 $female = $this->db->query("SELECT * FROM wedding_rings WHERE product_id = '".$rows->product_female_id."'")->row();
			 
		}
		
		$wedding = array(
				   'wedding_bond'=>$query->row(),
				   'male'=>$male,
				   'female'=>$female
				   );
		
	
		return $wedding;
	} 
}

?>

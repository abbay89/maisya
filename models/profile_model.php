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

class Profile_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	public function getDetailcus($id)
	{
		$sql	= "select * from customer where cust_email = '".$id."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->row();
	}
	 public function update_customer($customer, $cust_id) {
        $this->db->where('cust_username', $cust_id);
        $this->db->update('customer', $customer);
    }
	public function insert_testimonial($testimonial) {
        $this->db->insert('testimonial', $testimonial);
        return $this->db->insert_id();
    }
}

?>

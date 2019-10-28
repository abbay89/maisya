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

class Checkout_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	public function getAllBank()
	{
		$sql	= "select * from master_bank order by bank_name asc";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function order_hdr($orderid)
	{
		$sql	= "select * from `order` where order_code = '".$orderid."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->row();
	}
	public function order_dtl($orderid)
	{
		$sql	= "select * from `order` join order_detail on order.order_id = order_detail.order_id where order_code = '".$orderid."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function insert_order($orderheader) {
        $this->db->insert('order', $orderheader);
        return $this->db->insert_id();
    }
	public function insert_detorder($orderdetail) {
        $this->db->insert('order_detail', $orderdetail);
        return $this->db->insert_id();
    }
}

?>

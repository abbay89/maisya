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
	public function shopping_cart()
	{
		$sql	= "select id,name,price,sum(qty) as qty from shopping_cart 
		where user_id = '".$this->session->userdata('email')."' group by id,name,price ";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function get_count_cart()
	{
		$sql	= "select sum(qty) as total from shopping_cart where user_id = '".$this->session->userdata('email')."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql)->row();
		return $query->total;
	}
	public function order_dtl($orderid)
	{
		$sql	= "select * from `order` join order_detail on order.order_id = order_detail.order_id where order_code = '".$orderid."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function insert_address($address) {
        $this->db->insert('customer_address', $address);
        return $this->db->insert_id();
    }
	public function insert_order($orderheader) {
        $this->db->insert('order', $orderheader);
		//echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
	public function insert_detorder($orderdetail) {
        $this->db->insert('order_detail', $orderdetail);
        return $this->db->insert_id();
    }
	public function insert_pointorder($orderdetail) {
        $this->db->insert('user_point', $orderdetail);
        return $this->db->insert_id();
    }
	public function getAllAddress(){
		$data	= $this->db->query("select * from customer_address where cust_id = '".$this->session->userdata('email')."'");
		return $data->result();
	}
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orderstatus extends CI_Controller {

    public function Orderstatus() {
        parent::__construct();
		//$this->load->model("checkout_model");
    }

    public function index() {
		$data['chart'] = $this->cart->contents();
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $totalqty;
		
		$allOrder = $this->db->query("select *  from `order`
		join customer on `order`.cust_id = customer.cust_id
		where customer.cust_email = '".$this->session->userdata('cust_username')."'")->result();
		
		
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['detail_prod']	= $allOrder;
		$data['footer']			= $footer;
        $this->load->view('orderstatus_page',$data);
    }
	public function remove($id){
		$this->db->query("delete  from wishlist where userid = '".$this->session->userdata('cust_username')."' and productid = '".$id."'");
		redirect("wishlist");
	}
	public function sumtotalorder($noinvoice)
	{
		$getamount = $this->db->query("select sum(ord_det_price) as total from order_detail where order_id = '".$noinvoice."'");
		return $getamount->total;
	}
	
}

?>

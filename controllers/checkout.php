<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function Checkout() {
        parent::__construct();
		$this->load->model("checkout_model");
    }

    public function index() {
		$data['chart'] = $this->cart->contents();
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['allBank']	= $this->checkout_model->getAllBank();
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
        $this->load->view('checkout_page',$data);
    }
	public function prosescheckout(){
		//print_r($_POST);
		$order['order_name']  = $this->input->get_post('order_name', TRUE);
		$order['order_phone'] = $this->input->get_post('order_phone', TRUE);
		$order['order_email'] = $this->input->get_post('order_email', TRUE);
		$order['order_notes'] = $this->input->get_post('order_notes', TRUE);
		$order['order_date']  = date("Y-m-d H:i:s");
		$order['order_code']  = date("YmdHis");
		$order['cust_id'] 	  = $this->session->userdata('cust_id');
		$order_id = $this->checkout_model->insert_order($order);
		for($loop = 0; $loop <= count($_POST['id']) - 1;$loop++)
		{
			$orderdet['order_id']  			= $order_id;
			$orderdet['ord_det_qty']  	= $_POST['qty'][$loop];
			$orderdet['ord_det_price']  	= $_POST['price'][$loop];
			$orderdet['menu_id']  			= $_POST['id'][$loop];
			$this->checkout_model->insert_detorder($orderdet);
			
		}
		
		redirect("invoice/detail/".$order['order_code']);
	}
}

?>

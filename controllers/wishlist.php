<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function Wishlist() {
        parent::__construct();
		//$this->load->model("checkout_model");
    }

    public function index() {
		$data['chart'] = $this->cart->contents();
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $totalqty;
		
		
		$allwishlist = $this->db->query("select *  from wishlist where userid = '".$this->session->userdata('cust_username')."'")->result();
		
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['detail_prod']	= $allwishlist;
		$data['footer']			= $footer;
        $this->load->view('wishlist_page',$data);
    }
	public function remove($id){
		$this->db->query("delete  from wishlist where userid = '".$this->session->userdata('cust_username')."' and productid = '".$id."'");
		redirect("wishlist");
	}
	
}

?>

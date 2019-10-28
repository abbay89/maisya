<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function Invoice() {
        parent::__construct();
		$this->load->model("checkout_model");
    }

    public function detail($id) {
		
		$data['invoice_header'] = $this->checkout_model->order_hdr($id);		
		$data['invoice_detail'] = $this->checkout_model->order_dtl($id);		
		$data['allBank']	= $this->checkout_model->getAllBank();		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('invoice_page',$data);
		//$this->sendEmail($id,$data['invoice_header']->order_email);
		
    }
	public function detail_email($id) {
		$this->session->sess_destroy();
		$data['invoice_header'] = $this->checkout_model->order_hdr($id);		
		$data['invoice_detail'] = $this->checkout_model->order_dtl($id);		
		$data['allBank']	= $this->checkout_model->getAllBank();
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('invoice_email_page',$data);
    }
	
	public function sendEmail($id,$email){
		require __DIR__ . DIRECTORY_SEPARATOR.'../../mail_function.php';

		mailreminder($email,$id, "Invoice Order");
		$this->session->sess_destroy();
	}
	
}

?>

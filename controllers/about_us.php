<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About_us extends CI_Controller {

    public function About_us() {
        parent::__construct();
		$this->load->model("contact_model");
		
    }

    public function delivery_term() {
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('static_page/delivery_term',$data);
		
    }

    public function diamond_guide() {
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('static_page/diamond_guide',$data);
    }
	public function contact(){
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('content_page/contactus',$data);
	}
	public function store_location(){
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('content_page/storeloc',$data);
	}
	public function savecontact()
	{
		//print_r($_POST);
		$contact['cu_name'] 	= $this->input->get_post('contact_name', TRUE);
		$contact['cu_email'] 	= $this->input->get_post('contact_email', TRUE);
		$contact['cu_detail'] 	= $this->input->get_post('message', TRUE);
		$contact['cu_phone'] 	= $this->input->get_post('contact_phone', TRUE);
		$contact['cu_country'] 	= $this->input->get_post('contact_country', TRUE);
		
		$this->contact_model->insert_contact($contact);
		redirect("about_us/contact");
		//echo $this->db->last_query();
	}
}

?>

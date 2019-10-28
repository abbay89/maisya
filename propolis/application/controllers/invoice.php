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
		$this->load->model("home_model");
		$this->load->model("user_model");
		$this->loadJS = array (
			'/assets/js/skdslider.min.js',
			'/assets/js/custom.js',
			'/assets/js/slick.min.js');
			
		$this->loadCSS = array(
			
			'/assets/css/slick.css',
			'/assets/css/slick-theme.css',
			'/assets/css/skdslider.css',
			'/assets/css/slider.css',
			'/assets/css/bootstrap.min.css',
			'/assets/css/style.css'
		);	
    }

    public function detail($id) {
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		
		$order_hdr		= $this->db->query("select * from `order` where order_id = '".$id."'");
		$data['header']	= $order_hdr->result();
		
		$order_dtl		= $this->db->query("select * from `order_detail` where order_id = '".$id."'");
		$data['detail']	= $order_dtl->result_array();
		
		$order_dtl		= $this->db->query("select * from `order_detail` where order_id = '".$id."'");
		
		$data['address']= $this->db->query("select * from customer_address where cust_ad_id = '".$data['header'][0]->cust_ad_id."'")->row();
        $this->load->view('invoice_page',$data);
		//$this->sendEmail($id,$data['invoice_header']->order_email);
		
    }
	public function detail_email($id) {
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		$this->session->sess_destroy();
		$data['invoice_header'] = $this->checkout_model->order_hdr($id);		
		$data['invoice_detail'] = $this->checkout_model->order_dtl($id);		
		$data['allBank']	= $this->checkout_model->getAllBank();
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$data['maxbook']	= $this->db->query("select inf_time from tb_infbook")->row();
        $this->load->view('invoice_email_page',$data);
    }
	
	public function sendEmail($id,$email){
		require __DIR__ . DIRECTORY_SEPARATOR.'../../mail_function.php';

		mailreminder($email,$id, "Invoice Order");
		$this->session->sess_destroy();
	}
	
}

?>

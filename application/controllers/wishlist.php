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
		
		$this->load->model("home_model");
		$this->load->model("checkout_model");
		
		$this->loadJS = array (
			'/assets/js/skdslider.min.js',
			'/assets/js/custom.js',
			'/assets/js/tagInput.js',
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

    public function index() {
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		$data['chart'] = $this->cart->contents();
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		
		
		$allwishlist = $this->db->query("select *  from wishlist where userid = '".$this->session->userdata('cust_username')."'")->result();
		
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['detail_prod']	= $allwishlist;
		$data['footer']			= $footer;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('wishlist_page',$data);
    }
	public function remove($id){
		$this->db->query("delete  from wishlist where userid = '".$this->session->userdata('cust_username')."' and productid = '".$id."'");
		redirect("wishlist");
	}
	
}

?>

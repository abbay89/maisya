<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Information extends CI_Controller {

    public function Information() {
        parent::__construct();
		$this->load->model("home_model");
		$this->load->model("checkout_model");
		
    }

    public function termpolicy() {
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('information/termpolicy',$data);
		
    }
    public function privpolicy() {
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('information/privpolicy',$data);
		
    }
	public function buyback() {
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('information/buyback',$data);
		
    }
	public function faq() {
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		$data['totalwhs']	=  $wh->total;
        $this->load->view('information/faq',$data);
		
    }
}

?>

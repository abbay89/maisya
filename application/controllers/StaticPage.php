<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staticpage extends CI_Controller {

    public function Staticpage() {
        parent::__construct();
		$this->load->model("home_model");
		$this->load->model("checkout_model");
		
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

    public function page($pagetitle) {
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		
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
		$titlenya				= explode("_",$pagetitle);
		$getData				= $this->db->query("select * from static_page where static_loc ='".$titlenya[1]."'")->row();
		$footer 				= $this->db->query("select * from company_profile")->result();
		
		//echo "select * from static_page where static_loc ='".$titlenya[1]."'";exit;
		$data['pagest']			= $titlenya[0];
		$data['footer']			= $footer;
		$data['titlepage']		= $titlenya[0]." / ".$getData->text_loc;
		$data['titlepage']		= $titlenya[1];
		$data['title_page']		= $getData->text_loc." Maisya";
		$data['urlpage']		= $getData->static_loc;
		$data['contentpage']	= $getData->static_desc;
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
        $this->load->view('static_page/all_content',$data);
		
    }
}

?>

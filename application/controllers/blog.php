<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function Blog() {
        parent::__construct();
		
		$this->loadJS = array (		
			'/assets/js/skdslider.min.js',
			'/assets/js/jquery-ui-1.9.2.custom.min.js',
			'/assets/js/multiaccordion.jquery.js',
			'/assets/js/jquery.simplePagination.js',
			'/assets/js/jquery.elevatezoom.js',
			'/assets/js/tagInput.js',
			'/assets/js/slick.min.js');
			
		$this->loadCSS = array(
			'/assets/css/slick.css',
			'/assets/css/slick-theme.css',
			'/assets/css/simplePagination.css',
			'/assets/css/pretty-checkbox.min.css',			
			'/assets/css/bootstrap.min.css',			
			'/assets/css/style.css',
			'/assets/css/multiaccordion.jquery.css'
		);
		
		$this->load->model('news_model');
		$this->load->model("home_model");
		$this->load->helper('tglindo_helper');
		$this->load->helper('imgresizeblog_helper');
    }
	
	
	public function page($index = 0){
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['title_page']			= 	"Maisya Jewellery Online Shop Blog";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');

		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		
		$id= '';
		$temp = 'news';
		
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$temp = 'news_detail';
		}
		
		$data['news'] = $this->news_model->getData($id);
		if(isset($_GET['id'])){
			$data['title_page']			= 	$data['news'][0]->title;
			$data['ogtitle_page']			= 	$data['news'][0]->title;
			$data['ogtimg_page']		= 	base_url()."assets/uploads/img_menu/".$data['news'][0]->image;
			$data['ogtimg_page']		= 	imgresizeblog($_GET['id']);
		}
		
		// echo "string";
		// echo '<img src="http://localhost/maisya/blog/Blogimage/23">';
	   $this->load->view($temp,$data);
		
	}

	
	
	
}
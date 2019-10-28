<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public function News() {
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
    }
	
	
	public function page($index){
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$id= '';
		$temp = 'news';
		
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$temp = 'news_detail';
		}
		
		$data['news'] = $this->news_model->getData($id);
		
		
	   $this->load->view($temp,$data);
		
	}
	
	
}
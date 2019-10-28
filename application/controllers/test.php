<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    public function Test() {
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
	
	public function index(){
		
		echo 'weeewewewewe';
		
	}
	
}
<?php
/*
ini_set('display_errors', E_ALL);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class orderreport extends CI_Controller {
	
    public function orderreport() {
		$css_files = array();
		$js_files = array();
		$js_footer = "";
		
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url());
            die();
        }
        $this->load->model('Menu_model');
		
		//templates
		
		$this->css_files[] = base_url()."assets/grocery_crud/themes/flexigrid/css/flexigrid.css";
		$this->css_files[] = base_url()."assets/grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css";
		$this->css_files[] = base_url()."assets/grocery_crud/css/ui/simple/jquery-ui-1.9.0.custom.min.css";

		$this->js_files[]	= base_url()."assets/grocery_crud/js/jquery-1.8.2.min.js";
		$this->js_files[]	= base_url()."assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.9.0.custom.min.js";
		$this->js_files[]	= base_url()."assets/grocery_crud/js/jquery_plugins/config/jquery.datepicker.config.js";
		
		$this->js_footer	= "
				<script type='text/javascript'>
					var default_javascript_path = '".base_url()."assets/grocery_crud/js';
					var default_css_path = '".base_url()."assets/grocery_crud/css';
					var default_texteditor_path = '".base_url()."assets/grocery_crud/texteditor';
					var default_theme_path = '".base_url()."assets/grocery_crud/themes';
					var base_url = '".base_url()."';
					var js_date_format = 'yy-mm-dd';
				</script>
		";		
    }

    public function index() {
        try {
			$data['nav']						= "orderreport";
			$data_content['css_files']			= $this->css_files;
			$data_content['js_files']			= $this->js_files;
			$data_content['js_footer']			= $this->js_footer;
			$data["output"] 	= $this->load->view('admin/orderreport.php',$data_content,true);
            $this->load->view('admin/dandelion.php', $data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
}

?>

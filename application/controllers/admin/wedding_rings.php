<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wedding_rings extends CI_Controller {

    public function Wedding_rings() {
        parent::__construct();
		$this->load->model("admin_model");
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        try {
			$crud = new grocery_CRUD();
            $crud->set_table('wedding_bond');
            $crud->set_subject('Cincin Pernikahan');
			
			$crud->columns('wedding_title', 'product_male_id','product_female_id','image');
			
			$product_male = array();
			$product_female = array();
			
			$productM = $this->admin_model->getProductM();
			$productF = $this->admin_model->getProductF();
			
			foreach($productM as $row){
				$product_male[$row->product_id] = $row->product_id.' / '.$row->product_name;
			}
			
			foreach($productF as $row){
				$product_female[$row->product_id] = $row->product_id.' / '.$row->product_name;
			}
			
			$crud->field_type('product_male_id','dropdown', $product_male);
			$crud->field_type('product_female_id','dropdown', $product_female);
			
            $crud->display_as('wedding_title', 'Nama');
			$crud->display_as('product_male_id', 'Product Male');
			$crud->display_as('product_female_id', 'Product Female');
			$crud->display_as('image', 'Image');
			
           
            $crud->set_field_upload('image', 'assets/uploads/img_menu/');
            
            $crud->callback_before_insert(array($this, 'create_wh_url'));
            $this->load($crud);
			
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'our_collection';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }
	function create_wh_url($post_array) {
        if (!empty($post_array['wh_title_en'])) {
            $this->load->model('menu_model');
            $url = $this->sanitizeStringForUrl($post_array['wh_title_en']);
            $i = 1;
            while ($this->menu_model->check_whatshot_url($url) != 0) {
                $url .= $i;
                $i++;
            }
            $post_array['wh_url'] = $url;
        }
        return $post_array;
    }

    function sanitizeStringForUrl($string) {
        $string = strtolower($string);
        $string = html_entity_decode($string);
        $string = str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), $string);
        $string = preg_replace('#[^\w\säüöß]#', null, $string);
        $string = preg_replace('#[\s]{2,}#', ' ', $string);
        $string = str_replace(array(' '), array('-'), $string);
        return $string;
    }
}

?>

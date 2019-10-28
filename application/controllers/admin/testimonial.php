<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    public function Testimonial() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        try {
			$crud = new grocery_CRUD();
            $crud->set_table('testimonial');
            $crud->set_subject('Testimonial');
			
			$crud->set_relation('user_testi', 'customer', 'cust_name');
			$crud->display_as('user_testi', 'Customer');
            $crud->display_as('testi_desc', 'Testimonial'); 
            $crud->display_as('show', 'Show on Home Page'); 
            $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
            $crud->columns('testi_desc','user_testi','show');
			$crud->field_type('show', 'dropdown', array('0' => 'Not Show', '2' => 'Show'));
            $this->load($crud);
			
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	
    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'hot';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}

?>

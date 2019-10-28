<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_us extends CI_Controller {

    public function Contact_us() {
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
            $crud->set_table('contact_us');
            $crud->set_subject('Contact Us');
            $crud->display_as('cu_name', 'Name');            
            $crud->display_as('cu_email', 'Email');
            $crud->display_as('cu_detail', 'Detail');
            $crud->display_as('cu_created_date', 'Date');
			$crud->field_type('cu_status', 'dropdown', array('0' => 'Unread', '1' => 'Read'));
           
            $crud->columns('cu_created_date','cu_name', 'cu_email','cu_detail','cu_status');
			$crud->order_by('cu_created_date','desc');
            
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

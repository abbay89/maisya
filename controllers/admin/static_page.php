<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Static_page extends CI_Controller {

    public function Static_page() {
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
            $crud->set_table('static_page');
            $crud->set_subject('Static Page');
            $crud->display_as('static_desc', 'Detail Page');
            $crud->display_as('text_loc', 'Link Page');
            $crud->columns('text_loc', 'static_desc');
			$crud->unset_fields('static_loc','text_loc');
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

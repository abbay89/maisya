<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Filter extends CI_Controller {

    public function Filter() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('user_model');
    }

    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('filterproduct');
            $crud->set_subject('Filter');
            $crud->field_type('groupname', 'dropdown', array('1' => 'COLLECTION', '2' => 'PRICE', '3' => 'DISCOUNT', '4' => 'GENDER', '5' => 'METAL TYPE', '6' => 'SHAPE', '7' => 'CUSTOMER REVIEW', '8' => 'STONE TYPE'));
			$crud->display_as('groupname', 'Group');
            $crud->display_as('filtername', 'Filter');
            $crud->display_as('fieldname', 'Field Name');

            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	private function load($crud) {
        $output = $crud->render();
        $output->nav = 'admin';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }
}

?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {

    public function Order() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url().'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
    }
    
    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('order');
            $crud->set_subject('Order');
            $crud->set_relation('cust_id', 'customer', 'cust_name');
            $crud->unset_add();
            $crud->unset_edit();  
            $crud->display_as('cust_id', 'Customer');
            
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'order';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}
?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function Customer() {
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
            $crud->set_table('customer');
            $crud->unset_columns('cust_password', 'cust_status');
            $crud->set_subject('Customer');
            $crud->display_as('cust_username', 'Username');
            $crud->display_as('cust_name', 'Name');
            $crud->display_as('cust_phone', 'Phone');
            $crud->display_as('cust_email', 'Email');
            $crud->display_as('cust_other_phone', 'Other Phone');

            $crud->add_action('List Address', base_url() . 'assets/grocery_crud/images/icons/color/house.png', base_url() . 'admin/customer/list_Address/', 'fancybox iframe');

            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function list_address($cust_id) {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('customer_address');

            $crud->field_type('cust_id', 'hidden', $cust_id);
            $crud->where('cust_id', $cust_id);
            $crud->set_relation('at_id', 'address_type', 'at_name_en');
            $crud->set_relation('city_id', 'city', 'city_name');
            $crud->columns('cust_ad_title', 'cust_ad_address', 'at_id', 'city_id');
            $crud->display_as('cust_ad_title', 'Address Name');
            $crud->display_as('cust_ad_address', 'Address');
            $crud->display_as('at_id', 'Address Type');
            $crud->display_as('city_id', 'City');

            $output = $crud->render();
            $this->load->view('admin/popup.php', $output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function reservation() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('reservation');
            $crud->set_relation('location_id', 'location', 'location_name_en');
            $crud->set_relation('cust_id', 'customer', 'cust_name');
            
            $crud->display_as('location_id', 'Location');
            $crud->display_as('cust_id', 'Customer');
            $crud->display_as('reserv_date', 'Reservation Date');
            $crud->display_as('reserv_status', 'Reservation Status');
            $crud->field_type('reserv_status', 'dropdown', array('1' => 'No-Location Selected', '2' => 'Reserved (Finish)'));
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();
            $crud->add_action('List Address', base_url() . 'assets/grocery_crud/images/icons/color/package.png', base_url() . 'admin/customer/reserv_detail/', 'fancybox iframe');

            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function reserv_detail($reserv_id) {
        try {
            $crud = new grocery_CRUD();
            $crud->set_subject('Reservation Detail');
            $crud->set_table('reservation_detail');

            $crud->field_type('reserv_id', 'hidden', $reserv_id);
            $crud->where('reserv_id', $reserv_id);
            $crud->set_relation('menu_id', 'menu', 'title_en');

            $crud->columns('menu_id', 'reserv_detail_price', 'qty');
            $crud->display_as('menu_id', 'Menu');
            $crud->display_as('reserv_detail_price', 'Price');
            $crud->display_as('qty', 'Quantity');
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();
            $output = $crud->render();
            $this->load->view('admin/popup.php', $output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function contact_us() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('contact_us');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            
            $crud->display_as('cu_name', 'Name');
            $crud->display_as('cu_email', 'Email');
            $crud->display_as('cu_detail', 'Detail');
            $crud->display_as('cu_dept', 'Department');
            $crud->display_as('cu_ip', 'IP');
            $crud->display_as('cu_created_date', 'Date Submit');
            $crud->columns('cu_name', 'cu_email','cu_detail','cu_dept', 'cu_created_date');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'customer';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}

?>

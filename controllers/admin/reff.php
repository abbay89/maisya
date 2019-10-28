<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reff extends CI_Controller {

    public function Reff() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
    }

    public function menu_show() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('menu_show');
            $crud->set_subject('Show Time');
            $crud->display_as('ms_title', 'Show Title');
            $crud->display_as('ms_time_from', 'Time Start');
            $crud->display_as('ms_time_from2', 'Time Start 2');
            $crud->display_as('ms_time_end', 'Time End');
            $crud->display_as('ms_time_end2', 'Time End 2');
            $crud->columns('ms_title', 'ms_time_from', 'ms_time_end');
            $crud->unset_fields('ms_day_show');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function ingredient() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('contains');
            $crud->set_subject('Ingredient');
            $crud->display_as('contains_name_en', 'Name');
            $crud->display_as('contains_name_idn', 'Name (Bahasa)');
            $crud->display_as('contains_pic', 'Image');
            $crud->set_field_upload('contains_pic', 'assets/uploads/reff');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function city() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('city');
            $crud->set_subject('City');
            $crud->display_as('province_id', 'province');
            $crud->set_relation('province_id', 'province', 'province_name');
            $crud->columns('city_name', 'province_id');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function changeMessage() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tb_message_location');
            $crud->set_subject('tb_message_location');
            $crud->unset_add();
//            $crud->columns('ms_title', 'ms_time_from', 'ms_time_end');
//            $crud->unset_fields('ms_day_show');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    public function address_type() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('address_type');
            $crud->display_as('at_name_en', 'Name');
            $crud->display_as('at_name_idn', 'Name (Bahasa)');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function company_profile() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('company_profile');
            $crud->display_as('name', 'Company Name');
            $crud->display_as('email', 'Company Email');
            $crud->display_as('customer_service', 'CS Office');
            $crud->display_as('office_address', 'Address');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	
	public function header_footer() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('master_banner');
            $crud->display_as('banner_pos', 'Position');
            $crud->display_as('banner_text', 'Text');
            $crud->display_as('banner_link', 'link');
			$crud->columns('banner_pos', 'banner_text','banner_link');
			$crud->field_type('banner_pos', 'dropdown', array('top' => 'Top', 'bottom' => 'Bottom'));
			
			
			
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function feature_store() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('fitur_location');
            $crud->display_as('fitur_name_en', 'Feature Name');
            $crud->display_as('fitur_name_idn', 'Feature Name (Bahasa)');
            $crud->display_as('fitur_image_url', 'Feature Image');
            $crud->set_field_upload('fitur_image_url', 'assets/uploads/reff');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function slideshow() {
        try {
            $crud = new grocery_CRUD();
            $this->load->model('menu_model');
            $crud->set_table('slideshow');
            $crud->display_as('Time Show');
            $crud->set_field_upload('slideshow_image', 'assets/uploads/slideshow');
            $crud->field_type('slideshow_type', 'dropdown', array('1' => 'Home-Web', '2' => 'Home-Mobile', '3'=>'Our Profile', '4'=>'Hoka Party', '5'=>'CSR Activity','6'=>'Home Mobile Apps','7'=>'Payment Mobile Apps'));
            
//            $crud->columns('ms_title', 'ms_time_from', 'ms_time_end');
            $crud->unset_fields('slideshow_created');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function masterimage() {
        try {
            $crud = new grocery_CRUD();
            $this->load->model('menu_model');
            $crud->set_table('masterimage');
            $crud->display_as('masterimage_custo','Image Customer');
            $crud->display_as('masterimage_logo','Image Logo');
            $crud->set_field_upload('masterimage_custo', 'assets/uploads/foto');
            $crud->set_field_upload('masterimage_logo', 'assets/uploads');
            $crud->columns('masterimage_custo','masterimage_logo');
//            $crud->columns('ms_title', 'masterimage_logo', 'ms_time_end');
            $crud->unset_fields('slideshow_created');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function setting() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('setting');
            $crud->set_subject('Setting');
            $crud->unset_add();
//            $crud->columns('ms_title', 'ms_time_from', 'ms_time_end');
//            $crud->unset_fields('ms_day_show');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'reff';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}

?>
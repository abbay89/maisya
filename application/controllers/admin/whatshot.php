<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Whatshot extends CI_Controller {

    public function Whatshot() {
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
            $crud->set_table('whatshot');
            $crud->set_subject('Home Page');
            $crud->display_as('wh_title_en', 'Title');            
            $crud->display_as('wh_desc_en', 'Description');
            $crud->display_as('wh_image_thumb_url', 'Image Thumb');
            $crud->display_as('wh_position', 'Promo Position');
            $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
            $crud->field_type('wh_url', 'Link URL');
            $crud->unset_fields('wh_created');
            $crud->columns('wh_title_en', 'wh_image_thumb_url','wh_position','wh_url');
            $crud->set_field_upload('wh_image_thumb_url', 'assets/uploads/promo/');
            
            $crud->callback_before_insert(array($this, 'create_wh_url'));
            $this->load($crud);
			
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function events() {
        try {
			$crud = new grocery_CRUD();
            $crud->set_table('events');
            $crud->set_subject('Events');
            $crud->display_as('wh_title_en', 'Url Instagram');    
            $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
            $crud->field_type('wh_created', 'hidden', '');
            $crud->field_type('wh_desc_en', 'hidden', '');
            $crud->field_type('wh_image_thumb_url', 'hidden', '');
            $crud->field_type('wh_type', 'hidden', '');
            $crud->columns('wh_title_en');
           
            $this->loadevents($crud);
			
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
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
	function create_wh_url_promo($post_array) {
        if (!empty($post_array['wh_title_en'])) {
            $this->load->model('menu_model');
            $url = $this->sanitizeStringForUrl("promo_".$post_array['wh_title_en']);
            $i = 1;
            while ($this->menu_model->check_whatshot_url($url) != 0) {
                $url .= $i;
                $i++;
            }
            $post_array['wh_url_promo'] = $url;
        }
        return $post_array;
    }


    public function wh_images() {
        try {
            $this->load->library('image_CRUD');
            $crud = new image_CRUD();
            $crud->set_table('whatshot_image');

            $crud->set_image_path('assets/uploads/promo/');
            $crud->set_url_field('wh_img_url');
            $crud->set_relation_field('wh_id');
            $crud->set_primary_key_field('wh_img_id');
            $crud->set_subject('List Image');
            $output = $crud->render();
            $output->nav = 'admin';
            $this->load->view('admin/popup.php', $output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
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

    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'hot';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }
	private function loadevents($crud) {
        $output = $crud->render();
        $output->nav = 'events';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_bank extends CI_Controller {

    public function Master_bank() {
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
            $crud->set_table('master_bank');
            $crud->set_subject('Setup Master Bank Transfer');
            $crud->display_as('bank_name', 'Bank Name');
            $crud->display_as('bank_rek', 'No. Rek');
            $crud->display_as('bank_rek_name', 'Rek. Name');
            $crud->display_as('bank_pic', 'Bank Logo');
            $crud->columns('bank_name', 'bank_rek','bank_rek_name');
            $crud->set_field_upload('bank_pic', 'assets/uploads/img_menu/');
            
			$crud->callback_before_insert(array($this, 'create_wh_url'));
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

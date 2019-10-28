<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_collection extends CI_Controller {

    public function Our_collection() {
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
            $crud->set_table('our_collection');
            $crud->set_subject('Our Collection Home');
            $crud->display_as('coll_link', 'Link to');
            $crud->display_as('coll_cate', 'Category');
            $crud->display_as('coll_url', 'Image Thumb');
            $crud->columns('coll_link', 'coll_cate','coll_url');
            $crud->set_field_upload('coll_url', 'assets/uploads/img_menu/');
            
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

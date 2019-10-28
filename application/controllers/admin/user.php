<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function User() {
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
            $crud->set_table('user');
            $crud->set_subject('User');
            $crud->field_type('role', 'dropdown', array('1' => 'Administrator', '2' => 'Marketing', '3' => 'Store', '4' => 'IT'));
            $crud->unset_columns('password');
            $crud->change_field_type('password', 'password');
            $crud->callback_before_insert(array($this, 'encrypt_pw'));
            $crud->callback_before_update(array($this, 'encrypt_pw'));

            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function encrypt_pw($post_array) {
        if (!empty($post_array['password'])) {
            $post_array['password'] = SHA1($_POST['password']);
        }
        return $post_array;
    }

    public function department() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('department');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function career() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('career');
            $crud->set_relation('dept_id', 'department', 'dept_name');
            $crud->display_as('dept_id', 'Department');
            $crud->display_as('career_title_en', 'Title');
            $crud->display_as('career_title_idn', 'Title (Bahasa)');
            $crud->display_as('career_detail_en', 'Detail');
            $crud->display_as('career_detail_idn', 'Detail (Bahasa)');
            $crud->display_as('career_due_date', 'Due Date');
            $crud->display_as('career_active', 'Active ?');
            $crud->field_type('career_url', 'hidden');
            $crud->callback_before_insert(array($this, 'create_career_url'));
            $crud->callback_before_update(array($this, 'create_career_url'));
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function create_career_url($post_array) {
        if (!empty($post_array['career_title_en'])) {
            $this->load->model('user_model');
            $url = $this->sanitizeStringForUrl($post_array['career_title_en']);
            $i = 1;
            while ($this->user_model->check_career_slug($url) != 0) {
                $url .= $i;
                $i++;
            }
            $post_array['career_url'] = $url;
        }
        return $post_array;
    }

    public function career_app_form() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('career_appform');
            $crud->set_relation('career_id', 'career', 'career_title_en');
            $crud->display_as('dept_id', 'Department');
            $crud->display_as('career_id', 'Apply For');
            $crud->display_as('cf_first_name', 'First Name');
            $crud->display_as('cf_last_name', 'Last Name');
            $crud->display_as('cf_email', 'Email');
            $crud->display_as('cf_phone', 'Phone Number');
            $crud->display_as('cf_dob', 'Birthday');
            $crud->columns('career_id', 'cf_first_name', 'cf_last_name', 'cf_email', 'cf_phone', 'cf_dob');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->add_action('Download Form', base_url() . 'assets/grocery_crud/images/icons/black/32/download.png', base_url() . 'admin/user/download_form/');
            $crud->set_export_url('download_all');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function download_form($cf_id) {
        $this->load->helper('download');
        $data = $this->user_model->get_who_apply($cf_id);
        if ($data['query']) {
            $text = $data['csv'];
            $name_file = $data['query']->career_title_en . '-' . $data['query']->cf_first_name . ' ' . $data['query']->cf_last_name . '.csv';
            force_download($name_file, $text);
        } else {
//            redirect(base_url().'career');
        }
    }

    public function download_all() {
        $this->load->helper('download');
        $data = $this->user_model->get_all_apply();
        if ($data['query']) {
            $text = $data['csv'];
            $name_file = 'career_apply' . '.csv';
            force_download($name_file, $text);
        } else {
//            redirect(base_url().'career');
        }
    }

    public function csr() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('csr_activity');
            $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
            $crud->unset_fields('csr_created_date');
            $crud->set_relation('user_id', 'user', 'username');

            $crud->display_as('user_id', 'User');
            $crud->display_as('csr_title_en', 'Title');
            $crud->display_as('csr_image_thumb', 'Image Thumbnail');
            $crud->display_as('csr_title_idn', 'Title (Bahasa)');
            $crud->display_as('csr_detail_en', 'Detail');
            $crud->display_as('csr_detail_idn', 'Detail (Bahasa)');
            $crud->display_as('csr_created_date', 'Created Date');
            $crud->display_as('csr_status', 'Status');
            $crud->set_field_upload('csr_image_thumb', 'assets/uploads/csr');
            $crud->add_action('Images', base_url() . 'assets/grocery_crud/images/icons/color/images.png', base_url() . 'admin/user/csr_images/', 'fancybox iframe');

            $crud->field_type('csr_url', 'hidden');
            $crud->callback_before_insert(array($this, 'create_csr_url'));
            $crud->callback_before_update(array($this, 'create_csr_url'));
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function create_csr_url($post_array) {
        if (!empty($post_array['csr_title_en'])) {
            $url = $this->sanitizeStringForUrl($post_array['csr_title_en']);
            $i = 1;
            while ($this->user_model->check_csr_url($url) != 0) {
                $url .= $i;
                $i++;
            }
            $post_array['csr_url'] = $url;
        }
        return $post_array;
    }

    public function csr_images() {
        try {
            $this->load->library('image_CRUD');
            $this->load->model('user_model');
            $crud = new image_CRUD();
            $crud->set_table('csr_image');

            $crud->set_image_path('assets/uploads/csr');
            $crud->set_url_field('csri_url');
            $crud->set_relation_field('csr_id');
            $crud->set_primary_key_field('csri_id');
            $state = $crud->getState();
            if (isset($state->relation_value)) {
                $prod_name = $this->user_model->get_csr_title($state->relation_value);
            } else {
                $prod_name = '';
            }
            $crud->set_subject('Images for ' . $prod_name);
            $output = $crud->render();
            $output->nav = 'admin';
            $this->load->view('admin/popup.php', $output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function milestone() {

        try {
            $crud = new grocery_CRUD();
            $crud->set_table('milestone');
            $crud->set_field_upload('miles_image_url', 'assets/uploads/reff');

            $crud->display_as('miles_year', 'Year');
            $crud->display_as('miles_desc_en', 'Description');
            $crud->display_as('miles_desc_idn', 'Description (Bahasa)');
            $crud->display_as('miles_image_url', 'Image');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function sharetolove() {
		try {
            $crud = new grocery_CRUD();
            $crud->set_table('sharetolove');

            $crud->display_as('title', 'Title');
			 $crud->field_type('image_slug', 'hidden');
            $crud->set_field_upload('image', 'assets/uploads/sharetolove');
            $crud->columns('title', 'image','image_slug');
            $crud->callback_before_insert(array($this, 'create_image_slug'));
            $crud->callback_before_update(array($this, 'create_image_slug'));

//            $crud->callback_column('menu_hoka_party', array($this, 'callback_hoka_party'));
//            $crud->callback_column('menu_hoka_party_sub', array($this,'callback_hoka_party'));

           
            $crud->set_subject('sharetolove');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function deliverycharge() {
		try {
			
            $crud = new grocery_CRUD();
            $crud->set_table('tb_deliverycharge');
            $this->load($crud);
			
			//echo "masuk";
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	function create_image_slug($post_array) {
        if (!empty($post_array['title'])) {
            $cat_url = $this->sanitizeStringForUrl($post_array['title']);
            $i = 1;
            while ($this->user_model->check_sharetolove_slug($cat_url) != 0) {
                $cat_url .= $i;
                $i++;
            }
            $post_array['image_slug'] = $cat_url;
        }
        return $post_array;
    }
    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'admin';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
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
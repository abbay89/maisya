<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function Menu() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('menu_model');
    }

    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('menu');
            $crud->set_relation('category_id', 'category', 'category_name_en');
            $crud->set_relation_n_n('ingredient', 'menu_contains', 'contains', 'menu_id', 'contains_id', 'contains_name_en');
            $crud->set_relation('ms_id', 'menu_show', 'ms_title');

            $crud->field_type('menu_hoka_party', 'dropdown', array('1' => 'Paket Menu Hoka Party'
                , '2' => 'Menu Paket Hokben', '3' => 'Menu Tambahan', '0' => 'Tidak termasuk'));

            $crud->display_as('category_id', 'Category');
            $crud->display_as('menu_position', 'Posisi Menu');
            $crud->display_as('ms_id', 'Show Time');
            $crud->display_as('title_en', 'Title');
            $crud->display_as('title_idn', 'Title (Bahasa)');
            $crud->display_as('basic_info_en', 'Basic Info');
            $crud->display_as('basic_info_idn', 'Basic Info (Bahasa)');
            $crud->display_as('menu_hoka_party', 'Hoka Party Main Menu');
			$crud->display_as('menu_active', 'Menu Show Home Page');
            $crud->unset_fields('menu_hoka_party_sub');
//            $crud->display_as('menu_hoka_party_sub', 'Hoka Party Additional Menu');
            $crud->display_as('basic_info_en', 'Basic Info');
            $crud->set_field_upload('menu_image', 'assets/uploads/menu');
            $crud->columns('title_en', 'category_id', 'ms_id', 'menu_image', 'price', 'menu_hoka_party','menu_position');
            $crud->callback_before_insert(array($this, 'create_menu_slug'));

//            $crud->callback_column('menu_hoka_party', array($this, 'callback_hoka_party'));
//            $crud->callback_column('menu_hoka_party_sub', array($this,'callback_hoka_party'));

            $crud->field_type('menu_slug', 'hidden');
            $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
            $crud->set_subject('Menu');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

//    function callback_hoka_party($value, $row) {
//        return $value == 1 ? '<div style="background-color:lightgreen; width:100%; height:100%;">Yes</div>' : 'No';
//    }

    function create_menu_slug($post_array) {
        if (!empty($post_array['title_en'])) {
            $cat_url = $this->sanitizeStringForUrl($post_array['title_en']);
            $i = 1;
            while ($this->menu_model->check_menu_slug($cat_url) != 0) {
                $cat_url .= $i;
                $i++;
            }
            $post_array['menu_slug'] = $cat_url;
        }
        return $post_array;
    }

    public function category() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('category');
            $crud->set_subject('Category');
            $crud->field_type('category_url', 'hidden');
            $crud->display_as('category_name_idn', 'Category Name (Bahasa)');
            $crud->display_as('category_name_en', 'Category Name');
            $crud->display_as('category_position', 'Posisi Menu');
            $crud->set_field_upload('category_pic', 'assets/uploads/category');
            $crud->callback_before_insert(array($this, 'create_category_url'));
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function menu_special() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('promo');
            $crud->set_subject('Special');
            $crud->display_as('promo_desc_en', 'Description');
            $crud->display_as('promo_desc_idn', 'Description (Bahasa)');
            $crud->set_field_upload('promo_image_url', 'assets/uploads/promo');
            $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
            $crud->display_as('promo_start_date', 'Start Date');
            $crud->display_as('promo_end_date', 'End Date');
            $crud->display_as('promo_title_en', 'Promo Title');
            $crud->display_as('promo_title_idn', 'Promo Title (Bahasa)');

            $crud->columns('promo_title_en', 'promo_start_date', 'promo_end_date', 'promo_active');

//             $crud->set_relation_n_n('food', 'menu_promo', 'menu', 'pr', 'contains_id', 'contains_name');

            $crud->add_action('Add Menu', base_url() . 'assets/grocery_crud/images/icons/color/package.png', base_url() . 'admin/menu/menu_promo/', 'fancybox iframe');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function menu_promo($id) {
        try {
            if ($id) {
                $crud = new grocery_CRUD();
                $crud->set_table('menu_promo');
                $crud->set_subject('Content Menu');
                $crud->field_type('promo_id', 'hidden', $id);
                $crud->where('promo_id', $id);
                $crud->display_as('promo_new_price', 'New Price');
                $crud->display_as('promo_old_price', 'Old Price');
                $crud->display_as('cat_id', 'Category');
                $crud->field_type('promo_old_price', 'hidden');
                $crud->set_relation('menu_id', 'menu', 'title_en');
                $crud->field_type('user_id', 'hidden', $this->session->userdata('who'));
                $crud->columns('menu_id', 'cat_id', 'promo_old_price', 'promo_new_price');
                $crud->set_primary_key(array('promo_id', 'menu_id'), 'menu_promo'); //edited must be set primary if more than 1
                $crud->callback_before_insert(array($this, 'update_old_price'));
                $crud->callback_before_update(array($this, 'update_old_price'));

                $crud->callback_column('cat_id', array($this, 'category_promo'));
                $output = $crud->render();
                $this->load->view('admin/popup.php', $output);
            } else {
                redirect(base_url());
            }
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function category_promo($value, $row) {
        if (isset($row->menu_id)) {
            return $this->menu_model->get_category_name($row->menu_id);
        }
    }

    function update_old_price($post_array) {
        if (!empty($post_array['menu_id'])) {
            $post_array['promo_old_price'] = $this->menu_model->get_menu_price($post_array['menu_id']);
        }
        return $post_array;
    }

    function create_category_url($post_array) {
        if (!empty($post_array['category_name'])) {
            $cat_url = $this->sanitizeStringForUrl($post_array['category_name']);
            $i = 1;
            while ($this->menu_model->check_category_slug($cat_url) != 0) {
                $cat_url .= $i;
                $i++;
            }
            $post_array['category_url'] = $cat_url;
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

    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'menu';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}

?>

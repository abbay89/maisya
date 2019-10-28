<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends CI_Controller {

    public function Location() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('location_model');
    }

    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('location');
            $crud->unset_fields('location_url','location_created_date');
            $crud->display_as('location_name_en', 'Store Name');
            $crud->display_as('location_address_idn', 'Address (Bahasa)');
            $crud->display_as('location_open_hour', 'Open Hour');
            $crud->display_as('location_active', 'Active');
            $crud->display_as('location_lat', 'Latitude');
            $crud->display_as('location_long', 'Longitude');
            $crud->display_as('location_phone', 'Phone Number');
            $crud->unset_add_fields('location_lat','location_long');
            $crud->set_subject('Location');
            $crud->columns('store_id','location_name_en', 'location_open_hour', 'location_lat', 'location_long');
            $crud->add_action('Set Location', base_url() . 'assets/grocery_crud/images/icons/color/marker.png', base_url() . 'admin/location/add_location/', 'fancybox iframe');

            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function add_location($id) {
        $this->load->library('googlemaps');
        $location = $this->location_model->get_location($id);
        if ($location) {
            $loc_str = $location->location_lat . ', ' . $location->location_long;
            $config['center'] = $loc_str; //-6.211544, 106.845172';
            $config['places'] = TRUE;
            $config['placesAutocompleteInputID'] = 'myPlaceTextBox';
            $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
            $config['placesAutocompleteOnChange'] =
                    'var place = placesAutocomplete.getPlace();
                 map.setCenter(place.geometry.location);
                  marker_0.setPosition(place.geometry.location);   ';


            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = $loc_str;
            $marker['draggable'] = TRUE;
            $marker['animation'] = 'DROP';
            $this->googlemaps->add_marker($marker);

            $data['map'] = $this->googlemaps->create_map();
            $data['id'] = $id;
            $this->load->view('template/map', $data);
        }
    }

    public function update_location() {
        $id = $this->input->post('id');
        $data['location_lat'] = $this->input->post('lat');
        $data['location_long'] = $this->input->post('long');
        $this->location_model->update_location($data, $id);
        echo '00';
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
        $output->nav = 'loc';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}

?>
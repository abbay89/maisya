<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Location_model extends CI_Model {

    private $query = "select l.*, (SELECT GROUP_CONCAT(DISTINCT fitur_location.fitur_id)
				FROM fitur_location 
					LEFT JOIN fitur_fit_location ON fitur_fit_location.fitur_id = fitur_location.fitur_id 
					WHERE fitur_fit_location.location_id = l.location_id 
					GROUP BY fitur_fit_location.location_id) 
		AS feature_store
	from location l ";

    function __construct() {
// Call the Model constructor
        parent::__construct();
    }

    function update_location($data, $id) {
        $this->db->where('location_id', $id);
        $this->db->update('location', $data);
    }

    public function get_location($id) {
        $this->db->where('location_id', $id);
        return $this->db->get('location')->row();
    }

    public function get_new_locations() {
        $temp_query = $this->query . 'order by location_created_date desc limit 3';
        return $this->db->query($temp_query)->result();
    }

    public function get_all_location_lat_long(){
        return $this->db->query("select location_name_en, location_address_en,  location_lat, location_long from location ")->result();
    }
    
    public function get_all_location($city_id = '') {
        $temp_query = $this->query;
        $param = array();
        if ($city_id != '') {
            $temp_query .= ' WHERE city_id = ? and  location_active = 1';
            $param[] = $city_id;
        }
		else
		{
			$temp_query .= ' WHERE location_active = 1';
           
		}
//        $temp_query .= 'LIMIT ?, ?';
//echo $temp_query;
        return $this->db->query($temp_query, $param)->result();
    }

    public function get_all_province() {
        return $this->db->get('province')->result();
    }

    public function get_all_city($prov = '') {
        if ($prov != '') {
            $this->db->where('province_id', $prov);
        }
        return $this->db->get('city')->result();
    }

    public function get_location_have_party($city_id = '') {
        $temp_query = "select l.* from location l "
                . " inner join fitur_fit_location fl "
                . " on fl.location_id = l.location_id "
                . " and fl.fitur_id = 5";
        $param = array();
        if ($city_id != '') {
            $temp_query .= ' WHERE city_id = ?';
            $param[] = $city_id;
        }
        return $this->db->query($temp_query, $param)->result();
    }

}

?>

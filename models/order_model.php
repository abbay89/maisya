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

class Order_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_allorderwebsite() {
        return $this->db->query('select * from order_apps where  order_date >= Date(NOW()) - INTERVAL 3 DAY
		order by order_id  desc')->result_array();
    }
	public function get_detailorderwebsite($id)
	{
		$sql	= "select * from 
					order_apps left join order_apps_detail on order_apps.order_id = order_apps_detail.order_id
					left join menu on order_apps_detail.menu_id = menu.menu_id
					where order_apps.order_id = '".$id."'";
		//echo $sql; exit;
		return $this->db->query($sql);
		//print_r($query->row());exit;
		//return $query->row();
	}
	public function get_location_store_arroundme($lat,$long) {
			//pembatasan 3 mil = 4.827 Kilo => perkilo 1.609

		$query = "SELECT 
					store_id,
					location_name_idn,
					location_open_hour,
					location_lat,
					location_long, 
					weekday_open,
					weekday_close,
					weekend_open,
					weekend_close,
					not_available,
					message,
					drivethru,
					delivery,
					coffee,
					party,
					province,
				(SQRT(POW((location_lat - ".$lat."), 2) + 
				POW((location_long - ".$long."), 2)) * 112.12) AS distance 
				FROM location 
				
				ORDER BY distance ASC LIMIT 5";
						//echo $query;exit;
        return $this->db->query($query)->result();
    }
}

?>

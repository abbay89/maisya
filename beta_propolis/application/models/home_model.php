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

class Home_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    public function get_slideshow() {
        $query = "select * from slideshow";
        return $this->db->query($query)->result();
    }
	 public function get_testimonial1() {
        $query = "select  * from testimonial inner join
		customer on testimonial.user_testi = customer.cust_id where `show` = 2 order by testi_id desc LIMIT 0,1 ";
        return $this->db->query($query)->row();
    }
	 public function get_testimonial2() {
        $query = "select  * from testimonial inner join
		customer on testimonial.user_testi = customer.cust_id where `show` = 2 order by testi_id desc LIMIT 1,1";
        return $this->db->query($query)->row();
    }
	 public function get_testimonial3() {
        $query = "select  * from testimonial inner join
		customer on testimonial.user_testi = customer.cust_id where `show` = 2 order by testi_id desc LIMIT 2,1";
        return $this->db->query($query)->row();
    }
	public function get_promo(){
		 $query = "select * from whatshot";
        return $this->db->query($query)->result();
	}
	public function get_events(){
		 $query = "select * from events";
        return $this->db->query($query)->result();
	}
	public function get_collection(){
		 $query = "select * from our_collection";
        return $this->db->query($query)->result();
	}
	public function get_img($cate){
		 $query = "select * from img_menu where img_loc = '".$cate."'";
        return $this->db->query($query)->row()->img_url;
	}
	public function get_banner($pos){
		 $query = "select * from master_banner where banner_pos = '".$pos."'";
        return $this->db->query($query)->result();;
	}
}

?>

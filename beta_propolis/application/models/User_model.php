<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function auth($username, $password) {
		//echo 'select * from platinum_member where username = "'.$username.'" and password = "'.$password.'"';exit;
        return $this->db->query('select * from platinum_member where username = ? and password = ?', array($username, $password))->row();
    }
	public function userInformation($iduser){
		//print_r('select * from band_user where user_id ='.$iduser);exit;
		return $this->db->query('select * from band_user where user_id = ? ',array($iduser))->row();
		
	}
	public function userInformationRef($iduser){
		return $this->db->query('select * from band_user where user_createby = ? ',array($iduser))->result();
	}
}

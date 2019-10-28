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
        return $this->db->query('select * from user where username = ? and password = ?', array($username, $password))->row();
    }
	public function userInformation($iduser){
		return $this->db->query('select * from user where user_id = ? ',array($iduser))->row();
	}
	public function userInformationRef($iduser){
		return $this->db->query('select * from user where user_createby = ? ',array($iduser))->result();
	}
}

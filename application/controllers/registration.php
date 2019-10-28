<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function Registration() {
       parent::__construct();
	   $this->load->model('user_model');
    }
	public function request($idreg) {
		$this->session->sess_destroy();
		$regid	= explode("_",$idreg);
		$data['sponsor']	= $regid[1];
		$data['sponsorname']= $regid[2];
		
		$this->load->view('page_registration',$data);
    }
	public function register(){
	    $_POST['Password'] = sha1($_POST['RealPassword']);
		//print_r($_POST);
		$this->db->insert("platinum_member",$_POST);
		//echo $this->db->last_query();
		redirect("login");
	}
	public function getDataFromServer($url){
		
		//echo $url;
		
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result;
		
	}
	
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

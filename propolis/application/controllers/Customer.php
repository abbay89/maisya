<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function Customer() {
       parent::__construct();
	   $this->load->model('user_model');
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'));
		
		$data['listproduct']	= json_decode($this->getDataFromServer($this->config->item('api_server').'api/ItemCodes'));
		$data['listproductpaket'] 		= json_decode($this->getDataFromServer('http://maisya.id:6070/api/PaketPlatinums'));
		$data['datacustomer']	= json_decode($this->getDataFromServer($this->config->item('api_server').'api/RegPlatinums/'.$data['userProfile']->id_server));
		$allCustomer 			= json_decode($this->getDataFromServer($this->config->item('api_server').'api/RegPlatinums'));
		$data['totalCust']		= count($allCustomer);
		//print_r($data['datacustomer']);exit;
		$allPlat 			= json_decode($this->getDataFromServer($this->config->item('api_server').'api/PaketPlatinums'));
		$data['totalplat']		= count($allPlat);
		//print_r($data['datacustomer']);exit;
		$allRegPlat 			= json_decode($this->getDataFromServer($this->config->item('api_server').'api/RegPaketPlatinums'));
		$data['totalRegplat']		= count($allRegPlat);
		//print_r($data['datacustomer']);exit;
		
		$data['curent'] 				= 'class="current-page"';
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		
		$this->load->view('dashboard', $data);
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
	public function getDataFromServerMulti($url,$parm){
		
		$ch = curl_init($url);
		# Setup request to send json via POST.
		$payload = json_encode( $parm );
		
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Content-Length: ' . strlen($payload)));
		# Return response instead of printing.
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		# Send request.
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result; 
	}
	
	
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
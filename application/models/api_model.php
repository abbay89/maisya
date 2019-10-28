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

class Api_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
   

	public function login() {
		//echo $this->config->item('maisya_server');exit;
		$username = 'tamanhalaqah@gmail.com';
        $pass = 'password123';
      	
            $curl = curl_init($this->config->item('maisya_server')."/api/Login");
			
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,"Email={$username}&password={$pass}");
			curl_setopt($curl, CURLOPT_FAILONERROR, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
			
          
		
            $result = curl_exec($curl);
           	
			
			echo var_dump($result);
    }
	
	public function requestTokenPassword($username){
		
        $curl = curl_init($this->config->item('maisya_server')."/api/RequestResetPassword");
			
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,"Email={$username}");
			curl_setopt($curl, CURLOPT_FAILONERROR, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
			
            $result = curl_exec($curl);
           
			$status	= json_decode($result);
		
			return $status->data->TokenReset;
		
	}
	
	public function changePassword($token,$newPassword){
		
		
      
        $curl = curl_init($this->config->item('maisya_server')."/api/ChangePassword");
			
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,"TokenReset={$token}&NewPassword={$newPassword}");
			curl_setopt($curl, CURLOPT_FAILONERROR, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
			
            $result = curl_exec($curl);
           
			return true;
		
	}
	
}
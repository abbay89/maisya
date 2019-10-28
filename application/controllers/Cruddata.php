<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cruddata extends CI_Controller {

    public function Cruddata() {
       parent::__construct();
	   $this->load->model('user_model');
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	
	public function saveaddress(){
		//print_r($_POST);
		$this->db->insert("platinum_member_address",$_POST);
		redirect("customer/address");
	}
	public function deleteaddress($id){
		//print_r($_POST);
		$this->db->query("delete from platinum_member_address where id = '".$id."'");
		redirect("customer/address");
	}
	public function savebank(){
		//print_r($_POST);
		$this->db->insert("platinum_member_bank",$_POST);
		redirect("customer/masterbank");
	}
	public function deletebank($id){
		//print_r($_POST);
		$this->db->query("delete from platinum_member_bank where id = '".$id."'");
		redirect("customer/masterbank");
	}
	public function sendafiliasi(){
		//print_r($_POST);
		$this->sendEmail($_POST['emailname'],$_POST['link']);
		
		$data['data_cust'] 		= $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$data['idserver'] 		= $data['data_cust']->id;
		$data['profilename'] 	= $data['data_cust']->Nama;
		$data['msg']			= '
			<div class="alert alert-success">
				<button aria-label="Close" data-dismiss="alert" class="close" type="button"> <span aria-hidden="true">×</span> </button>
				<h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> Email Has Been Sent.
			</div>
		';
		
		
		$this->load->view('afiliasi', $data);
		
	}
	public function activatemember($id){
		$this->db->query("Update platinum_member set Active = 'Y' where id = '".$id."'");
		//echo $this->db->last_query();exit;
		redirect("customer/downline");
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
	public function sendEmail($email,$link){
		require __DIR__ . DIRECTORY_SEPARATOR.'../../email_afiliasi.php';

		mailreminder($email, $link);
		
	}
	
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
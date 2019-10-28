<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function Profile() {
       parent::__construct();
	   $this->load->model('user_model');
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['profile']		= "primary";
		//print_r($data['userProfile']); 
		$data['allAddress']		= $this->db->query("select * from customer_address where cust_id = '".$this->session->userdata('email')."'")->result_array();
		$data['allFamily']		= $this->db->query("select * from family_address where cust_id = '".$this->session->userdata('email')."'")->result_array();
		$data['allBank']		= $this->db->query("select * from master_bank where cust_id = '".$this->session->userdata('email')."'")->result_array();
		$data['allDownline']		= $this->db->query("select * from user where user_createby = '".$this->session->userdata('email')."'")->result_array();
		//echo $this->session->userdata('email');
		
		//print_r($data['allDownline']);
		
		$this->load->view('profile', $data);
	}
	public function updateProfile(){
		//print_r($_POST);
		$user_id				= $_POST['user_id'];
		$datains['username'] 	= $_POST['email'];
		$datains['first_name']	= $_POST['firstname'];
		$datains['last_name']	= $_POST['lastname'];
		$datains['birthday']	= $_POST['birthday'];
		$datains['gender']		= $_POST['gender'];
		$datains['address']		= $_POST['address'];
		$datains['email']		= $_POST['email'];
		$datains['phone_no']	= $_POST['phone_no'];
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $datains);
		
		//echo $this->db->last_query();
		redirect("membership?flag=update");
		
	}
	
	public function addAddress(){
		//print_r($_POST);
		$datains['cust_id']				=	$this->session->userdata('email');	
		$datains['cust_ad_address'] 	=	$_POST['address'];
		$datains['city_name'] 			=	$_POST['city'];
		$datains['cust_phone'] 			=	$_POST['phone'];
		$datains['cust_name']			=	$_POST['penerima'];
		$datains['cust_postel_code']	=	$_POST['kodepos'];
		$datains['kecamatan']			= 	$_POST['kecamatan'];
		
		//print_r($datains);
		$this->db->insert("customer_address",$datains);
		
		$html = '<tr>
					<td>'.$_POST['penerima'].'</td>
					<td>'.$_POST['address'].'</td>
					<td>'.$_POST['city'].'</td>
					<td>'.$_POST['phone'].'</td>
					<td></td>										
					<td class="cell-view"></td>
				</tr>';
		echo $html;
		exit;
	}
	public function addBank(){
		//print_r($_POST);
		$datains['cust_id']				=	$this->session->userdata('email');	
		$datains['atas_nama'] 			=	$_POST['atasnama'];
		$datains['no_rek'] 				=	$_POST['norek'];
		$datains['nama_bank'] 			=	$_POST['namabank'];
		
		//print_r($datains);
		$this->db->insert("master_bank",$datains);
		
		//echo $this->db->last_query();
		
		$html = '<tr>
					<td>'.$_POST['norek'].'</td>
					<td>'.$_POST['atasnama'].'</td>
					<td>'.$_POST['namabank'].'</td>
					<td>Yes</td>
					<td></td>										
					<td class="cell-view"></td>
				</tr>';
		echo $html;
		
		
		exit;
	}
	public function deleteAddress($idserver){
		$url='http://www.maisya.id:6070/api/Alamat/'.$idserver;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");   
		$result = curl_exec($ch);
		$status	= json_decode($result);

		print_r($result);exit;
		
		$this->db->query("delete from customer_address where id_server = '".$idserver."'");
		redirect(base_url()."profile");
	}
	public function deleteFamily($id){
		$this->db->query("delete from family_address where cust_ad_id = '".$id."'");
		redirect(base_url()."profile");
	}
	public function activation($id){
		$this->db->query("update `user` set status = 'active' where user_id = '".$id."'");
		redirect(base_url()."profile");
	}
	public function notactivation($id){
		$this->db->query("update `user` set status = 'notactive' where user_id = '".$id."'");
		redirect(base_url()."profile");
	}
	public function deleteBank($id){
		$this->db->query("delete from master_bank where bank_id = '".$id."'");
		echo $this->db->last_query();
		redirect(base_url()."profile");
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membership extends CI_Controller {

    public function Membership() {
       parent::__construct();
	   $this->load->model('user_model');
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['membership']		= "primary";
		//print_r($data['userProfile']); 
		$data['allAddress']		= $this->db->query("select * from customer_address where cust_id = '".$this->session->userdata('email')."'")->result_array();
		$data['allFamily']		= $this->db->query("select * from family_address where cust_id = '".$this->session->userdata('email')."'")->result_array();
		$data['allBank']		= $this->db->query("select * from master_bank where cust_id = '".$this->session->userdata('email')."'")->result_array();
		
		$this->load->view('membership', $data);
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
	public function updatefamily(){
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
	public function cekTotalAlamat(){
		$data = $this->db->query("select count(*) as total from family_address where cust_id = '".$this->session->userdata('email')."'")->row();
		return $data->total;
	}
	public function addFamily(){
		if($this->cekTotalAlamat() == '2'){
			echo "Alamat Max. 2";
			exit;
		}
		//print_r($_POST);
		$datains['cust_id']				=	$this->session->userdata('email');	
		$datains['cust_ad_address'] 	=	$_POST['address'];
		$datains['cust_phone'] 			=	$_POST['phone'];
		$datains['cust_email'] 			=	$_POST['email'];
		$datains['cust_name']			=	$_POST['name'];
		
		//print_r($datains);
		$this->db->insert("family_address",$datains);
		
		//echo $this->db->last_query();exit;
		 
		$html = '<tr>
					<td>'.$_POST['name'].'</td>
					<td>'.$_POST['address'].'</td>
					<td>'.$_POST['phone'].'</td>
					<td>'.$_POST['email'].'</td>
					<td></td>										
					<td class="cell-view"></td>
				</tr>';
		echo $html;
		exit;
	}
	public function addAddress(){ 
		//print_r($this->session->all_userdata());
		$post_data = 'RegPlatinum_id='.$this->session->userdata('id_server').'&Kota='.$_POST['city'].'&NamaPenerima='.$_POST['penerima'].'&NoTelp='.$_POST['phone'].'&KodePos='.$_POST['kodepos'].'&Alamat1='.$_POST['address']." ".$_POST['kecamatan'];
		$url='http://www.maisya.id:6070/api/Alamat';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		//print_r($post_data);
		$result = curl_exec($ch);
		$status	= json_decode($result);
		
		//print_r($status);exit;
		
		
		
		//print_r($_POST);
		$datains['cust_id']				=	$this->session->userdata('email');	
		$datains['cust_ad_address'] 	=	$_POST['address'];
		$datains['city_name'] 			=	$_POST['city'];
		$datains['cust_phone'] 			=	$_POST['phone'];
		$datains['cust_name']			=	$_POST['penerima'];
		$datains['cust_postel_code']	=	$_POST['kodepos'];
		$datains['kecamatan']			= 	$_POST['kecamatan'];
		$datains['id_server']			= 	$status->Id;
		
		
		$this->db->insert("customer_address",$datains);
		
		//print_r($datains);exit;
		
		$html = '<tr>
					<td>'.$_POST['penerima'].'</td>
					<td>'.$_POST['address'].'</td>
					<td>'.$_POST['city'].'</td>
					<td>'.$_POST['phone'].'</td>
					<td><a class="btn btn-warning" href="'.base_url().'profile/deleteAddress/'.$this->db->insert_id().'">Delete</a></td>										
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
		
		echo $this->db->last_query();
		
		$html = '<tr>
					<td>'.$_POST['norek'].'</td>
					<td>'.$_POST['atasnama'].'</td>
					<td>'.$_POST['namabank'].'</td>
					<td>Yes</td>
					<td><a class="btn btn-warning" href="'.base_url().'profile/deleteBank/'.$this->db->insert_id().'">Delete</a></td>									
					<td class="cell-view"></td>
				</tr>';
		echo $html;
		
		
		exit;
	}
}
?>
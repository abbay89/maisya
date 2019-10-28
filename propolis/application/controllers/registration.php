<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class registration extends CI_Controller {

    public function registration() {
       parent::__construct();
	   $this->load->model('user_model');
		
    }
	public function request($idreg) {
		//echo "masuk";exit;
		$this->session->sess_destroy();
		$regid	= explode("_",$idreg);
		$data['sponsor']	= $regid[1];
		$data['sponsorname']= $regid[2];
		
		$data['userProfile']	= $this->user_model->userInformation($regid[0])	;
		$this->load->view('registration', $data);
	}
	public function save_reg(){
		$this->cekEmail($_POST['email']);
		//print_r($_POST);
		$user_id					= $_POST['upline'];
		$datains['user_createby'] 	= $_POST['upline'];
		$datains['username'] 		= $_POST['email'];
		$datains['first_name']		= $_POST['first_name_'];
		$datains['last_name']		= $_POST['last_name'];
		$datains['password']		= sha1($_POST['password']);
		$datains['birthday']		= $_POST['birthday'];
		$datains['gender']			= $_POST['gender'];
		$datains['address']			= $_POST['address'];
		$datains['email']			= $_POST['email'];
		$datains['phone_no']		= $_POST['phone_no'];
		
		//echo "<pre>";print_r($_POST);echo "</pre>";exit;
		
		$post_data = 'Nama='.$_POST['first_name_'].' '.$_POST['last_name'].'&UserName='.$_POST['email'].'&Password='.$_POST['password'].'&NoHP='.$_POST['phone_no'].'&Email='.$_POST['email'].'&JenisKelamin='.$_POST['gender'].'&Sponsor_id='.$_POST['idpropolis'].'&NamaBank='.$_POST['bank'].'&NamaAkunBank='.$_POST['namaakun'].'&NomorRekening='.$_POST['norek'].'&Nama_keluarga='.$_POST['namarum'].'&NoHP_keluarga='.$_POST['notlprum'].'&Email_keluarga='.$_POST['emairum'];
		//echo $post_data;exit;
		$url='http://www.maisya.id:6070/api/RegPlatinums';

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
		if(!empty($status->Id))
		{
			//echo "masuk";
			$datains['id_server']		= $status->Id;
			$this->db->insert('user',$datains);
			echo "<script>alert('Pendaftaran Berhasil');</script>";
			redirect(base_url()."?id=".$status->Id);
		}
		else
		{
			echo "<script>alert('Pendaftaran Gagal Silahkan Coba Sekali Lagi');</script>";
		}
		
		//echo $this->db->last_query();
		//echo $this->db->insert_id();
		
		
	}
	public function cekEmail($email){
		$data = $this->db->query("select * from `user` where username = '".$email."'")->result();
		if($data){
			redirect(base_url()."?err=email_reg");
			exit;
		}
	}
	public function sendDataServer($post){
		
		$url='http://www.maisya.id:6070/api/RegPlatinums';

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
		if(($status->id == ''))
		{
			return "masuk";
			//$this->session->sess_destroy();
			//redirect("checkout");
		}
	}
}
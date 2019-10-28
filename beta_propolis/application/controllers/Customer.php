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
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		//if(
		$data['data_cust_notactive'] = $this->db->query("select * from platinum_member where active = 'N'")->result_array();
		$data['listproduct']	= json_decode($this->getDataFromServer('http://www.maisya.id:6070/api/ItemCodes'));
		$data['totalbelanja']	= $this->db->query("select sum(ord_det_net) as total from `order` left join `order_detail` on `order`.order_id = `order_detail`.order_id
		where `order`.cust_id = '".$data['data_cust']->id."'")->row();
		if($data['data_cust']->Active == 'Y'){
			$this->load->view('dashboard', $data);
		}else{
			$data['listproduct']	= json_decode($this->getDataFromServer('http://maisya.id:6070/Api/PaketPlatinums'));
			$this->load->view('dashboard_newmember', $data);
		}
    }
	public function detail($oid){
		
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$data['detailprod']		= json_decode($this->getDataFromServer('http://maisya.id:6070/api/ItemCodes?oid='.$oid));
		
		$data['thumbimage']		= json_decode($this->getDataFromServer('http://maisya.id:6070/api/ItemCode_ImageList?kodeitem='.$data['detailprod']->KodeItem));
		//print_r($data['thumbimage']);;exit;
		$data['price']			= file_get_contents("http://maisya.id:6070/api/GetPrice?kodeitem=".$data['detailprod']->KodeItem);
		$this->load->view('detail_product', $data);
	}
	public function downline(){
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$data['list_downline'] = $this->db->query("select * from platinum_member")->result_array();
		$this->load->view('downline', $data);
	}
	public function pembelian(){
		$data['data_cust'] 	= $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$data['transaksi_unpaid']	= $this->db->query("select * from `order` where cust_id = '".$data['data_cust']->id."' and order_status = 0")->result_array();
		$data['transaksi_paid']	= $this->db->query("select * from `order` where cust_id = '".$data['data_cust']->id."' and order_status = 1")->result_array();
		$this->load->view('pembelian', $data);
	}
	public function conf_pembelian($id){
		$this->db->query("update `order` set order_status = 1 where order_id = '".$id."'");
		redirect("customer/pembelian");
	}
	public function pembelian_awal(){
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		
		$data['listproduct']	= json_decode($this->getDataFromServer('http://maisya.id:6070/Api/PaketPlatinums'));
				
		$this->load->view('dashboard_newmember', $data);
	}
	public function afiliasi(){
		$data['data_cust'] 		= $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$data['idserver'] 		= $data['data_cust']->id;
		$data['profilename'] 	= $data['data_cust']->Nama;
		$data['msg'] 			= '';
		$this->load->view('afiliasi', $data);
	}
	public function saldopoint(){
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$this->load->view('saldopoint', $data);
	}
	public function dukungan(){
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$data['data_cust_notactive'] = $this->db->query("select * from platinum_member where active = 'N'")->result_array();
		$data['listdukungan']		= $this->db->query("select * from tb_dukungan limit 1")->row();
		$this->load->view('dukungan', $data);
	}
	public function promo(){
		$data['listpormo'] = $this->db->query("select * from tb_promo")->result_array();
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$this->load->view('promo', $data);
	}
	public function address(){
		$data['data_cust']  = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		
		$data['data_address']  = $this->db->query("select * from platinum_member_address where id_platinum_member = '".$data['data_cust']->id."'")->result_array();
		
		$data['id_member']	= $data['data_cust']->id;
		
		$this->load->view('address', $data);
	}
	public function masterbank(){
		$data['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		
		$data['data_bank']  = $this->db->query("select * from platinum_member_bank where id_platinum_member = '".$data['data_cust']->id."'")->result_array();
		
		$data['id_member']	= $data['data_cust']->id;
		
		$this->load->view('masterbank', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("login");
	}
	public function getMember(){
		$listmember = json_decode($this->getDataFromServer('http://maisya.id:6070/api/RegPlatinums'));
		//echo "<pre>";
		//print_r($listmember);
		//echo "</pre>";
		foreach($listmember as $trnsme){
			$sql = "INSERT INTO `db_propolis`.`platinum_member` (`id`, `Nama`, `UserName`, `RealPassword`,`Password`, `NoHP`, `Email`, `JenisKelamin`, `Sponsor_id`, `NamaBank`, `NamaAkunBank`, `NomorRekening`, `Nama_keluarga`, `NoHP_keluarga`, `Email_keluarga`, `Server_id`) 
			values ('".$trnsme->Id."','".$trnsme->Nama."','".$trnsme->UserName."','".$trnsme->Password."','".sha1($trnsme->Password)."','".$trnsme->NoHP."','".$trnsme->Email."','".$trnsme->JenisKelamin."','".$trnsme->Sponsor_id."','".$trnsme->NamaBank."','".$trnsme->NamaAkunBank."','".$trnsme->NomorRekening."','".$trnsme->Nama_keluarga."','".$trnsme->NoHP_keluarga."','".$trnsme->Email_keluarga."','".$trnsme->Id."')";
			
			$this->db->query($sql);
			//echo $sql;exit;
		}
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

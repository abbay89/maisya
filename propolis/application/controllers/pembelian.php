<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function Pembelian() {
       parent::__construct();
	   $this->load->model('user_model');
		$this->load->model("checkout_model");	   
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		
		$allOrder = $this->db->query("select *  from `order` where cust_id = '".$this->session->userdata('email')."'")->result();
		
		$data['detail_prod']	= $allOrder;
		
		//echo "masuk";
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['pembelian']		= "primary";
		$data['totalRegplat']	= count($data['listprodu']);
		$data['pembelian']		= "primary";
		
		$this->load->view('pembelian', $data);
	}
	public function paket() {
		
		
		
		$data['listprodu'] 		= json_decode($this->getDataFromServer('http://maisya.id:6070/api/PaketPlatinums'));
		//echo "masuk";
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$cekTrans = $this->db->query("select * from `order` where cust_id = '".$this->session->userdata('email')."'")->row();
		
		if($cekTrans){
			
			$this->load->view('pembelian_paket_proc',$data);
		}
		else{			
			$data['pembelian']		= "primary";
			$data['totalRegplat']	= count($data['listprodu']);
			
			$this->load->view('pembelian_paket', $data);
		}
	}
	public function proc_paket(){
		$data['listprodu'] 		= json_decode($this->getDataFromServer('http://maisya.id:6070/api/PaketPlatinums'));
		//echo "masuk";
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$user_id 		=  $this->session->userdata("email");
		$data['cart']	= json_decode($this->getDataFromServer('http://maisya.id:6070/api/PaketPlatinums'));
		$data['allAddress']		= $this->db->query("select * from customer_address where cust_id = '".$this->session->userdata('email')."'")->result();
		$data['pembelian']		= "primary";
		$data['bonussponsor']	= "135000";
		$data['bonuspoint']		= "7";
		$this->load->view('checkout_reg',$data);
	}
	public function prosescheckout_reg(){
		//print_r($_POST);exit;
		$userProfile	= $this->user_model->userInformation($this->session->userdata('email'))	;
		
		$order['order_name']  	= $userProfile->first_name." ".$userProfile->last_name;
		$order['order_phone'] 	= $userProfile->phone_no;
		$order['order_email'] 	= $userProfile->email;
		$order['order_notes'] 	= $this->input->get_post('order_notes', TRUE);
		$order['order_date']  	= date("Y-m-d H:i:s");
		$order['order_code']  	= date("YmdHis");
		$order['cust_id'] 	  	= $userProfile->user_id;
		$order['cust_ad_id']  	= $_POST['address_id'];
		$order_id 				= $this->checkout_model->insert_order($order);
		for($loop = 0; $loop <= count($_POST['kditem']) - 1;$loop++)
		{
			$orderdet['order_id']  			= $order_id;
			$orderdet['itemname']  			= $_POST['itemname'][$loop];
			$orderdet['ord_det_qty']  		= $_POST['qty'][$loop];
			$orderdet['ord_det_price']  	= $_POST['price'][$loop];
			$orderdet['menu_id']  			= $_POST['kditem'][$loop];
			//print_r($orderdet);exit;
			$this->checkout_model->insert_detorder($orderdet);
			
		}
		
		//usr_point 	user_id 	saldo_point 	saldo_nominal 	order_id 
		$token['user_id']  		= $userProfile->user_id;
		$token['saldo_point']  	= $_POST['bonus_sponsor'];
		$token['saldo_nominal'] = $_POST['bonus_point'];
		$token['order_id'] 		= $order_id;
		
		$this->checkout_model->insert_pointorder($token);
		
		
		
		$this->db->query("update `user` set status = 'reg' where user_id = '".$userProfile->user_id."'");
		//echo $this->db->last_query();exit;
		redirect("invoice/detail/".$order_id);
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
	public function addcart($oid){
		//echo 'http://maisya.id:6070/api/ItemCodes?oid='.$oid;exit;
		$detail	= json_decode($this->getDataFromServer('http://maisya.id:6070/api/ItemCodes?oid='.$oid));
		$price = file_get_contents("http://maisya.id:6070/api/GetPrice?kodeitem=".$detail->KodeItem);
		/*edit by rudy 20180814*/
		
		$sql = $this->db->query("select * from shopping_cart where user_id = '".$this->session->userdata('email')."' and id = '".$detail->ItemCode."'")->row();
		
		//echo $this->db->last_query();
		if(empty($sql)){
			
			$data = array(
			'id'      => $detail->ItemCode,
			'qty'     => 1,
			'price'   => $price,
			'name'    => $detail->Deskripsi,
			'user_id' => $this->session->userdata('email')
			//'options' => array('Size' => 'L', 'Color' => 'Red')
			);
			if($this->session->userdata('email'))
			{
				$this->db->insert('shopping_cart', $data);
			}
		}
		else
		{
			$qtyData	= $this->db->query(
			" Update shopping_cart set qty = qty + 1 where  user_id = '".$this->session->userdata('email')."' and id = '".$detail->ItemCode."'");		
		}
		//$this->cart->insert($data);
		redirect("pembelian/checkout");
	}
	public function checkout(){
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['pembelian']		= "primary";
		$data['cart'] 			= $this->checkout_model->shopping_cart();
		//print_r($data['cart']);
		$data['listAddress']	= $this->checkout_model->getAllAddress();
		$this->load->view('checkout', $data);
	}
	public function detail($oid){
		$data['detailprod']	= json_decode($this->getDataFromServer('http://maisya.id:6070/api/ItemCodes?oid='.$oid));
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		$data['price']			= file_get_contents("http://maisya.id:6070/api/GetPrice?kodeitem=".$data['detailprod']->KodeItem);
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['pembelian']		= "primary";
		$this->load->view('detail_product', $data);
	}
}
?>
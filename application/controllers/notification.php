<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {


	public function __construct()
	{
		
		parent::__construct();
		$this->load->model("checkout_model");
	}

	public function index()
	{
		  $data = json_decode(file_get_contents("php://input"));
		
		   $trx = 'trx_id : '.$data->order_id;
		   $status = 'trx_status : '.$data->transaction_status;
		   $fraud = 'fraud_status : '.$data->fraud_status;
		   $code = 'code_status : '.$data->status_code;
		   
		   $result = $trx.' '.$status.' '.$fraud.' '.$code;
			
	       $bill_no = $this->checkout_model->update_status($data->order_id,$result);
		   
		   if($data->status_code == "200"){
			   
			   $this->sendSoPayment($data->order_id);
			   
		   }
		   
			 
		   echo '{"message":"success"}';

	}
	
	public function getSO($soId){
		
		$curl = curl_init($this->config->item('maisya_server')."/api/SO/".$soId);	
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		
		$result = curl_exec($curl);
		
		$res = json_decode($result);
		
		return $res[0]->Customer_id;
		
	}
	
	public function sendSoPayment($order_id){
		
		$dataorder			= $this->db->query("select * from `order` where order_code = '".$order_id."'")->row();	
		
		$cust_id = $this->getSO($dataorder->so_id);
		
		$send_hdr['Id'] 		= 0 ;
		$send_hdr['NoPayment'] 		= $dataorder->order_code ;
		$send_hdr['Tanggal'] 		= $dataorder->order_date ;
		$send_hdr['Bank_id'] 		= 323 ;
		$send_hdr['Customer_id'] 	= $cust_id;
		//$send_hdr['CustomerCabang_id'] 	= (int)$this->session->userdata('id_server');
		//$send_hdr['Customer_id'] 	= 129;
		$send_hdr['Keterangan'] 	= "";
		$send_hdr['CaraBayar'] 		= 'midtrans';
		$send_hdr['CardNumber'] 	= '';
		$send_hdr['SO_id'] 		= (int)$dataorder->so_id;
		
		//echo 'customernya '.$cust_id;exit;
		$detailorder	= $this->db->query("select * from `order_detail` where order_id = '".$dataorder->order_id."'")->result();
		
		$newdata = array();
		foreach($detailorder as $key_detail){
			
			
			$newdata['SO_id'] 	= $dataorder->so_id;
			$newdata['Tagihan'] 	= (int)$key_detail->ord_det_price;
			$newdata['Bayar']	= (int)$key_detail->ord_det_price;
			$newdata['PaymentFee'] 	= 0;
			
			$send_hdr["SOPaymentLine"][]	= $newdata;
			
			//$i++;
		}
		
		//echo json_encode($send_hdr);exit;
		
		$url='https://www.maisya.id:5060/api/SOPayment';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($send_hdr));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = curl_exec($ch);
		
		//echo var_dump($result);
	}
	
}

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function Checkout() {
        parent::__construct();
		$this->load->model("checkout_model");
		$this->load->model("home_model");
		
		$this->loadJS = array (
			'/assets-front/js/jquery.js',
			'/assets/js/jquery.min.js',
			'/assets/jq_ui/jquery-ui.min.js',
			'/assets/js/skdslider.min.js',
			'/assets/js/custom.js',
			'/assets/js/slick.min.js',
			'/assets/js/bootstrap.js',
			'/assets/js/tagInput.js',
			'/assets/js/multiaccordion.jquery.js');
			
		$this->loadCSS = array(
			
			'/assets/css/slick.css',
			'/assets/css/slick-theme.css',
			'/assets/css/skdslider.css',
			'/assets/css/slider.css',
			'/assets/css/bootstrap.min.css',
			'/assets/jq_ui/jquery-ui.css',
			'/assets/css/style.css'
			
		);	
    }

    public function index() {
    	$this->load->library('user_agent');
  
		$error = 0;
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		//echo $this->session->userdata('token');
		
		
		
		$data['allstore']			= $this->db->query("select * from location where take_away = 1")->result_array();
		
		$data['title_page']			= 	"Maisya Jewellery Online Shop Checkout";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		//$data['chart'] = $this->cart->contents();
		$data['chart'] = $this->checkout_model->shopping_cart();
		
		
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		
		$data['totalwhs']	=  $wh->total;
		$data['allBank']	= $this->checkout_model->getAllBank();
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		
		
		$data['maxbook']	= $this->db->query("select inf_time from tb_infbook")->row(); 
		
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		
		//echo $this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$this->session->userdata("id_server");
	
		$curl = curl_init($this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$this->session->userdata("id_server"));	
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));		
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15); 
		// curl_setopt($ch, CURLOPT_TIMEOUT, 400);
		$result 	= curl_exec($curl);
		$retry = 0;
		while(curl_errno($curl) == 28 && $retry < 3){
		    $result = curl_exec($curl);
		    $retry++;
		}
		
		//print_r($dtreturn);
		
		if(!$result) {
			// $this->session->sess_destroy();
			// redirect("home");
			if ($this->agent->is_referral()){
			    redirect($this->agent->referrer());
			}
			$this->load->view('need_login',$data);
			$error = 1;
		}
		
		
		$data['listAddress']		= json_decode($result);
		
		
		if (!$this->session->userdata('cust_username')) {
			if($error = 0){
				$this->load->view('need_login',$data);
			}
        }
		else
		{
			//print_r($data);
			$this->load->view('checkout_page',$data);
		}
    }
	public function save_address(){
		
		//print_r($this->session->all_userdata());
		//exit;
		
		$post_data = 'MitraCabang_id='.$this->session->userdata('id_server').'&LabelAlamat='.$_POST['cust_type'].'&NamaPenerima='.$_POST['cust_name'].'&NoHP='.$_POST['cust_phone'].'&Kota_Kecamatan='.$_POST['kecamatan'].'&KodePos='.$_POST['cust_postel_code'].'&Alamat='.$_POST['cust_ad_address'];
		$url='https://www.maisya.id:5060/api/AlamatKirim';
		
		//echo $post_data;
		
		//echo "token: ".$this->session->userdata('token');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));
		
		$result = curl_exec($ch);
		//print_r($result);exit;
		$status	= json_decode($result);
//print_r($status);exit;
		if(($status->id == ''))
		{
			echo "masuk";
			//$this->session->sess_destroy();
			//redirect("checkout");
		}
		//print_r($status);exit;
		
		$order['cust_type']   		= $this->input->get_post('cust_type', TRUE);
		$order['cust_name']   		= $this->input->get_post('cust_name', TRUE);
		$order['cust_ad_address']  	= $this->input->get_post('cust_ad_address', TRUE);
		$order['kecamatan']  		= $this->input->get_post('kecamatan', TRUE);
		$order['city_name']  		= $this->input->get_post('city_name', TRUE);
		$order['cust_phone'] 	 	= $this->input->get_post('cust_phone', TRUE);
		$order['cust_email'] 	 	= $this->input->get_post('cust_email', TRUE);
		$order['cust_postel_code'] 	= $this->input->get_post('cust_postel_code', TRUE);
		$order['cust_id'] 			= $this->input->get_post('cust_id', TRUE);
		$order['id_server'] 		= $status->id;
		
		
		$order_id = $this->checkout_model->insert_address($order);
		
		redirect("checkout");
	}
	public function prosescheckout(){
		
		
		
		if($this->input->get_post('idalamat',TRUE) == ""){
			echo "<script>alert('Silahkan Isi Alamat Kirim');location.href='".base_url()."checkout';</script>";
			echo "ddd".$this->input->get_post('idalamat',TRUE)."mmm";
			exit;
		}
		
		
		foreach($this->checkout_model->shopping_cart() as $checkCart)
		{
			$calculate	= $this->checkStok($checkCart['id']);
			
			
			 if($checkCart['qty'] > $calculate['total_stock'] ){ 
				echo "<script> alert('Mohon maaf untuk saat ini stock barang pesanan <b>".$checkCart['name']."</b> anda hanya tersedia ".$calculate['available_stock']." unit, mohon menyesuaikan dengan quantity stock yang tersedia');location.href = '".base_url()."checkout';</script>";
			}else if( $calculate['total_stock'] <= 0){
				echo "<script> alert('Mohon maaf untuk saat ini stock barang pesanan <b>".$checkCart['name']."</b> anda kosong');location.href = '".base_url()."checkout';</script>";
			}
		}
		
		//$address	= $this->db->query("select * from customer_address where id_server = '".$this->input->get_post('idalamat',TRUE)."'")->row();
		
		$curl = curl_init($this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$this->session->userdata("id_server"));	
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));
		//echo "token: ".$this->session->userdata('token');
		$result = curl_exec($curl);
		//echo $this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$this->session->userdata("id_server");
		
		$address		= json_decode($result);
		//print_r($address[0]->NamaPenerima);
		$maxbook	= $this->db->query("select inf_time from tb_infbook")->row();
		
		//print_r($_POST);
		$order['order_address']  = $this->input->get_post('idalamat',TRUE);
		$order['order_name']  = $address[0]->NamaPenerima;
		$order['order_phone'] = $address[0]->NoHP;
		$order['order_email'] = '';
		$order['order_notes'] = $address[0]->Alamat;
		$order['alamat_kirim_server'] = $this->input->get_post('idalamat',TRUE);
		$order['order_date']  = date("Y-m-d H:i:s");
		if($this->input->get_post('kurir', TRUE) != 0){
			$order['kurir']	 		= $this->input->get_post('kurir', TRUE);
		}else{
			$order['location_id'] 	= $this->input->get_post('location', TRUE);
		}
		
		
		//$this->getAddresid($address);
		//exit;
		
	
		//echo $maxbook->inf_time;exit;
		
		$timestamp = strtotime($order['order_date']) + $maxbook->inf_time*60*60;
		$time = date('Y-m-d H:i:s', $timestamp);
		//echo $time;//11:09
		$order['order_exp']   	= $time;
		$order['order_code']  	= date("YmdHis");
		$order['order_status']  = 0;
		$order['cust_id'] 	 	= $this->session->userdata('cust_id');
		//print_r($order);exit;
		$order_id = $this->checkout_model->insert_order($order);
		
		//echo $this->db->last_query();exit;
		//echo $order_id; 
		$i = 0;
		//echo "ksksksk";exit;
		
		//print_r($this->checkout_model->shopping_cart());
		foreach($this->checkout_model->shopping_cart() as $lstChart)
		{
			//print_r($lstChart);exit;
			$orderdet['order_id']  			= $order_id;
			$orderdet['ord_det_qty']  		= $lstChart['qty'];
			$orderdet['ord_det_price']  	= $lstChart['price'];
			$orderdet['menu_id']  			= $lstChart['id'];
			$orderdet['weight_item']  		= $lstChart['weight_item'];
			
			$orderdet['itemname']  			= $lstChart['name'];
			$orderdet['description_item'] 	= $_POST['descitem'][$i];
			
			//print_r($orderdet);
			
			$this->checkout_model->insert_detorder($orderdet);
			
			$i++;
			
		}
		
		//echo $this->db->last_query();
		//exit;
		$this->create_so($order['order_code']);
		redirect("vtweb/vtweb_checkout/".$order['order_code']);
	}
	public function del_address($id){
		$url='https://www.maisya.id:5060/api/AlamatKirim/'.$id;
		
		echo "token: ".$this->session->userdata('token');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$status	= json_decode($result);
		//print_r($status);exit;
		if(empty($status))
		{
			$this->db->query("delete from customer_address where id_server = '".$id."'");
			
		}
		else
		{
			
		}
		redirect("checkout");
		
	}
	
	public function create_so($order_no){
	
		$so_id = $this->sendSomaisya($order_no);					
		$this->db->query("update `order` set so_id = '".$so_id."' where order_code = '".$order_no."'");
		
	}
	
	
	
	public function finishorder(){
		//print_r($_GET);
		//echo "Update `order` set order_status = 1 where order_code = '".$_GET['order_id']."'";
		//echo "select * from `order` where order_code = '".$_GET['order_id']."'";
		//getdata
		$dataorder	= $this->db->query("select * from `order` where order_code = '".$_GET['order_id']."'")->row();
		
		
		
		//tesssssss
		//$this->sendSomaisya($_GET['order_id']);exit;
		if($dataorder->order_status == 0){
			if($dataorder->kurir){
				$jne_id	= $this->getJNEid($_GET['order_id'],$dataorder->order_address);
				
				if($jne_id)
				{
					if($this->db->query("update `order` set jne_id = '".$jne_id."' where order_code = '".$_GET['order_id']."'"))
					{
						$so_id = $this->sendSomaisya($_GET['order_id']);
						
						$this->db->query("update `order` set so_id = '".$so_id."' where order_code = '".$_GET['order_id']."'");
					}

					$this->db->query("Update `order` set order_status = 1 where order_code = '".$_GET['order_id']."'");
					
					sleep(2);
					redirect("invoice/detail/".$_GET['order_id']);
				}
				else
				{
					exit;
				}
			}else{
				$so_id = $this->sendSomaisya($_GET['order_id']);					
				$this->db->query("update `order` set so_id = '".$so_id."' where order_code = '".$_GET['order_id']."'");

				$this->db->query("Update `order` set order_status = 1 where order_code = '".$_GET['order_id']."'");

				sleep(2);
				redirect("invoice/detail/".$_GET['order_id']);
			}
		}else{
			redirect("invoice/detail/".$_GET['order_id']);
		}
		
		
	}
	public function m_finishorder(){
		//print_r($_GET);
		//echo "Update `order` set order_status = 1 where order_code = '".$_GET['order_id']."'";
		//echo "select * from `order` where order_code = '".$_GET['order_id']."'";
		//getdata
		$dataorder	= $this->db->query("select * from `order` where order_code = '".$_GET['order_id']."'")->row();
		
		
		
		//tesssssss
		//$this->sendSomaisya($_GET['order_id']);exit;
		if($dataorder->order_status == 0){
			if($dataorder->kurir){
				$jne_id	= $this->getJNEid($_GET['order_id'],$dataorder->order_address);
				
				if($jne_id)
				{
					if($this->db->query("update `order` set jne_id = '".$jne_id."' where order_code = '".$_GET['order_id']."'"))
					{
						$so_id = $this->m_sendSomaisya($_GET['order_id'],$_GET['idmaisya'],$_GET['token']);
						
						$this->db->query("update `order` set so_id = '".$so_id."' where order_code = '".$_GET['order_id']."'");
					}
					$this->db->query("Update `order` set order_status = 1 where order_code = '".$_GET['order_id']."'");

					sleep(2);
					
					redirect("invoice/detail/".$_GET['order_id']);
				}
				else
				{
					exit;
				}
			}else{
				$so_id = $this->m_sendSomaisya($_GET['order_id'],$_GET['idmaisya'],$_GET['token']);					
				$this->db->query("update `order` set so_id = '".$so_id."' where order_code = '".$_GET['order_id']."'");

				$this->db->query("Update `order` set order_status = 1 where order_code = '".$_GET['order_id']."'");

				sleep(2);

				redirect("invoice/detail/".$_GET['order_id']);
			}
		}else{
			redirect("invoice/detail/".$_GET['order_id']);
		}
		
		
	}
	
	public function getJNEid($order_id,$addressid){
		//echo "select * from customer_address where cust_ad_id = '".$addressid."'";
		//get address
		//$receiver	= $this->db->query("select * from customer_address where id_server = '".$addressid."'")->row();
		
		$curl = curl_init($this->config->item('maisya_server')."/api/AlamatKirim/".$addressid);	
		
		//echo $this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$addressid;
		
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',
		// 			'token: ' . $this->session->userdata('token'))); 
		// echo "token: ".$this->session->userdata('token');
		$result = curl_exec($curl);
		//echo $this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$addressid;
		
		$address		= json_decode($result);
		// print_r($address);
		// echo "string";
		if (curl_errno($curl)) {
		    $error_msg = curl_error($curl);
		    // print_r($error_msg);
		}
		
		//getDstinationcode
		$code_dest = $this->db->query("select * from destination_jne where kecamatan = '".$address->data->Kota_Kecamatan."'")->row();
		//get order
		$cust_id	= $receiver->cust_id;
		
		//getinvoice
		$noinv	= $this->db->query("select * from `order` where order_code = '".$order_id."'")->row();
		
		//getDetailOrder
		$detail	= $this->db->query("select sum(ord_det_price) as amount,sum(ord_det_qty) as qty,sum(weight_item) as weight from order_detail where order_id = '".$noinv->order_id."'")->row();
		
		
		$username 				= 'MAISYAMAKMUR';
		$api_key				= '2cf742b9fb2cf3da62abd7e8e369c357';
		$OLSHOP_BRANCH			= 'CGK000';
		$OLSHOP_CUST			= '10726400';
		$OLSHOP_ORDERID			= $noinv->order_code;
		$OLSHOP_SHIPPER_NAME	= 'Maisya Jewellery Online Shop';
		$OLSHOP_SHIPPER_ADDR1	= 'Jl. Pahlawan Revolusi No. 2';
		$OLSHOP_SHIPPER_ADDR2 	= 'Pondok Bambu';
		$OLSHOP_SHIPPER_CITY	= 'Jakarta Timur';
		$OLSHOP_SHIPPER_ZIP		= '13430';
		$OLSHOP_SHIPPER_PHONE	= '08119994814';
		$OLSHOP_RECEIVER_NAME	= $address->data->NamaPenerima;
		$OLSHOP_RECEIVER_ADDR1	= $address->data->Alamat;
		$OLSHOP_RECEIVER_ADDR2	= '';
		$OLSHOP_RECEIVER_CITY	= '111';
		$OLSHOP_RECEIVER_ZIP	= '111';
		$OLSHOP_RECEIVER_PHONE	= $address->data->NoHP;
		$OLSHOP_QTY				= $detail->qty;
		$OLSHOP_WEIGHT			= ceil($detail->weight);
		$OLSHOP_GOODSDESC		= 'Maisya Jewellery Online Shop';//$goodDesc;
		$OLSHOP_GOODSVALUE		= $detail->amount;//$goodValue;
		$OLSHOP_GOODSTYPE		= '2';//$goodType;
		$OLSHOP_INS_FLAG		= 'Y';
		$OLSHOP_ORIG			= 'CGK10000';
		$OLSHOP_DEST			= $code_dest->kode;
		$OLSHOP_SERVICE			= 'REG';
		$OLSHOP_COD_AMOUNT 		= $detail->amount; 
		
		//$curl = curl_init();
		$post_data="username=".$username."&api_key=".$api_key."&OLSHOP_BRANCH=".$OLSHOP_BRANCH."&OLSHOP_CUST=".$OLSHOP_CUST."&OLSHOP_ORDERID=".$OLSHOP_ORDERID."&OLSHOP_SHIPPER_NAME=".$OLSHOP_SHIPPER_NAME."&OLSHOP_SHIPPER_ADDR1=".$OLSHOP_SHIPPER_ADDR1."&OLSHOP_SHIPPER_ADDR2=".$OLSHOP_SHIPPER_ADDR2."&OLSHOP_SHIPPER_CITY=".$OLSHOP_SHIPPER_CITY."&OLSHOP_SHIPPER_ZIP=".$OLSHOP_SHIPPER_ZIP."&OLSHOP_SHIPPER_PHONE=".$OLSHOP_SHIPPER_PHONE."&OLSHOP_RECEIVER_NAME=".$OLSHOP_RECEIVER_NAME."&OLSHOP_RECEIVER_ADDR1=".$OLSHOP_RECEIVER_ADDR1."&OLSHOP_RECEIVER_ADDR2=".$OLSHOP_RECEIVER_ADDR2."&OLSHOP_RECEIVER_CITY=".$OLSHOP_RECEIVER_CITY."&OLSHOP_RECEIVER_ZIP=".$OLSHOP_RECEIVER_ZIP."&OLSHOP_RECEIVER_PHONE=".$OLSHOP_RECEIVER_PHONE."&OLSHOP_QTY=".$OLSHOP_QTY."&OLSHOP_WEIGHT=".$OLSHOP_WEIGHT."&OLSHOP_GOODSDESC=".$OLSHOP_GOODSDESC."&OLSHOP_GOODSVALUE=".$OLSHOP_GOODSVALUE."&OLSHOP_GOODSTYPE=".$OLSHOP_GOODSTYPE."&OLSHOP_INS_FLAG=".$OLSHOP_INS_FLAG."&OLSHOP_ORIG=".$OLSHOP_ORIG."&OLSHOP_DEST=".$OLSHOP_DEST."&OLSHOP_SERVICE=".$OLSHOP_SERVICE."&OLSHOP_COD_AMOUNT=".$OLSHOP_COD_AMOUNT;
		//$url='https://apiv2.jne.co.id:10102/tracing/api/generatecnote';
		$url='http://apiv2.jne.co.id:10101/tracing/api/generatecnote';
		
		//echo $post_data;
		//exit;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$result = curl_exec($ch);
		$status	= json_decode($result);
		
		print_r($status);
		if (curl_errno($ch)) {
		    $error_msg = curl_error($ch);
		    // print_r($error_msg);
		}
		
		
		return $status->detail[0]->cnote_no;
	}
	
	public function sendSomaisyaPayment($orderid)
	{
		$dataorder	= $this->db->query("select * from `order` where order_code = '".$orderid."'")->row();		
		$send_hdr['OrderNumber'] 	= $dataorder->order_code ;
		$send_hdr['Tanggal'] 		= $dataorder->order_date ;
		$send_hdr['Customer_id'] 	= $this->session->userdata('id_server');
		//$send_hdr['Customer_id'] 	= 129;
		$send_hdr['AlamatKirim_id'] = $dataorder->alamat_kirim_server;
		$send_hdr['BiayaKirim'] 	= 0;
		
		$detailorder	= $this->db->query("select * from `order_detail` where order_id = '".$dataorder->order_id."'")->result();
		
		$newdata = array();
		foreach($detailorder as $key_detail){
			$newdata['KodeItem'] 	= $key_detail->menu_id;
			//$newdata['KodeItem'] 	= $key_detail->itemname;
			$newdata['Quantity'] 	= $key_detail->ord_det_qty;
			$newdata['Harga'] 		= $key_detail->ord_det_price;
			$newdata['DiscPercent']	= 0;
			$newdata['DiscAmount'] 	= 0;
			
			$send_hdr["SOLines"][]	= $newdata;
			
			//$i++;
		}
		
		
		//print_r(json_encode($send_hdr));exit;
		
		$url='https://www.maisya.id:5060/api/SO';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($send_hdr));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = curl_exec($ch);
		
		
		/* $ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($send_hdr));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',
			'token: ' . $this->session->userdata('token'))                                                                       
		);
		
		$result = curl_exec($ch); */
		$status	= json_decode($result);
		
		//echo "<pre>";
		//print_r($status);exit;
		//echo "</pre>";
		
		return $status->id;
		//exit;
	}
	
	
	public function sendSomaisya($orderid)
	{
		$dataorder	= $this->db->query("select * from `order` where order_code = '".$orderid."'")->row();		
		$send_hdr['OrderNumber'] 	= $dataorder->order_code ;
		$send_hdr['Tanggal'] 		= $dataorder->order_date ;
		$send_hdr['Customer_id'] 	= $this->session->userdata('id_server');
		//$send_hdr['Customer_id'] 	= 32749;
		$send_hdr['AlamatKirim_id'] = $dataorder->alamat_kirim_server;
		//$send_hdr['AlamatKirim_id'] = 10081;
		$send_hdr['BiayaKirim'] 	= 0;
		$send_hdr['Posted'] 	= false;
		$send_hdr['NamaGrafier'] 	= 'none';
		
		$detailorder	= $this->db->query("select * from `order_detail` where order_id = '".$dataorder->order_id."'")->result();
		
		$newdata = array();
		foreach($detailorder as $key_detail){
			$newdata['KodeItem'] 	= $key_detail->menu_id;
			//$newdata['KodeItem'] 	= $key_detail->itemname;
			$newdata['Quantity'] 	= $key_detail->ord_det_qty;
			$newdata['Harga'] 		= $key_detail->ord_det_price;
			$newdata['DiscPercent']	= 0;
			$newdata['DiscAmount'] 	= 0;
			
			$send_hdr["SOLines"][]	= $newdata;
			
			//$i++;
		}
		
		
		//print_r(json_encode($send_hdr));exit;
		
		$url='https://www.maisya.id:5060/api/SO';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',
					'token: ' . $this->session->userdata('token'))); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($send_hdr));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = curl_exec($ch);
		
		
		/* $ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($send_hdr));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',
			'token: ' . $this->session->userdata('token'))                                                                       
		);
		
		$result = curl_exec($ch); */
		$status	= json_decode($result);
		
		//echo "<pre>";
		//print_r($status);exit;
		//echo "</pre>";
		
		return $status->id;
		//exit;
	}
	public function m_sendSomaisya($orderid,$idmaisya,$token)
	{
		$dataorder	= $this->db->query("select * from `order` where order_code = '".$orderid."'")->row();		
		$send_hdr['OrderNumber'] 	= $dataorder->order_code ;
		$send_hdr['Tanggal'] 		= $dataorder->order_date ;
		$send_hdr['Customer_id'] 	= $idmaisya;
		$send_hdr['AlamatKirim_id'] = $dataorder->alamat_kirim_server;
		$send_hdr['BiayaKirim'] 	= 0;
		
		$detailorder	= $this->db->query("select * from `order_detail` where order_id = '".$dataorder->order_id."'")->result();
		
		$newdata = array();
		foreach($detailorder as $key_detail){
			$newdata['KodeItem'] 	= $key_detail->menu_id;
			//$newdata['KodeItem'] 	= $key_detail->itemname;
			$newdata['Quantity'] 	= $key_detail->ord_det_qty;
			$newdata['Harga'] 		= $key_detail->ord_det_price;
			$newdata['DiscPercent']	= 0;
			$newdata['DiscAmount'] 	= 0;
			
			$send_hdr["SOLines"][]	= $newdata;
			
			//$i++;
		}
		
		
		//print_r(json_encode($send_hdr));
		
		$url='https://www.maisya.id:5060/api/SO';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($send_hdr) );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',
			'token: ' . $token)                                                                       
		);
		$result = curl_exec($ch);
		$status	= json_decode($result);
		
		//echo "<pre>";
		//print_r($status->id);
		//echo "</pre>";
		
		return $status->id;
		//exit;
	}
	public function getAddresid($address) 
	{
		
		
		$customerid = $this->session->userdata('id_server');
		
		$ship_type		= $address->cust_type;
		$ship_name		= $address->cust_name;
		$ship_phone		= $address->cust_phone;
		$ship_kec		= $address->city_name;
		$ship_kodepos	= $address->cust_postel_code;
		$ship_address	= $address->cust_ad_address;
		$post_data = 'MitraCabang_id='.$customerid.'&LabelAlamat='.$ship_type.'&NamaPenerima='.$ship_name.'&NoHP='.$ship_phone.'&Kota_Kecamatan='.$ship_kec.'&KodePos='.$ship_kodepos.'&Alamat='.$ship_address;
		$url='https://www.maisya.id:5060/api/AlamatKirim';
		
		echo $post_data;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));
		$result = curl_exec($ch);
		$status	= json_decode($result);
		
		print_r($result);exit;
	}
	public function sendPayment(){
		
		
		$data['title'] = '';
		$this->load->view('test_payment',$data);
		
	}
	
	public function checkStok($productid){
		//cek local database
		//$sql			= "select sum(ord_det_qty) as total from order_detail where menu_id = '".$productid."'";
		
		$sql	= "select sum(ord_det_qty) as total from `order` join order_detail on order.order_id = order_detail.order_id where menu_id = '".$productid."' and order_status = 0";
		
		//echo $sql;
			
		$row			= $this->db->query($sql)->row();
		$stock_checkout	= $row->total;
		
		$data_server	= json_decode($this->getDetailProduct('/api/products/'.$productid));
		$stock_server	= $data_server->QtyStock;
		
		$data['available_stock']	= $stock_server;
		$data['total_stock']		= $stock_server - $stock_checkout;
		
		return $data;
		
	}
	public function getDetailProduct($qry_str){
		//echo $this->config->item('maisya_server').$qry_str;
		$curl = curl_init($this->config->item('maisya_server').$qry_str);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result;
	}
	
	public function minuschart($rowid,$qty){
		if($qty == 1)
		{
			$qtyData	= $this->db->query(
			" Delete from shopping_cart where  user_id = '".$this->session->userdata('cust_username')."' and id = '".$rowid."'");		
		}
		else
		{
			$qtyData	= $this->db->query(
			" Update shopping_cart set qty = qty - 1 where  user_id = '".$this->session->userdata('cust_username')."' and id = '".$rowid."'");		
		}
		if ($qtyData) {
		 echo "Success";         
		}else{
			 echo "Faliure";
		}
		redirect("checkout");
	}
	public function pluschart($rowid,$qty){
		//$this->db->query("Delete from shopping_cart ");exit;
		//getLastData		
		//$qtyData	= $this->db->query("select * from shopping_cart where user_id = '".$this->session->userdata('cust_username')."' and id = '".$rowid."'")->row();
		
		//print_r($qtyData);exit;
		$qtyData	= $this->db->query(
			" Update shopping_cart set qty = qty + 1 where  user_id = '".$this->session->userdata('cust_username')."' and id = '".$rowid."'");		

		if ($qtyData) {
		 echo "Success";         
		}else{
			 echo "Faliure";
		}
		redirect("checkout");
	}
}

?>

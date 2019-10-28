<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function Customer() {
       parent::__construct();
	   $this->load->library('cart');
	   $this->load->model('user_model');
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index(){
		$contn['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		
		
		$this->load->view("checkout",$contn);
	}
	public function invoice($noinv){
		$contn['data_cust'] = $this->db->query("select * from `order` left join platinum_member on `order`.cust_id = platinum_member.id where `order`.order_code = '".$noinv."'")->row();
		$contn['noinv']		= $noinv;
		
		$this->load->view("invoice",$contn);
	}
	public function repeat_order($oid){
		$contn['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$dtl_prod = file_get_contents("http://maisya.id:6070/api/ItemCodes?oid=".$oid);
		$parse_data = json_decode($dtl_prod);
		$price			= file_get_contents("http://maisya.id:6070/api/GetPrice?kodeitem=".$parse_data->KodeItem);
		//print_r($price);exit;
		$data = array(
				'id'      => $parse_data->OID,
				'qty'     => 1, 
				'price'   => $price,
				'name'    => $parse_data->Deskripsi//,
				//'options' => array('NormalPrice' => $listNewmember->Price, 'Discount' => $listNewmember->DiscountAmount)
		);

		$this->cart->insert($data);
		
		$this->load->view("checkout",$contn);
	}
	public function newmember($oid){
		$contn['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$listproduct	= json_decode($this->getDataFromServer('http://maisya.id:6070/Api/PaketPlatinums'));
		foreach($listproduct as $listNewmember){
			$dtl_prod 	= file_get_contents("http://maisya.id:6070/api/ItemCodes?oid=".$listNewmember->ItemCode_oid);
			$parse_data = json_decode($dtl_prod);
			$data = array(
					'id'      => $listNewmember->ItemCode_oid,
					'qty'     => $listNewmember->Quantity,
					'price'   => $listNewmember->Net,
					'name'    => $parse_data->Deskripsi,
					'options' => array('NormalPrice' => $listNewmember->Price, 'Discount' => $listNewmember->DiscountAmount)
			);

			$this->cart->insert($data);
		}
		
		$this->load->view("checkout_new",$contn);
		
	}
	public function apiAddress(){
		$data_cust = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		
		$data 	= $this->db->query("select id,address as name,address_name from platinum_member_address where id_platinum_member = '".$data_cust->id."'")->result_array();
		$count 	= $this->db->query("select count(address) as total from platinum_member_address where id_platinum_member = '".$data_cust->id."'")->row();
		if ($count->total > 0) {
			 $list = array();
			 $key=0;
			 foreach($data as $row) {
				 $list[$key]['id'] = $row['id'];
				 $list[$key]['text'] = $row['name']." (".$row['address_name'].")"; 
			 $key++;
			 }
			 echo json_encode($list);
		 } else {
			 echo "hasil kosong";
		 }
		exit;
	}
	public function del_checkout($id){
		$data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
		//print_r($this->cart->update($data));
		redirect("checkout");
	}
	public function min_checkout($id,$qty){
		$data = array(
            'rowid'   => $id,
            'qty'     => $qty
        );

        $this->cart->update($data);
		//print_r($this->cart->update($data));
		redirect("checkout");
	}
	
	public function proc_order(){
		
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		/*exit;*/
		
		$data_head['cust_id'] 		= $_POST['cust_id'];
		$data_head['order_date'] 	= $_POST['transdate'];
		$data_head['order_status'] 	= 0;
		$data_head['cust_ad_id'] 	= $_POST['address'];
		$data_head['order_code']  	= date("YmdHis");
		
		$this->db->insert('order', $data_head);
		$order_id = $this->db->insert_id();
		
		$i = 0;
		$xx = 0;
		$orderdet = array();
		for($xx == 0; $xx <= count($_POST['oid']) - 1; $xx++)
		{
			$dtl_prod 	= file_get_contents("http://maisya.id:6070/api/ItemCodes?oid=".$_POST['oid'][$xx]);
			$parse_data = json_decode($dtl_prod);
			
			$orderdet['order_id']  			= $order_id;
			$orderdet['ord_det_qty']  		= $_POST['qty'][$xx];
			$orderdet['ord_det_unitprice']  = $_POST['price'][$xx];
			$orderdet['ord_det_price']  	= $_POST['qty'][$xx] * $_POST['price'][$xx];
			$orderdet['ord_det_discount']  	= $orderdet['ord_det_price'] * ($_POST['discount'][$xx] /100);
			$orderdet['ord_det_net']  		= $orderdet['ord_det_price'] - $orderdet['ord_det_discount'] ;
			$orderdet['menu_id']  			= $_POST['oid'][$xx];		
			$orderdet['itemname']  			= $parse_data->Deskripsi;
			
			//print_r($orderdet);
			
			$this->db->insert('order_detail', $orderdet);
			
			$total_point	= $total_point + ($_POST['qty'][$xx] * $_POST['point'][$xx]);
			$total_bonus	= $total_bonus + ($_POST['qty'][$xx] * $_POST['bonus'][$xx]);
			
			$i++;
			
		}
		
		$this->db->query("update platinum_member set point = point + ".$total_point." where id = '".$_POST['cust_id']."'");
		$this->db->query("update platinum_member set sponsor = sponsor + ".$total_bonus." where id = '".$_POST['sponsor_id']."'");
		//echo $this->db->last_query();exit;
		$this->cart->destroy();
		
		redirect("customer");
	}
	public function proc_order_new(){
		$contn['data_cust'] = $this->db->query("select * from platinum_member where Email = '".$this->session->userdata("email")."'")->row();
		$order = array();
		$order['order_code']  	= date("YmdHis");
		$order['order_status']  = 0;
		$order['cust_id'] 	 	= $contn['data_cust']->id;
		$this->db->insert('order', $order);
		$order_id = $this->db->insert_id();
		
		$i = 0;
		$orderdet = array();
		foreach($this->cart->contents() as $lstChart)
		{
			
			$orderdet['order_id']  			= $order_id;
			$orderdet['ord_det_qty']  		= $lstChart['qty'];
			$orderdet['ord_det_price']  	= $lstChart['price'];
			$orderdet['menu_id']  			= $lstChart['id'];			
			$orderdet['itemname']  			= $lstChart['name'];
			
			//print_r($orderdet);
			
			$this->db->insert('order_detail', $orderdet);
			
			$i++;
			
		}
		$this->cart->destroy();
		$this->load->view("finish_new",$contn);
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

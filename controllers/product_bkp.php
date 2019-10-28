<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    public function Home() {
        parent::__construct();
		$this->load->model("home_model");
    }

    public function category($cate,$type,$title='',$page=1) {
		//echo $cate."===>".$type."==>".$page;
		//echo json_encode($this->getDataFromServer('/api/products/21/1/CategoryID'));
		$data['cate_prod'] 		= $cate;
		$data['type_prod'] 		= $type;
		if($cate == 'rings')
		{
			
			if($type == 'all')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=ring'));
				$customers	= $datajson->ProductList;
				if($_POST['unitprice']){
					$customers	= $this->cekFilterPrice($datajson->ProductList);
				}
				if($_POST['shape']){
					
					$customers	= $this->cekFilterShape($customers);
					//exit;
				}
				$data['detail_prod'] = $customers;
				if($_POST['unitprice'] || $_POST['shape'])
				{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
				else{
					
					$data['count_product'] = $datajson;
					
				}
				$data['titlepage'] = '<li >Rings </li><li class="active">All Rings</li>';
				
			}
			else if($type == 'gemstone')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=ring&subtag=gemstone'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'engagement')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=ring&subtag=engagement'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'mens')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=ring&subtag=mens'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'solitaire')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=ring&subtag=solitaire'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'wedding')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=ring&subtag=wedding'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'womens')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=ring&subtag=womens'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
		}
		else if($cate == 'earrings')
		{
			if($type == 'all')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=earring'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product']				 = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
				//print_r($data['count_product']['TotalCount']);
			}
			else if($type == 'everyday')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=earring&subtag=everyday'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'littlelovelies')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=earring&subtag=littlelovelies'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'solitaire')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=earring&subtag=solitaire'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'stud')
			{
				$datajson	= json_decode($this->getDataFromServer('/api/products/9/'.$page.'/categoryid?tag=earring&subtag=stud'));
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
		}
		else if($cate == 'gemstone')
		{
			if($type == 'all')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=GEMSTONE'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'alexandrite')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=gemstone&subtag=alexandrite'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'cateye')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=gemstone&subtag=cateye'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'emerald')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=gemstone&subtag=emerald'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'ruby')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=gemstone&subtag=ruby'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			else if($type == 'sapphire')
			{
				//print_r($_POST);
				$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=gemstone&subtag=sapphire'));				
				$customers	= $this->cekFilterPrice($datajson->ProductList);
				if($_POST['shape']){
					$customers	= $this->cekFilterShape($customers);
				}
				$data['detail_prod'] = $customers;
				if(!$_POST['unitprice'] || !$_POST['shape'])
				{
					$data['count_product'] = $datajson;
				}
				else{
					$data['count_product'] = $customers;
					$data['count_product']['TotalCount'] = count($data['count_product']);
				}
			}
			
		}
		$data['controller']	= $this; 
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('list_product', $data);
    }
	public function cekFilterPrice($jsondata){
		$customers 		= array();
		$filterprc 		= array();
		$i				= 0;
		//foreach ($datajson->ProductList as $resource){
		foreach ($jsondata as $resource){
			foreach($_POST['unitprice'] as $price)
			{	
				if($price == '100K-5M')
				{
					if (($resource->UnitPrice >= 100000) && ($resource->UnitPrice <= 5000000)){
					
						$customers[] = $resource;

					}
				}
				if($price == '5M-10M')
				{
					if (($resource->UnitPrice >= 5000000) && ($resource->UnitPrice <= 10000000)){
						$customers[] = $resource;

					}
				}
				if($price == '10M-50M')
				{
					if (($resource->UnitPrice >= 10000000) && ($resource->UnitPrice <= 50000000)){
						$customers[] = $resource;

					}
				}
				if($price == '50M+')
				{
					if (($resource->UnitPrice >= 50000000)){
						$customers[] = $resource;

					}
				}
				
			}

		}
		
		if(empty($customers) && empty($_POST['unitprice']))
		{
			$customers = $jsondata;
		}
		return $customers;
	}
	public function cekFilterShape($jsondata){
		$customers 		= array();
		$filterprc 		= array();
		$i				= 0;
		//foreach ($datajson->ProductList as $resource){
			
		foreach ($jsondata as $resource){
			//print_r($resource->StoneInformations[0]->shape);
			//exit;
			foreach($_POST['shape'] as $shape)
			{	
				//echo ".".$shape."masuk sini";exit;
				if($shape == 'round')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='round'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'princess')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='princess'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'cushion')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='cushion'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'emerald')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='emerald'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'radiant')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='radiant'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'asscher')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='asscher'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'pear')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='pear'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'oval')
				{
					//print_r("'".$resource->StoneInformations[0]->shape."'");
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) == 'oval'){
						//echo "nahlo";
						$customers[] = $resource;

					}
					//exit;
				}
				if($shape == 'marquise')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='marquise'){
					
						$customers[] = $resource;

					}
				}
				if($shape == 'heart')
				{
					if (str_replace(" ","",strtolower($resource->StoneInformations[0]->shape)) =='heart'){
					
						$customers[] = $resource;

					}
				}
			}

		}
		
		if(empty($customers) && empty($_POST['unitprice']))
		{
			$customers = $jsondata;
		}
		return $customers;
	}
	
	public function detail($id) {
		$data['detail_product']	= json_decode($this->getDetailProduct('/api/products/'.$id));;
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('detail_product', $data);
    }
	public function getDataFromServer($qry_str){
		$curl = curl_init($this->config->item('maisya_server').$qry_str);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result; 
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
	public function addcart($id){
		$detail	= json_decode($this->getDetailProduct('/api/products/'.$id));;
		$data = array(
        'id'      => $detail->ProductID,
        'qty'     => 1,
        'price'   => $detail->UnitPrice,
        'name'    => $detail->ProductName
        //'options' => array('Size' => 'L', 'Color' => 'Red')
		);

		$this->cart->insert($data);
		redirect("checkout");
	}

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    public function Product() {
        parent::__construct();
		$this->load->model("product_model");
    }

    public function category($cate,$type,$title='',$page=1,$unitprice='') {
		//echo $cate."===>".$type."==>".$page;
		//echo json_encode($this->getDataFromServer('/api/products/21/1/CategoryID'));
		$data['cate_prod'] 		= $cate;
		$data['type_prod'] 		= $type;
		
		//$data['parampaging']	= $page;
		
		if($cate == 'rings')
		{
			$tag 	= 'ring';	
			$title	= '<li >Rings </li><li class="active">All Rings</li>';
		}
		else if($cate == 'earrings')
		{
			$tag 	= 'earring';	
			$title	= '<li >Earrings </li><li class="active">All Earrings</li>';
		}
		else if($cate == 'bracelets')
		{
			$tag 	= 'bracelet';	
			$title	= '<li >Bracelet </li><li class="active">All Bracelet</li>';
		}
		else if($cate == 'gemstone')
		{
			$tag 	= 'gemstone';	
			$title	= '<li >Gemstone </li><li class="active">All Gemstone</li>';
		}
		else if($cate == 'engangement')
		{
			$tag 	= 'jewellery';	
			$title	= '<li >Jewellery </li><li class="active">All Jewellery</li>';
		}
		
		if($type == 'all')
		{
			$subtag = '';				
		}
		else
		{
			if($type == 'womens')
			{
				$subtag = 'women';
			}
			else if($type == 'studearrings')
			{
				$subtag = 'stud';
			}
			else
			{
				$subtag = $type;
			}
				
		}
		if($_POST['shape'])
		{
			$shape 			= implode(";",$_POST['shape']);
			$filterdesc[]	= implode(",",$_POST['shape']);
		}
		if($_POST['unitprice'])
		{
			$unitprice 		= implode(";",$_POST['unitprice']);
			$filterdesc[]	= implode(",",$_POST['unitprice']);
		}
		if($_POST['gender'])
		{
			$gender 		= implode(";",$_POST['gender']);
			$filterdesc[]	= implode(",",$_POST['gender']);
		}
		if($_POST['metal'])
		{
			$metal 			= implode(";",$_POST['metal']);
			$filterdesc[]	= implode(",",$_POST['metal']);
		}
		if($_POST['stoneshape'])
		{
			$stoneshape 	= implode(";",str_replace('RBY','RB',$_POST['stoneshape']));
			$filterdesc[]	= implode(",",$_POST['stoneshape']);
		}
		
		//$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=ring'));
		if($unitprice == '')
		{
			$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/Productid?tag='.$tag.'&subtag='.$subtag.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		else
		{
			//print_r($unitprice);
			$pos	= strpos($unitprice, ";");
			if ($pos === false) 
			{
				$price 		= explode("-",$unitprice);
				$fminprice	= str_replace("k","000",str_replace("m","000000",$price[0]));
				$fmaxPrice	= str_replace("k","000",str_replace("m","000000",$price[1]));
			}
			else
			{
				$price 		= explode(";",$unitprice);
				for($i = 0;$i <= count($price) - 1; $i++)
				{
					$newprice 	= explode("-",$price[$i]);
					$minprice[]	= str_replace("k","000",str_replace("m","000000",$newprice[0]));
					$maxPrice[]	= str_replace("k","000",str_replace("m","000000",$newprice[1]));
					
					$fminprice = implode(";",$minprice);
					$fmaxPrice = implode(";",$maxPrice);
				}
				//exit;
			}
			
			//exit;
			$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/Productid?tag='.$tag.'&subtag='.$subtag.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		$customers	= $datajson->ProductList;
		
		$data['detail_prod'] 	= $customers;
		$data['count_product'] 	= $datajson;
		$data['titlepage'] 		= $title;
		$data['category'] 		= $tag;
		$data['type'] 			= $subtag;
		$data['sortby'] 		= 'ProductId';
		
		$data['controller']		= $this; 
		$sql_f  	= implode("','",str_replace(",","','",$filterdesc));
		//print_r($filterdesc);
		//echo $sql_f;
		$sqldata	= "select nameFilter from masterfilter where kodeFilter in ('".$sql_f."')";
		//echo $sqldata;
		$rowdata	= $this->db->query($sqldata)->result_array();
		foreach($rowdata as $lsData)
		{
			$name[] = $lsData['nameFilter'];
		}
		//print_r($name);
		$data['resultfilter']	= implode(",",$name);
		$data['validatefilter']	= implode(",",$filterdesc);
		//exit;
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] 	= $totalqty;
		
		//wishlist
		$data['totalwhs']	= $this->checkWishlist($this->session->userdata('cust_username'));
		
		//masterfilter
		$data['filterprice'] = $this->product_model->getfilter('PRICE');
		$data['filtergender'] = $this->product_model->getfilter('GENDER');
		$data['filtermetal'] = $this->product_model->getfilter('METAL TYPE');
		$data['filtershape'] = $this->product_model->getfilter('SHAPE');
		$data['filterstone'] = $this->product_model->getfilter('STONE TYPE');
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
        $this->load->view('list_product', $data);
    }
	public function ajax_category($cate,$type,$page=1,$param='',$sortby='ProductID') {
		
		//echo json_encode($this->getDataFromServer('/api/products/21/1/CategoryID'));
		
		//echo "masuk".$sortby;exit;
		
		if($type == 'all'){
			$type = '';
		}
		if($_POST['shape'])
		{
			$shape 			= implode(";",$_POST['shape']);
			$filterdesc[]	= implode(",",$_POST['shape']);
		}
		if($_POST['unitprice'])
		{
			$unitprice 		= implode(";",$_POST['unitprice']);
			$filterdesc[]	= implode(",",$_POST['unitprice']);
		}
		if($_POST['gender'])
		{
			$gender 		= implode(";",$_POST['gender']);
			$filterdesc[]	= implode(",",$_POST['gender']);
		}
		if($_POST['metal'])
		{
			$metal 			= implode(";",$_POST['metal']);
			$filterdesc[]	= implode(",",$_POST['metal']);
		}
		if($_POST['stoneshape'])
		{
			$stoneshape 	= implode(";",str_replace('RBY','RB',$_POST['stoneshape']));
			$filterdesc[]	= implode(",",$_POST['stoneshape']);
		}
		
		//$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/categoryid?tag=ring'));
		if($unitprice == '')
		{
			$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/'.$sortby.'?tag='.$cate.'&subtag='.$type.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		else
		{
			//print_r($unitprice);
			$pos	= strpos($unitprice, ";");
			if ($pos === false) 
			{
				$price 		= explode("-",$unitprice);
				$fminprice	= str_replace("k","000",str_replace("m","000000",$price[0]));
				$fmaxPrice	= str_replace("k","000",str_replace("m","000000",$price[1]));
			}
			else
			{
				$price 		= explode(";",$unitprice);
				for($i = 0;$i <= count($price) - 1; $i++)
				{
					$newprice 	= explode("-",$price[$i]);
					$minprice[]	= str_replace("k","000",str_replace("m","000000",$newprice[0]));
					$maxPrice[]	= str_replace("k","000",str_replace("m","000000",$newprice[1]));
					
					$fminprice = implode(";",$minprice);
					$fmaxPrice = implode(";",$maxPrice);
				}
				//exit;
			}
			
			//exit;
			$datajson	= json_decode($this->getDataFromServer('/api/products/21/'.$page.'/'.$sortby.'?tag='.$tag.'&subtag='.$subtag.'&minPrice='.$fminprice.'&maxPrice='.$fmaxPrice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		}
		
		$customers	= $datajson->ProductList;		

		foreach($customers as $listProduct)
		{
			$html .='<div class="col-xs-12 col-md-4 col-sm-4 lst-ctl">';
				
				$html .='<div class="thumbnail thumb-detail">';
					$html .='<div class="icon-wh">';
						$html .='<a href="#" id="wishlist">';
							$html .='<i class="far fa-heart"></i>';
						$html .='</a>';
					$html .='</div>';
					$html .='<a class="liprod" href="'.base_url().'detailproduct/'.$listProduct->ProductID.'">';
					
						$html .='<img src="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem='.$listProduct->ProductID.'&width=200&height=200" alt="resized image" class="img-thumbnail image" />';
							if (file_exists('http://cl.maisya.co.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=10&height=10')) {
								$html .='<div class="overlay">
									<img src="http://cl.maisya.co.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=200&height=200" class="img-responsive">
								</div>';
							}
						
						$html .='<div class="caption">';
							$html .='<p>'.$listProduct->ProductID.'</p>';
							$html .='<p>'.$listProduct->ProductName.'</p>';
							$html .='<p class="price">';
								$html .='IDR '.number_format($listProduct->UnitPrice);
							$html .='</p>';
						$html .='</div>';
					$html .='</a>';
				$html .='</div>';
			$html .='</div>';
			
		}


			echo $html;
		exit;
    }
	public function detail($id) {
		$data['detail_product']	= json_decode($this->getDetailProduct('/api/products/'.$id));;
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		//wishlist
		$data['totalwhs']	= $this->checkWishlist($this->session->userdata('cust_username'));
        $this->load->view('detail_product', $data);
    }
	public function detaildata($id) {
		$detail_product	= json_decode($this->getDetailProduct('/api/products/'.$id));;
		return $detail_product;
    }
	public function getDataFromServer($qry_str){
		$curl = curl_init($this->config->item('maisya_server').$qry_str);
		//echo $this->config->item('maisya_server').$qry_str;
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
	
	public function savewishlist(){
		//print_r($_POST);
		if($this->session->userdata('cust_username'))
		{
			$prodid 	= $_POST['idprod'];
			$userid		= $_POST['iduser'];
			$name		= $this->detaildata($prodid)->ProductName;
			
			//echo "insert into wishlist (userid,productid,productname) values ('".$userid."','".$prodid."','".$name."')";exit;
			
			$this->db->query("insert into wishlist (userid,productid,productname) values ('".$userid."','".$prodid."','".$name."')");
			//echo "insert into wishlist (userid,productid) values ('".$userid."','".$prodid."')";
			echo $this->checkWishlist($userid);
		}
		else
		{
			echo "error";
		}
		exit;
	}
	public function checkWishlist($userid){
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$userid."' limit 1 ")->row();
		return $wh->total;
	}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

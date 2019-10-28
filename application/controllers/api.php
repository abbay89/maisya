<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {
	
	  public function Api() {
        parent::__construct();
			$this->load->model("product_model");
			$this->load->model("home_model");
			$this->load->model("checkout_model"); 
	  }
	  
	  
	  function getCincin($page){
		  
		  //echo 'test';exit;
		  $datajson	= json_decode($this->getDataFromServer('/api/products/24/'.$page.'/Productid?tag=ring&subtag=wedding&minPrice='.$fromprice.'&maxPrice='.$toprice.'&metalType='.$metal.'&gender='.$gender.'&shape='.$shape.'&stoneType='.$stoneshape));
		  echo json_encode($datajson->ProductList);exit;
		  
	  }
	  
	  
}
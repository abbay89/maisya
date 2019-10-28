<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alatbantu extends CI_Controller {

    public function Alatbantu() {
       parent::__construct();
	   $this->load->model('user_model');
		$this->load->model("checkout_model");	   
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		
		$allOrder = $this->db->query("select *  from `order` where cust_id = '".$this->session->userdata('email')."'")->result();
		
		
		
		//echo "masuk";
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['alatbantu']		= "primary";
		$data['totalRegplat']	= count($data['listprodu']);
		$data['dukungan']		= "primary";
		
		$this->load->view('alatbantu', $data);
	}
}
?>
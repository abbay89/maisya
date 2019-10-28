<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promo extends CI_Controller {

    public function Promo() {
       parent::__construct();
	   $this->load->model('user_model');
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['promo']		= "primary";
		
		$this->load->view('promo', $data);
	}
}
?>
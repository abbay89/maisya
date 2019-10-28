<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct() 
    {
		
      parent::__construct();
        // load form and url helpers
        $this->load->helper(array('form', 'url'));
         
        // load form_validation library
        $this->load->library('form_validation');
		$this->load->model('user_model');

    }

	public function index()
	{
		
		$this->load->view('login');
	}
	public function cekLogin()
	{
		$username	= $this->input->post('username');
		$password	= sha1($this->input->post('password'));
		$datauser	= $this->user_model->auth($username,$password);
		// $this->db->last_query();exit;
		//print_r($datauser);
		if($datauser){
			$dataUpd['user_lastlogin'] 	= date("Y-m-d H:i:s");
			$this->db->where('username', $datauser->Email);
			$this->db->update('platinum_member', $dataUpd);
			//echo $this->db->last_query();exit;
			//$this->session->set_userdata('email') = $datauser->user_email;
			$this->session->set_userdata('email', $datauser->Email);
			redirect("customer");
			
		}
		else{
			redirect("login/?err=1");
		}
	}	
	public function forgot(){
		//print_r($_POST);
		
		$this->sendEmail($_POST['emailforgot']);
		redirect("login?cust=forgot");
	}
	public function sendEmail($email){
		//echo __DIR__ . DIRECTORY_SEPARATOR.'../../mail_resetpassword.php';
		require __DIR__ . DIRECTORY_SEPARATOR.'../../mail_resetpassword.php';
		//echo "ddd";
		mailreminder($email, "Reset Password");
		$this->session->sess_destroy();
	}

	

}
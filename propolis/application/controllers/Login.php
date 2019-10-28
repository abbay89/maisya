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
		
		$this->load->view('frm_login');
	}
	public function cekLogin()
	{
		echo "masuk";exit;
		$username	= $this->input->post('email');
		$password	= sha1($this->input->post('password'));
		$datauser	= $this->user_model->auth($username,$password);
		// $this->db->last_query();
		//print_r($datauser);exit;
		if($datauser->status == 'new')
		{
			$dataUpd['user_lastlogin'] 	= date("Y-m-d H:i:s");
			$this->db->where('username', $datauser->username);
			$this->db->update('user', $dataUpd);
			//$this->session->set_userdata('email') = $datauser->user_email;
			$this->session->set_userdata('email', $datauser->user_id);
			$this->session->set_userdata('status','new');
			$this->session->set_userdata('id_server', $datauser->id_server);
			redirect("customer");
		}else{
			if($datauser){
				$dataUpd['user_lastlogin'] 	= date("Y-m-d H:i:s");
				$this->db->where('username', $datauser->username);
				$this->db->update('user', $dataUpd);
				//$this->session->set_userdata('email') = $datauser->user_email;
				$this->session->set_userdata('email', $datauser->user_id);
				$this->session->set_userdata('id_server', $datauser->id_server);
				redirect("customer");
			}
			else{
				redirect("login/?err=1");
			}
		}
	}	

	

}
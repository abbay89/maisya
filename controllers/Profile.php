<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function Profile() {
        parent::__construct();
		$this->load->model("profile_model");
    }

    public function index() {
		$data['profile'] = $this->profile_model->getDetailcus($this->session->userdata('cust_username'));
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('profile_page',$data);
    }
	public function loginfb() {
		$data['profile'] = $this->profile_model->getDetailcus($this->session->userdata('cust_username'));
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['msg']		=  "Please update your profile first. like Foto,Phone,Password and address. Thanks";
        $this->load->view('profile_page',$data);
    }
	public function sendtestimonial(){
		$testi['testi_desc'] 	= $this->input->get_post('testi_desc', TRUE);
		$testi['user_testi'] 	= $this->session->userdata('cust_id');
		$this->profile_model->insert_testimonial($testi);
		
		redirect("profile");
	}
	public function update()
	{
		//print_r($_POST);
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        
		$customer = Array();
		if ($this->input->get_post('newpassword', TRUE) != '') {
			$customer['cust_password'] = sha1($this->input->get_post('newpassword', TRUE));
		}

		$customer['cust_name'] 	= $this->input->get_post('fullname', TRUE);
		$customer['cust_phone'] = $this->input->get_post('phone', TRUE);
		$customer['cust_email'] = $this->input->get_post('email', TRUE);
		$customer['alamat_customer'] = $this->input->get_post('address', TRUE);
		$pic_user = $this->aksi_upload();
		$customer['pic_user'] = $pic_user;
		$this->profile_model->update_customer($customer, $this->session->userdata('cust_username'));
		//echo $this->db->last_query();
		redirect("profile");
	}
	public function aksi_upload(){
		$config['upload_path']          = './assets/uploads/foto';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('pic_profile')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
		}
		return $_FILES["pic_profile"]["name"];
	}
}

?>

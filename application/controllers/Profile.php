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
		$this->load->model("home_model");
		$this->load->model("checkout_model");
		$this->load->model("api_model");
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
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		
		$allOrder = $this->db->query("select *  from `order`
		join customer on `order`.cust_id = customer.cust_id
		where customer.cust_email = '".$this->session->userdata('cust_username')."'")->result();
		$data['detail_prod']	= $allOrder;
		
		$curl = curl_init($this->config->item('maisya_server')."/api/AlamatKirim?customer_id=".$this->session->userdata("id_server"));	
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"token: ".$this->session->userdata('token')
		));
		$result = curl_exec($curl);
		
		$data['listAddress']		= json_decode($result);
		
		//print_r($result);exit;
		
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		//echo 'testing '.$this->session->userdata('cust_username'); exit;
		
		$data['profile'] = $this->profile_model->getDetailcus($this->session->userdata('cust_username'));
		//print_r($this->session->all_userdata());
		//print_r($this->session->userdata('cust_username'));
		
		//print_r($data['profile']);
		
		//exit;
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('profile_page',$data);
    }
	public function loginfb() {
		if (!$this->session->userdata('cust_username')) {
            $this->load->view('need_login',$data);
        }
		
		//print_r($this->session->all_userdata());
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		
		//echo 'testing '.$this->session->userdata('cust_username');exit;
		
		$data['profile'] = $this->profile_model->getDetailcus($this->session->userdata('cust_username'));
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
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
		/*if ($this->input->get_post('newpassword', TRUE) != '') {
			$customer['cust_password'] = sha1($this->input->get_post('newpassword', TRUE));
		}*/
		
		
	
		if(!empty($_POST['newpassword'])){
				$tokenPass = $this->api_model->requestTokenPassword($this->session->userdata('cust_username'));
				$changePass = $this->api_model->changePassword($tokenPass,$_POST['newpassword']);
				$customer['cust_password'] = sha1($_POST['newpassword']);
		}
		
		$customer['cust_name'] 	= $this->input->get_post('fullname', TRUE);
		$customer['cust_phone'] = $this->input->get_post('phone', TRUE);
		$customer['cust_email'] = $this->input->get_post('email', TRUE);
		$customer['alamat_customer'] = $this->input->get_post('address', TRUE);
		
		//echo var_dump($customer);exit;
		
		if($_FILES["pic_profile"]["name"]){
			$pic_user = $this->aksi_upload();
		}
		$customer['pic_user'] = $pic_user;
		$this->profile_model->update_customer($customer, $this->session->userdata('cust_username'));
		//echo $this->db->last_query();
		echo "<script> alert('Berhasil Update Data !');location.href = '".base_url()."profile';</script>";
		//redirect("profile");
	}
	public function aksi_upload(){
		$config['upload_path']          = './assets/uploads/foto';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
 
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('pic_profile')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			exit;
		}else{
			$data = array('upload_data' => $this->upload->data());
		}
		return $_FILES["pic_profile"]["name"];
	}
}

?>

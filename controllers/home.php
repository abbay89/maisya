<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();
		$this->load->model("home_model");
		$this->load->model("user_model");
    }

    public function index() {
		$data['all_slide']			=	$this->home_model->get_slideshow();
		$data['all_promo']			=	$this->home_model->get_promo();
		
		$data['all_collection']		=	$this->home_model->get_collection();
		$data['testimonial1']		=	$this->home_model->get_testimonial1();
		$data['testimonial2']		=	$this->home_model->get_testimonial2();
		$data['testimonial3']		=	$this->home_model->get_testimonial3();
		
		
		
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']			=	$this->home_model->get_img('sale');
		$data['Engangement']			=	$this->home_model->get_img('Engangement');
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['defimg'] = $this->db->query("select masterimage_custo from masterimage")->row();
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		
		
		$url = "https://api.instagram.com/v1/users/4244334758/media/recent/?access_token=4244334758.adc4dde.e2ab0a71a8f2483d8f4d445707eac833";
		$dataall = json_decode($this->getInstagram($url));
		$max  = 0;
		$arrIns[]	= array();
		foreach($dataall->data as $alldata){
			//echo "<pre>";
			//print_r($alldata);
			//echo "</pre>";
			$arrIns[$max]['thumbnail']	= $alldata->images->low_resolution->url;
			$arrIns[$max]['caption']	= $alldata->caption->text;
			$arrIns[$max]['likes']		= $alldata->likes->count;
			$arrIns[$max]['comments']	= $alldata->comments->count;
			$arrIns[$max]['location']	= $alldata->location->name;
			$arrIns[$max]['link']		= $alldata->link;
			if($max >= 3){
				//echo "close";
				continue;
			}
			$max++;
		}
		//echo "<pre>";
		//print_r($alldata);
		//echo "</pre>";
		$data['all_events']			= $arrIns;
		
        $this->load->view('home', $data);
    }
	public function loginFromFB(){
		//session_start();
		//print_r($_SESSION);
		echo "masuk";
		exit;
	}
	public function getInstagram($url){
		//echo $this->config->item('maisya_server').$qry_str;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result;
	}
	public function register() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm-password]');
        $this->form_validation->set_rules('confirm-password','Repeat Password', 'trim|required');
        
		$customer = Array();
		$customer['cust_username'] = $this->input->get_post('email', TRUE);
		$customer['cust_password'] = sha1($this->input->get_post('password', TRUE));
		$customer['cust_name'] = $this->input->get_post('fullname', TRUE);
		$customer['cust_phone'] = $this->input->get_post('phone', TRUE);
		$customer['cust_email'] = $this->input->get_post('email', TRUE);
		$customer['cust_other_phone'] = $this->input->get_post('phone', TRUE);
		$customer['cust_regdate'] = date("Y-m-d H:i:s");
		
		$ca['cust_id'] = $this->user_model->insert_customer($customer);
		if ($ca['cust_id']) {
			$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
			'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
			'Congratulation! You are now registered. Please login to continue');
			$this->session->set_userdata('cust_id', $ca['cust_id']);
            $this->session->set_userdata('cust_name', $customer['cust_name']);
            $this->session->set_userdata('cust_username', $customer['cust_email']);
		}
		redirect(base_url());
    }
	public function login() {
        $username = $this->input->get_post('username', TRUE);
        $password = $this->input->get_post('password', TRUE);
        $redirect = $this->input->get_post('redirect', TRUE);
        $shapassword = sha1($password);
        $cust_id = $this->user_model->auth_customer($username, $shapassword);
        if ($cust_id) {
            $this->session->set_userdata('cust_id', $cust_id->cust_id);
            $this->session->set_userdata('cust_name', $cust_id->cust_name);
            $this->session->set_userdata('cust_username', $cust_id->cust_username);
        } else {
            if ($redirect == 'checkout') {
                $this->session->set_userdata('message','Wrong username or Password');
            } else {
                $this->session->set_flashdata('message','Wrong username or Password');
            }
        }
        $this->session->unset_userdata('redirect');
        redirect(base_url() . '/' . $redirect);
    }
	public function logout() {
        $this->session->unset_userdata('who');
        $this->session->sess_destroy();
        redirect(base_url());
    }
	public function call_istagram( $api_url ){
		$connection_c = curl_init(); // initializing
		curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
		curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
		curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
		$json_return = curl_exec( $connection_c ); // connect and get json data
		curl_close( $connection_c ); // close connection
		return json_decode( $json_return ); // decode and return
	}
	public function loginfromfb()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//fullname: fullname, email: email,phoneNumber: phoneNumber, photoURL: photoURL
		if($this->checkemail($_POST['email']) == 0)
		{
		
		
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm-password]');
			$this->form_validation->set_rules('confirm-password','Repeat Password', 'trim|required');
			
			$customer = Array();
			$customer['cust_username'] = $_POST['email'];
			$customer['cust_email'] = $_POST['email'];
			//$customer['cust_password'] = sha1(");
			$customer['cust_name'] = $_POST['fullname'];
			$customer['cust_phone'] = $_POST['phoneNumber'];
			//$customer['cust_email'] = $this->input->get_post('email', TRUE);
			$customer['cust_other_phone'] = $_POST['phoneNumber'];
			$customer['cust_regdate'] = date("Y-m-d H:i:s");
			
			$ca['cust_id'] = $this->user_model->insert_customer($customer);
			if ($ca['cust_id']) {
				$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
				'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
				'Congratulation! You are now registered. Please login to continue');
				$this->session->set_userdata('cust_id', $ca['cust_id']);
				$this->session->set_userdata('cust_name', $customer['cust_name']);
				$this->session->set_userdata('cust_username', $customer['cust_email']);
			}
		}
		else
		{
			$this->session->set_userdata('cust_id', $_POST['email']);
			$this->session->set_userdata('cust_name', $_POST['fullname']);
			$this->session->set_userdata('cust_username', $_POST['email']);
		}
		//redirect("profile/loginfb");
		echo  base_url()."profile/loginfb";
	}public function loginfromgoogle()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//fullname: fullname, email: email,phoneNumber: phoneNumber, photoURL: photoURL
		if($this->checkemail($_POST['email']) == 0)
		{
		
		
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm-password]');
			$this->form_validation->set_rules('confirm-password','Repeat Password', 'trim|required');
			
			$customer = Array();
			$customer['cust_username'] = $_POST['email'];
			$customer['cust_email'] = $_POST['email'];
			//$customer['cust_password'] = sha1(");
			$customer['cust_name'] = $_POST['fullname'];
			$customer['cust_phone'] = $_POST['phoneNumber'];
			//$customer['cust_email'] = $this->input->get_post('email', TRUE);
			$customer['cust_other_phone'] = $_POST['phoneNumber'];
			$customer['cust_regdate'] = date("Y-m-d H:i:s");
			
			$ca['cust_id'] = $this->user_model->insert_customer($customer);
			if ($ca['cust_id']) {
				$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
				'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
				'Congratulation! You are now registered. Please login to continue');
				$this->session->set_userdata('cust_id', $ca['cust_id']);
				$this->session->set_userdata('cust_name', $customer['cust_name']);
				$this->session->set_userdata('cust_username', $customer['cust_email']);
			}
		}
		else
		{
			$this->session->set_userdata('cust_id', $_POST['email']);
			$this->session->set_userdata('cust_name', $_POST['fullname']);
			$this->session->set_userdata('cust_username', $_POST['email']);
		}
		//redirect("profile/loginfb");
		echo  base_url()."profile/loginfb";
	}
	public function checkemail($email){
		$row = $this->db->query('select count(cust_name) as total from customer where cust_username = "'.$email.'"')->row();
		return $row->total;
	}
	
	public function fetchData($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$result = curl_exec($ch);
		curl_close($ch);
		print_r($result);exit;
		return $result;
	}


}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

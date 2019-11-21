<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
	
    public function Home() {
        parent::__construct();
		$this->load->model("home_model");
		$this->load->model("user_model");
		$this->load->model("checkout_model");
		/*
		$loadJS = array (
			'/assets/js/skdslider.min.js',
			'/assets/js/custom.js',
			'/assets/js/tagInput.js',
			'/assets/jq_ui/jquery-ui.min.js',
			'/assets/js/jquery.simplePagination.js',
			'/assets/js/bootstrap-datetimepicker.min.js',
			'/assets/js/slick.min.js',
			'/assets/js/jquery.elevatezoom.js');
			
		$this->loadCSS = array(
			'/assets/css/simplePagination.css',
			'/assets/css/tagInput.css',
			'/assets/css/pretty-checkbox.min.css',
			'/assets/css/slick.css',
			'/assets/css/slick-theme.css',
			'assets/css/style.css',
			'/assets/css/bootstrap-datetimepicker.min.css'
			'/assets/jq_ui/jquery-ui.css',
			'/assets/css/skdslider.css',
			'/assets/css/slider.css',
			'/assets/css/bootstrap.min.css'
		)	
			
			*/
			
		$this->loadJS = array (
			'/assets/js/skdslider.min.js',
			'/assets/js/custom.js',
			'/assets/js/tagInput.js',
			'/assets/js/slick.min.js');
			
		$this->loadCSS = array(
			
			'/assets/css/slick.css',
			'/assets/css/slick-theme.css',
			'/assets/css/skdslider.css',
			'/assets/css/slider.css',
			'/assets/css/bootstrap.min.css',
			'/assets/css/style.css'
		);	
			
    }

    public function index() {
		//print_r($this->session->all_userdata());
		$data['loadjs']				= 	$this->loadJS;
		$data['loadCss']			= 	$this->loadCSS;
		
		$data['all_slide']			=	$this->home_model->get_slideshow();
		$data['all_promo']			=	$this->home_model->get_promo();
		
		
		
		$datajson	= json_decode($this->getDataFromServer('/api/products/20/1/Productid?rating=100'));
		$datacate	= json_decode($this->getDataFromServer('/api/lookupcategories'));
		foreach($datacate as $item)
		{
			$datacateall[$item->CategoryID] = $item->CategoryName;
			
		}
		///$data['all_collection']		=	$datajson;
		//print_r($datajson->ProductList);
		$xx = 0;
		foreach ($datajson->ProductList as $ls_coll){ 
			$datacollection[$xx]['ProductID']		= $ls_coll->ProductID;
			$datacollection[$xx]['ProductName']		= $ls_coll->ProductName;
			//$datacollection[$xx]['coll_cate']	= $datacateall[$ls_coll->CategoryID];
			$datacollection[$xx]['UnitPrice']			= $ls_coll->UnitPrice;
			$datacollection[$xx]['SuggestPrice']		= $ls_coll->SuggestPrice;
			$xx++;
		}
		
		$data['all_collection']		=	$datacollection;
		
		$data['testimonial1']		=	$this->home_model->get_testimonial1();
		$data['testimonial2']		=	$this->home_model->get_testimonial2();
		$data['testimonial3']		=	$this->home_model->get_testimonial3();
		
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Jewellery brings you the most convenient way to shop for whatever you wish.Buying your favorite jewellery through Maisya jewellery official store on maisya.id";
		$data['keyword_page']		=   "diamond,ring,earring,online shop,rudy,jewellery,bracelet";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogdesc_page']		= 	"Maisya Jewellery brings you the most convenient way to shop for whatever you wish.Buying your favorite jewellery through Maisya jewellery official store on maisya.id";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
		$data['style']			= '';
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['defimg'] = $this->db->query("select masterimage_custo from masterimage")->row();
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		
		
		$url = "https://api.instagram.com/v1/users/4244334758/media/recent/?access_token=4244334758.bffe4dd.d064784757a24a859512059d3fbee651";
		$dataall = json_decode($this->getInstagram($url));
		//echo 'test '.$dataall;exit;
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
			$arrIns[$max]['location']	= isset($alldata->location->name) ? $alldata->location->name : '';
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
		
		$send_reg = $this->regtoserver($this->input->get_post('email', TRUE),$this->input->get_post('password', TRUE),$this->input->get_post('fullname', TRUE),$this->input->get_post('phone', TRUE));
		if($send_reg->status != 204){
        
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
		else
		{
			echo "<script> alert('".$send_reg->message."');location.href = '".base_url()."';</script>";
		}
		//
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
	public function regtoserver($Email,$Password,$Namalengkap,$MobileNumber){
		
		$post_data="Email=".$Email."&Password=".$Password."&Namalengkap=".$Namalengkap."&MobileNumber=".$MobileNumber;
		
		$url="https://www.maisya.id:5060/api/RegisterUser";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = curl_exec($ch);
		
		
		//print_r($result);exit;
		$status	= json_decode($result);
		
		return $status;
		exit;
	}
	
	public function igData(){
		
		$post_data="client_id=bffe4dda483c4dc19b928f55dd1d4361&client_secret=5df347821d4c4fe2b6d1d5d9066384f3&grant_type=authorization_code&redirect_uri=https://www.maisya.id&code=c242f02222ea47868365cdb3512ed44e";
		
		$url="https://api.instagram.com/oauth/access_token";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = curl_exec($ch);
		
		
		print_r($result);exit;
		echo json_decode($result);
		
		
		exit;
	}
	
	public function login() {
        $username = $this->input->get_post('username', TRUE);
        $password = $this->input->get_post('password', TRUE);
        $redirect = $this->input->get_post('redirect', TRUE);
	
		
        $shapassword = sha1($password);
		$send_toserver = $this->logtoserver($username,$password);
		$get_customer = $this->getCustomer($send_toserver->id);
		/* print_r($send_toserver);
		exit;
		 */
		if($send_toserver->status == 200){
			$cust_id = $this->user_model->auth_customer($username, $password);
			
			if(!empty($cust_id)){
				if ($cust_id) {
					
					$this->session->set_userdata('cust_id', $cust_id->cust_id);
					$this->session->set_userdata('cust_name', $cust_id->cust_name);
					$this->session->set_userdata('cust_username', $cust_id->cust_username);
					$this->session->set_userdata('token', $send_toserver->data->Token);
					$this->session->set_userdata('id_server', $send_toserver->id);
					$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$cust_id->cust_id."'");
				} else {
					if ($redirect == 'checkout') {
						echo "<script> alert('Wrong username or Password');location.href = '".base_url()."';</script>";
					} else {
						echo "<script> alert('Wrong username or Password');location.href = '".base_url()."';</script>";
					}
				}
			}
			else{
				$customer = Array();
				$customer['cust_username'] 	= $username;
				$customer['cust_email'] 	= $username;
				$customer['cust_name'] 		= substr($username,0,5);
				$customer['cust_password'] 	= sha1($password);
				$customer['cust_regdate'] 	= date("Y-m-d H:i:s");
				
				$ca['cust_id'] = $this->user_model->insert_customer($customer);
				
				if ($ca['cust_id']) {
					$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
					'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
					'Congratulation! You are now registered. Please login to continue');
					$this->session->set_userdata('cust_id', $ca['cust_id']);
					$this->session->set_userdata('cust_name', $customer['cust_name']);
					$this->session->set_userdata('cust_username', $customer['cust_username']);
					$this->session->set_userdata('token', $send_toserver->data->Token);
					$this->session->set_userdata('id_server', $send_toserver->id);
					$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$ca['cust_id']."'");
				}
			}
			
			//echo "gagal";
			$this->session->unset_userdata('redirect');
			redirect(base_url() . $redirect);
		}
		else{
			echo "<script> alert('".$send_toserver->message."');location.href = '".base_url()."';</script>";
		
			exit;
		}
    }
	
	public function getCustomer($id){
		
		$url="https://www.maisya.id:5060/api/Customer/".$id;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		$data = json_decode($result);
		
		$dataUser['cust_username'] = $data->email;
		$dataUser['cust_name'] = $data->Nama;
		$dataUser['cust_phone'] = $data->NoTelp;
		$dataUser['cust_email'] = $data->email;
		$this->home_model->updateDataCustomer($dataUser);
		
		//echo $data->Nama;exit;
		//echo var_dump($data);exit;
		return $data;
		
		
	}

	
	public function logtoserver($Email,$Password){
		//echo $Email.",".$Password;exit;
		$post_data="Email=".$Email."&Password=".$Password;
		
		$url="https://www.maisya.id:5060/api/Login";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);

		$status	= json_decode($result);
		
		return $status;
		exit;
	}
	public function getCustLog(){
		//echo $Email.",".$Password;exit;
		$url="https://www.maisya.id:5060/api/Customer";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		$data = json_decode($result);
		$i = 1;
		foreach($data as $key){
			
			if($key->email != ""){
				echo "<pre>";
			print_r($key);
			echo "</pre>";
			//exit; 
				$this->db->query("update customer set cust_name='".$key->Nama."',cust_email='".$key->email."',cust_phone='".$key->NoTelp."' where cust_username = '".$key->email."'");
				echo $i.". ".$key->email."=>".$key->Nama."=>".$key->Alamat."<br />";
				$i++;
			}
			//exit;
		}
		exit;
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
	public function validatelogingoogle(){
		//print_r($_GET);
		/* Google App Client Id */
		define('CLIENT_ID', '199030119534-c5ucg8tqi67b27ibhb1lhd87i2dsn6bi.apps.googleusercontent.com');
		/* Google App Client Secret */
		define('CLIENT_SECRET', 'i28Vwu3PWesNNyaTBJ7gkscE');
		/* Google App Redirect Url */
		define('CLIENT_REDIRECT_URL', 'https://www.maisya.id/home/validatelogingoogle');
		if(isset($_GET['code'])) {
			try {
				// Get the access token 
				$data = $this->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

				// Access Tokem
				$access_token = $data['access_token'];
				
				
				// Get user information
				$user_info = $this->GetUserProfileInfo($access_token);
				$data  = $this->db->query("select * from customer where cust_email = '".$user_info['email']."'")->row();
				//echo "select * from customer where cust_email = '".$_POST['email']."'";
				//print_r($data);
				//exit;
				
				if(empty($data))
				{
					
					$send_reg = $this->regtoserver($user_info['email'],"password123",$user_info['name'],'123123');
					//print_r($send_reg);exit;
					if($send_reg->status != 204){
					
						$customer = Array();
						$customer['cust_username'] = $user_info['email'];
						$customer['cust_email'] = $user_info['email'];
						$customer['cust_password'] = sha1("password123");
						$customer['real_cust_password'] = "password123";
						$customer['cust_name'] = $user_info['name'];
						//$customer['cust_email'] = $this->input->get_post('email', TRUE);
						//$customer['cust_other_phone'] = $_POST['phoneNumber'];
						$customer['cust_regdate'] = date("Y-m-d H:i:s");
						$customer['device'] = "R. Gmail";
						
						$ca['cust_id'] = $this->user_model->insert_customer($customer);
						if ($ca['cust_id']) {
							$send_toserver = $this->logtoserver($this->input->get_post('email', TRUE),"password123");
							
							$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
							'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
							'Congratulation! You are now registered. Please login to continue');
							$this->session->set_userdata('cust_id', $ca['cust_id']);
							$this->session->set_userdata('cust_name', $customer['cust_name']);
							$this->session->set_userdata('cust_username', $customer['cust_email']);
							
							$this->session->set_userdata('token', $send_toserver->data->Token);
							$this->session->set_userdata('id_server', $send_toserver->id);
							$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$ca['cust_id']."'");
						}
						redirect("profile/loginfb");
					}
					else
					{
						$customer = Array();
						$customer['cust_username'] = $user_info['email'];
						$customer['cust_email'] = $user_info['email'];
						$customer['cust_password'] = sha1("password123");
						$customer['real_cust_password'] = "password123";
						$customer['cust_name'] = $user_info['name'];
						//$customer['cust_email'] = $this->input->get_post('email', TRUE);
						//$customer['cust_other_phone'] = $_POST['phoneNumber'];
						$customer['cust_regdate'] = date("Y-m-d H:i:s");
						$customer['device'] = "R. Google";
						
						$ca['cust_id'] = $this->user_model->insert_customer($customer);
						
						$send_toserver = $this->logtoserver($user_info['email'],"password123");
						
						
						$this->session->set_userdata('cust_id', $user_info['email']);
						$this->session->set_userdata('cust_name', $user_info['name']);
						$this->session->set_userdata('cust_username', $user_info['email']);
						
						$this->session->set_userdata('token', $send_toserver->data->Token);
						$this->session->set_userdata('id_server', $send_toserver->id);
						$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$user_info['email']."'");
						redirect("profile/loginfb");
					}
				}
				else
				{
					//
					$send_toserver = $this->logtoserver($data->cust_username,$data->real_cust_password);
					
					if($send_toserver->status == 200){
						//print_r($data);exit;
						$this->session->set_userdata('cust_id', $data->cust_id);
						$this->session->set_userdata('cust_name', $data->cust_name);
						$this->session->set_userdata('cust_username', $data->cust_username);
						$this->session->set_userdata('token', $send_toserver->data->Token);
						$this->session->set_userdata('id_server', $send_toserver->id);
						$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$data->cust_id."'");
						
					//	print_r($this->session->all_userdata());exit;
						redirect("profile/loginfb");
					}else{
						echo "<script> alert('Login Gmail Gagal, Email sudah terdaftar. Silahkan Reset Password Anda');location.href = '".base_url()."';</script>";
					}
				}
				
			}
			catch(Exception $e) {
				
				echo "<script> alert('".$e->getMessage()."');location.href = '".base_url()."';</script>";
				exit();
			}
		}
	}
	public function GetUserProfileInfo($access_token) {	
		$url = 'https://www.googleapis.com/oauth2/v2/userinfo?fields=name,email,gender,id,picture,verified_email';	
		
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to get user information');
			
		return $data;
	}
	public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
		$url = 'https://www.googleapis.com/oauth2/v4/token';			

		$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
		//echo $curlPost;
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);		
		$data = json_decode(curl_exec($ch), true);
		//print_r($data);exit;
		
		
		
		return $data;
	}
	public function validateloginfb(){
		session_start();
		//print_r($_SESSION);
		$data  = $this->db->query("select * from customer where cust_email = '".$_SESSION['EMAIL']."'")->row();
		//echo "select * from customer where cust_email = '".$_POST['email']."'";
		//print_r($data);
		//exit;
		
		if(empty($data))
		{
			
			$send_reg = $this->regtoserver($_SESSION['EMAIL'],"password123",$_SESSION['FULLNAME'],'123123');
			//print_r($send_reg);exit;
			if($send_reg->status != 204){
			
				$customer = Array();
				$customer['cust_username'] = $_SESSION['EMAIL'];
				$customer['cust_email'] = $_SESSION['EMAIL'];
				$customer['cust_password'] = sha1("password123");
				$customer['real_cust_password'] = "password123";
				$customer['cust_name'] = $_SESSION['FULLNAME'];
				//$customer['cust_email'] = $this->input->get_post('email', TRUE);
				//$customer['cust_other_phone'] = $_POST['phoneNumber'];
				$customer['cust_regdate'] = date("Y-m-d H:i:s");
				$customer['device'] = "R. Facebook";
				
				$ca['cust_id'] = $this->user_model->insert_customer($customer);
				if ($ca['cust_id']) {
					
					$send_toserver = $this->logtoserver($_SESSION['EMAIL'],"password123");
					
					$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
					'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
					'Congratulation! You are now registered. Please login to continue');
					$this->session->set_userdata('cust_id', $ca['cust_id']);
					$this->session->set_userdata('cust_name', $customer['cust_name']);
					$this->session->set_userdata('cust_username', $customer['cust_email']);
					
					$this->session->set_userdata('token', $send_toserver->data->Token);
					$this->session->set_userdata('id_server', $send_toserver->id);
					$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$ca['cust_id']."'");
				}
				redirect("profile/loginfb");
			}
			else
			{
				$customer = Array();
				$customer['cust_username'] = $_SESSION['EMAIL'];
				$customer['cust_email'] = $_SESSION['EMAIL'];
				$customer['cust_password'] = sha1("password123");
				$customer['real_cust_password'] = "password123";
				$customer['cust_name'] = $_SESSION['FULLNAME'];
				//$customer['cust_email'] = $this->input->get_post('email', TRUE);
				//$customer['cust_other_phone'] = $_POST['phoneNumber'];
				$customer['cust_regdate'] = date("Y-m-d H:i:s");
				$customer['device'] = "R. Facebook";
				
				$ca['cust_id'] = $this->user_model->insert_customer($customer);
				
				$send_toserver = $this->logtoserver($_SESSION['EMAIL'],"password123");
				
				
				$this->session->set_userdata('cust_id', $_SESSION['EMAIL']);
				$this->session->set_userdata('cust_name', $_SESSION['FULLNAME']);
				$this->session->set_userdata('cust_username', $_SESSION['EMAIL']);
				
				$this->session->set_userdata('token', $send_toserver->data->Token);
				$this->session->set_userdata('id_server', $send_toserver->id);
				$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$_SESSION['EMAIL']."'");
				
				redirect("profile/loginfb");
			}
		}
		else
		{
			//
			$send_toserver = $this->logtoserver($data->cust_username,$data->real_cust_password);
			//print_r($send_toserver);exit;
			if($send_toserver->status == 200){
				//print_r($data);exit;
				$this->session->set_userdata('cust_id', $data->cust_id);
				$this->session->set_userdata('cust_name', $data->cust_name);
				$this->session->set_userdata('cust_username', $data->cust_username);
				$this->session->set_userdata('token', $send_toserver->data->Token);
				$this->session->set_userdata('id_server', $send_toserver->id);
				$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$data->cust_id."'");
				redirect("profile/loginfb");
			//	print_r($this->session->all_userdata());exit;
			}else{
				echo "<script> alert('Login Facebook Gagal, Email sudah terdaftar. Silahkan Reset Password Anda');location.href = '".base_url()."';</script>";
			}
		}
		
		//echo  base_url()."profile/loginfb";
	}
	public function loginfromfb()
	{
		$data  = $this->db->query("select * from customer where cust_email = '".$_POST['email']."'")->row();
		//echo "select * from customer where cust_email = '".$_POST['email']."'";
		//print_r($data);
		//exit;
		
		if(empty($data))
		{
			
			$send_reg = $this->regtoserver($_POST['email'],"password123",$_POST['fullname'],'123123');
			
			if($send_reg->status != 204){
			
				$customer = Array();
				$customer['cust_username'] = $_POST['email'];
				$customer['cust_email'] = $_POST['email'];
				$customer['cust_password'] = sha1("password123");
				$customer['real_cust_password'] = "password123";
				$customer['cust_name'] = $_POST['fullname'];
				$customer['cust_phone'] = $_POST['phoneNumber'];
				//$customer['cust_email'] = $this->input->get_post('email', TRUE);
				$customer['cust_other_phone'] = $_POST['phoneNumber'];
				$customer['cust_regdate'] = date("Y-m-d H:i:s");
				
				$ca['cust_id'] = $this->user_model->insert_customer($customer);
				if ($ca['cust_id']) {
					$send_toserver = $this->logtoserver($this->input->get_post('email', TRUE),"password123");
					
					$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
					'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
					'Congratulation! You are now registered. Please login to continue');
					$this->session->set_userdata('cust_id', $ca['cust_id']);
					$this->session->set_userdata('cust_name', $customer['cust_name']);
					$this->session->set_userdata('cust_username', $customer['cust_email']);
					
					$this->session->set_userdata('token', $send_toserver->data->Token);
					$this->session->set_userdata('id_server', $send_toserver->id);
					$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$ca['cust_id']."'");
				}
			}
			else
			{
				$send_toserver = $this->logtoserver($_POST['email'],"password123");
				
				
				$this->session->set_userdata('cust_id', $_POST['email']);
				$this->session->set_userdata('cust_name', $_POST['fullname']);
				$this->session->set_userdata('cust_username', $_POST['email']);
				
				$this->session->set_userdata('token', $send_toserver->data->Token);
					$this->session->set_userdata('id_server', $send_toserver->id);
					$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$_POST['email']."'");
			}
		}
		else
		{
			//
			$send_toserver = $this->logtoserver($data->cust_username,$data->real_cust_password);
			//print_r($send_toserver);
			$this->session->set_userdata('cust_id', $data->cust_id);
			$this->session->set_userdata('cust_name', $data->cust_name);
			$this->session->set_userdata('cust_username', $data->email);
			$this->session->set_userdata('token', $send_toserver->data->Token);
			$this->session->set_userdata('id_server', $send_toserver->id);
			$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$data->cust_id."'");
		}
		//redirect("profile/loginfb");
		echo  base_url()."profile/loginfb";
	}
	public function loginfromgoogle()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//fullname: fullname, email: email,phoneNumber: phoneNumber, photoURL: photoURL
		
		$data  = $this->db->query("select * from customer where cust_email = '".$_POST['email']."'")->row();
	
		if(empty($data))
		{
			
			$send_reg = $this->regtoserver($_POST['email'],"password123",$_POST['fullname'],'123123');
			
			//print_r($send_reg);exit;
			
			if($send_reg->status != 204){
			
				$customer = Array();
				$customer['cust_username'] 		= $_POST['email'];
				$customer['cust_email'] 		= $_POST['email'];
				$customer['cust_password'] 		= sha1("password123");
				$customer['real_cust_password'] = "password123";
				$customer['cust_name'] 			= $_POST['fullname'];
				$customer['cust_phone'] 		= $_POST['phoneNumber'];
				//$customer['cust_email'] = $this->input->get_post('email', TRUE);
				$customer['cust_other_phone'] = $_POST['phoneNumber'];
				$customer['cust_regdate'] = date("Y-m-d H:i:s");
				
				$ca['cust_id'] = $this->user_model->insert_customer($customer);
				if ($ca['cust_id']) {
					$send_toserver = $this->logtoserver($this->input->get_post('email', TRUE),"password123");
					
					$this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
					'Selamat! Registrasi berhasil. Silakan login untuk melanjutkan' :
					'Congratulation! You are now registered. Please login to continue');
					$this->session->set_userdata('cust_id', $ca['cust_id']);
					$this->session->set_userdata('cust_name', $customer['cust_name']);
					$this->session->set_userdata('cust_username', $customer['cust_email']);
					
					$this->session->set_userdata('token', $send_toserver->data->Token);
					$this->session->set_userdata('id_server', $send_toserver->id);
					$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$ca['cust_id']."'");
				}
			}
			else
			{
				$send_toserver = $this->logtoserver($this->input->get_post('email', TRUE),"password123");
				$this->session->set_userdata('cust_id', $_POST['email']);
				$this->session->set_userdata('cust_name', $_POST['fullname']);
				$this->session->set_userdata('cust_username', $_POST['email']);
				$this->session->set_userdata('token', $send_toserver->data->Token);
				$this->session->set_userdata('id_server', $send_toserver->id);
				$this->db->query("update customer set cust_lastlogin = '".date("Y-m-d H:i:s")."' where cust_id = '".$_POST['email']."'");
			}
		}
		else
		{
			$send_toserver = $this->logtoserver($this->input->get_post('email', TRUE),$data['real_cust_password']);
			$this->session->set_userdata('cust_id', $_POST['email']);
			$this->session->set_userdata('cust_name', $_POST['fullname']);
			$this->session->set_userdata('cust_username', $_POST['email']);
			$this->session->set_userdata('token', $send_toserver->data->Token);
				$this->session->set_userdata('id_server', $send_toserver->id);
		}
		//redirect("profile/loginfb");
		echo  base_url()."profile/loginfb";
	}
	public function checkemail($email){
		$row = $this->db->query('select * as total from customer where cust_username = "'.$email.'"')->row();
		
		return $row;
	}
	
	public function fetchData($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		print_r($result);exit;
		return $result;
	}

	public function forgot(){
		//print_r($_POST);
		echo "<script> alert('Password telah di reset, silahkan check email anda');location.href = '".base_url()."';</script>";
		$this->sendEmail($_POST['emailforgot']);
	
		
		//redirect("home?cust=forgot");
	}
	public function resetpassword(){
		//$email = $_REQUEST
	}
	public function sendEmail($email){
		require __DIR__ . DIRECTORY_SEPARATOR.'../../mail_resetpassword.php';

		mailreminder($email, "Reset Password");
		$this->session->sess_destroy();
	}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

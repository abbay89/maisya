<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Afiliasi extends CI_Controller {

    public function Afiliasi() {
       parent::__construct();
	   $this->load->model('user_model');
		//$this->load->model("checkout_model");	   
	   if(!$this->session->userdata('email')){
		   redirect("login");
	   }
    }
	public function index() {
		$data['listprodu'] = json_decode($this->getDataFromServer('http://maisya.id:6070/api/itemcodes'));
		//echo "masuk";
		$data['userProfile']	= $this->user_model->userInformation($this->session->userdata('email'))	;
		
		$data['profilename']	= $data['userProfile']->first_name." ".$data['userProfile']->last_name;
		$data['idserver']		= $data['userProfile']->id_server;
		$data['open_child'] 	= 'openchild';
		$data['afiliasi'] 		= 'class="primary"';
		
		$this->load->view('afiliasi', $data);
	}
	public function getDataFromServer($url){
		//echo $url;
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
		$result = curl_exec($curl);
		return $result;
		
	}
	public function send_email(){
		$this->sendEmail($_POST['email_afilia'],$_POST['link']);
	}
	public function sendEmail($email,$link){
		require __DIR__ . DIRECTORY_SEPARATOR.'../../email_afiliasi.php';

		mailreminder($email, $link);
		
	}
}
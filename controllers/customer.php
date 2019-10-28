<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function Customer() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        if ($this->session->userdata('cust_id') == '') {
            redirect(base_url());
            die();
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data['customer'] = $this->user_model->get_customer($this->session->userdata('cust_id'));
        $data['list_phone_number'] = $this->user_model->get_customer_phones($this->session->userdata('cust_id'));
        $data['list_address'] = $this->user_model->get_list_address($this->session->userdata('cust_id'));
        $data['list_history'] = $this->user_model->get_history_order($this->session->userdata('cust_id'));
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['footer']			= $footer;
        $this->load->view('customer', $data);
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('confirm-password', $this->session->userdata('language') != 'en' ? 'Ulangi Kata Sandi' : 'Repeat Password', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $data['customer'] = $this->user_model->get_customer($this->session->userdata('cust_id'));
            $data['list_address'] = $this->user_model->get_list_address($this->session->userdata('cust_id'));
            $data['list_phone_number'] = $this->user_model->get_customer_phones($this->session->userdata('cust_id'));
            $data['list_history'] = $this->user_model->get_history_order($this->session->userdata('cust_id'));
            $this->load->view('customer', $data);
        } else {
            $customer = Array();
            if ($this->input->get_post('password', TRUE) != '') {
                $customer['cust_password'] = sha1($this->input->get_post('password', TRUE));
            }

            $customer['cust_name'] = $this->input->get_post('name', TRUE);
//            $customer['cust_phone'] = $this->input->get_post('phone', TRUE);
            $total_pn = $this->input->get_post('total_pn', true);
            if ($total_pn > 0) {
                for ($i = 0; $i < $total_pn; $i++) {
                    $phone_number = $this->input->get_post('phone_' . $i, true);
                    $phone_id = $this->input->get_post('phone_id_' . $i, true);
                    if ($phone_id) {
                        $this->user_model->update_customer_phone($phone_id, $phone_number);
                    } else {
                        $phone_id = $this->user_model->insert_customer_phone(
                                $this->session->userdata('cust_id'), $phone_number);
                    }
                    if ($this->input->get_post('telp_default', true) == $i) {
                        $customer['cust_phone'] = $phone_number;
                        $this->user_model->set_primary_customer_phone($this->session->userdata('cust_id'), $phone_id);
                    }
                }
            }
            $this->user_model->update_customer($customer, $this->session->userdata('cust_id'));

            redirect(base_url() . 'customer');
        }
    }

    public function delete_phone() {
        $phone_id = $this->input->get_post('phone_id', true);
        $this->user_model->delete_customer_phone($phone_id);
        echo json_encode('00');
    }

    public function add_address($cust_ad_id, $from_checkout = 0) {
        if ($from_checkout == 1) {
            $this->session->set_userdata('from_checkout', 1);
        }
        $this->customer_address($cust_ad_id);
    }

    public function edit_address($cust_ad_id) {
        $this->customer_address($cust_ad_id, true);
    }

    public function customer_address($cust_ad_id, $edit = false) {
        if ($edit) {
            $data['cust_address'] = $this->user_model->get_customer_address($cust_ad_id, $this->session->userdata('cust_id'));
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('city', $this->session->userdata('language') != 'en' ? 'Kota' : 'City', 'trim|required');
        $this->form_validation->set_rules('address', $this->session->userdata('language') != 'en' ? 'Alamat' : 'Address', 'trim|required');
        $this->form_validation->set_rules('address_name', $this->session->userdata('language') != 'en' ? 'Nama Alamat' : 'Address Name', 'trim|required');
        $this->form_validation->set_rules('address_type', $this->session->userdata('language') != 'en' ? 'Tipe Alamat' : 'Address Type', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['cities'] = $this->user_model->get_list_city();
            $data['a_types'] = $this->user_model->get_list_address_type();
            $data['cust_ad_id'] = $cust_ad_id;
            if ($edit) {
                if (!$data['cust_address']) {
                    redirect(base_url());
                    die();
                }
                $data['ca'] = $this->user_model->get_customer_address($cust_ad_id);
                $data['edit'] = true;
            } else {
                $data['edit'] = false;
            }
            $this->load->view('new_address', $data);
        } else {
            $ca['cust_id'] = $this->session->userdata('cust_id');
            $ca['cust_ad_address'] = $this->input->get_post('address', TRUE);
            $ca['cust_ad_title'] = $this->input->get_post('address_name', TRUE);
            $ca['at_id'] = $this->input->get_post('address_type', TRUE);
            $ca['city_id'] = $this->input->get_post('city', TRUE);
            if ($edit) {
                $this->user_model->update_customer_address($ca, $cust_ad_id);
                $this->session->set_userdata('cust_ad_id', $cust_ad_id);
                redirect(base_url() . 'checkout/confirm');
            } else {
                $id = $this->user_model->insert_customer_address($ca);
                if ($this->session->userdata('from_checkout') == 1) {
                    $this->session->set_userdata('cust_ad_id', $id);
                    redirect(base_url() . 'checkout/confirm');
                    die();
                }
            $this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
                            'Alamat anda telah ditambahkan' :
                            'Your address has been added');
            $this->session->set_flashdata('message_type', 'good');
                redirect(base_url() . 'customer');
            }
        }
    }

    public function order_detail($order_id) {
        $this->load->model('menu_model');
        $data['order'] = $this->menu_model->get_order($order_id);
        $data['list_od'] = $this->menu_model->get_order_details($order_id);
        $data['history'] = true;
        if ($data['order'])
            $this->load->view('checkout/step3', $data);
        else
            redirect(base_url());
    }

    public function reserv_detail($reserv_id) {
        $this->load->model('menu_model');
        $data['order'] = $this->menu_model->get_order($order_id);
        $data['list_od'] = $this->menu_model->get_order_details($order_id);
        $data['history'] = true;
        if ($data['order'])
            $this->load->view('checkout/step3', $data);
        else
            redirect(base_url());
    }

    public function forgot() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forgot');
        } else {
            $email = $this->input->post('email', true);
            $cust = $this->user_model->check_email_customer($email);
            if ($cust) {
            	$to_email = $cust->cust_email;
                $url = $this->generate_url_forgot($cust->cust_id, $cust->cust_email, $cust->cust_username);
                $message = 'Silahkan gunakan link berikut untuk mereset password anda : '.$url;
                $this->sent_email($to_email, 'Reset Password Hokben', $message);
                $this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
                                'Link untuk reset password akan dikirimkan ke email anda.' :
                                'Link for resetting your password already sent to your email.');
                $this->session->set_flashdata('message_type', 'good');
            } else {
                $this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
                                'Maaf, kami tidak dapat menemukan email anda.' :
                                'Sorry we cannot found your email');
                $this->session->set_flashdata('message_type', 'error');
            }
            redirect(base_url() . 'customer/forgot');
        }
    }

    public function generate_url_forgot($cust_id, $cust_email, $cust_username) {
        $cust_id = base64_encode(base64_encode($cust_id . "data-id"));
        $cust_email = base64_encode($cust_email . "an-email");
        $cust_username = base64_encode(base64_encode(base64_encode($cust_username . "a-username")));
        $url = base_url() . 'customer/change_password/' . $cust_id . '/' . $cust_email . '/' . $cust_username;
        return $url;
    }

    public function change_password($cust_id, $cust_email, $cust_username) {
        $cust_id = base64_decode(base64_decode($cust_id));
        $temp1 = explode("data-id", $cust_id);
        $encoded_cust_id = $temp1[0];
        $cust_email = base64_decode($cust_email);
        $temp2 = explode("an-email", $cust_email);
        $encoded_email = $temp2[0];
        $to_email = $temp2[0];
        $cust_username = base64_decode(base64_decode(base64_decode($cust_username)));
        $temp3 = explode("a-username", $cust_username);
        $encoded_username = $temp3[0];
		

        if ($this->user_model->check_customer($encoded_cust_id, $encoded_username, $encoded_email)) {
            $new_password = $this->randomPassword();
            $this->user_model->update_customer_password($encoded_cust_id, $new_password);
            $this->sent_email($to_email, 'Password Baru Hokben', 'Berikut password baru anda : ' . $new_password);
            $this->session->set_flashdata('message', $this->session->userdata('language') != 'en' ?
                            'Password baru anda akan dikirimkan melalui email.' :
                            'New Password already sent to your email');
            $this->session->set_flashdata('message_type', 'good');
            redirect(base_url() . 'customer/forgot');
        }
    }

    private function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

	
    private function sent_email($to_email, $subject, $message) {		
		$this->db->query(
			"insert into log_forgot_password 
			(
				subject,
				emailto,
				msg,
				createdate,
				device
			)
			values
			(
				'".$subject."',
				'".$to_email."',
				'".htmlentities($message)."',
				'".date("Y-m-d")."',
				'Website'
			)");
			
			//echo $this->db->last_query();
		//	exit;
	}
	/*
	private function sent_email($to_email, $subject, $message) {

        $config['protocol']  = 'smtps';
        $config['smtp_host'] = 'mail.hokben.co.id';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'no-reply@hokben.co.id';
        $config['smtp_pass'] = 'T4r0h4n4k0';
		
        $this->load->library('email', $config);

        $this->email->from('no-reply@hokben.co.id', 'no-reply');
        $this->email->to($to_email);
        $this->email->subject("Forgot Password");
        $this->email->message('sdsdds');
		if ( ! $this->email->send())
		{
				echo "error";
				echo  $this->email->print_debugger();
				exit;// Generate error
		}
		else
		{
			echo  $this->email->print_debugger();
			exit;
		}
        //$this->email->send();


    }
	*/
}

?>
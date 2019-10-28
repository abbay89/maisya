<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

    public function Konfirmasi() {
        parent::__construct();
		$this->load->model("konfirmasi_model");
		$this->load->model("home_model");
    }

    public function formconfirm($invoiceid) {
		$data['title_page']			= 	"Maisya Jewellery Online Shop";
		$data['description_page']	=   "Maisya Online Jewellery Portal in Indonesia";
		$data['keyword_page']		=   "maisya,jewellery,maisya jewellery,indonesia,rudy";
		$data['ogtitle_page']		= 	"Maisya Jewellery Online Shop";
		$data['ogtimg_page']		= 	base_url()."assets/img/logo.png";
		$data['img_page']			= 	base_url()."assets/img/logo.png";
		
		$data['banner_top'] 	= $this->home_model->get_banner('top');
		$data['banner_bottom'] 	= $this->home_model->get_banner('bottom');
		$data['chart'] = $this->cart->contents();
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['totalqty'] = $this->checkout_model->get_count_cart();
		
		
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['idinvoice']		= $invoiceid;
		$data['footer']			= $footer;
		$data['Rings']				=	$this->home_model->get_img('Rings');
		$data['Earrings']			=	$this->home_model->get_img('Earrings');
		$data['Gemstone']			=	$this->home_model->get_img('Gemstone');
		$data['Jewellery']			=	$this->home_model->get_img('Jewellery');
		$data['Bracelets']			=	$this->home_model->get_img('Bracelets');
		$data['sale']				=	$this->home_model->get_img('sale');
		$data['Engangement']		=	$this->home_model->get_img('Engangement');
        $this->load->view('confirmation_page',$data);
    }
	public function remove($id){
		$this->db->query("delete  from wishlist where userid = '".$this->session->userdata('cust_username')."' and productid = '".$id."'");
		redirect("wishlist");
	}
	public function save(){
		//print_r($_POST);
		$konf['frombank']  		= $this->input->get_post('frombank', TRUE);
		$konf['tobank']  		= $this->input->get_post('tobank', TRUE);
		$konf['rekname'] 		= $this->input->get_post('rekname', TRUE);
		$konf['rekno'] 			= $this->input->get_post('rekno', TRUE);
		$konf['invoiceid'] 		= $this->input->get_post('invoiceid', TRUE);
		$konf['konfirmasidate'] = $this->input->get_post('konfirmasidate', TRUE);
		$konf['createdate'] 	= date("Y-m-d");
		
		$confirmid = $this->konfirmasi_model->insert_order($konf);
		$this->konfirmasi_model->update_order($confirmid,$konf['invoiceid']);
		redirect('orderstatus');
	}
	
}

?>

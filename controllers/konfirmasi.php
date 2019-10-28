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
    }

    public function formconfirm($invoiceid) {
		$data['chart'] = $this->cart->contents();
		
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
		$data['totalqty'] = $totalqty;
		
		
		
		$footer 				= $this->db->query("select * from company_profile")->result();
		$data['idinvoice']		= $invoiceid;
		$data['footer']			= $footer;
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

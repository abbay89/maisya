<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staticpage extends CI_Controller {

    public function Staticpage() {
        parent::__construct();
		
    }

    public function page($pagetitle) {
		foreach($this->cart->contents() as $allcart){
			$totalqty += $allcart['qty'];
		}
		$getData				= $this->db->query("select * from static_page where static_loc ='".$pagetitle."'")->row();
		$footer 				= $this->db->query("select * from company_profile")->result();
	
		$data['footer']			= $footer;
		$data['titlepage']		= $getData->text_loc;
		$data['urlpage']		= $getData->static_loc;
		$data['contentpage']	= $getData->static_desc;
		$data['totalqty'] = $totalqty;
		$wh = $this->db->query("select count(wishlistid) as total from wishlist where userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
		
		$data['totalwhs']	=  $wh->total;
        $this->load->view('static_page/all_content',$data);
		
    }
}

?>

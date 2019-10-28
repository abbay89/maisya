<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {

    public function Order() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url().'admin');
            die();
        }
        $this->load->library('grocery_CRUD');
    }
    
    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('order');
            $crud->set_subject('Order');
            $crud->set_relation('cust_id', 'customer', 'cust_name');
            $crud->unset_edit();  
            $crud->display_as('cust_id', 'Customer');
            $crud->add_action('Detail', base_url() . 'assets/grocery_crud/images/icons/color/folder.png', 'admin/order/detail_order', 'fancybox iframe');
            $this->load($crud);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	public function detail_order($id){
		$detail_menu = $this->db->query("select * from order_detail where order_id = '".$id."'")->result_array();
		echo "<table width='100%'><tr><td>Kode</td><td>Nama</td><td>Qty</td><td>Harga</td></tr>";
		foreach($detail_menu as $data){
			echo "<tr><td>".$data['menu_id']."</td><td>".$data['itemname']."</td><td>".$data['ord_det_qty']."</td><td>".number_format($data['ord_det_price'])."</td></tr>";
		}
		echo "</table>";
		$this->laod->view('admin/content_view_order',$data);
	}

    private function load($crud) {
        $output = $crud->render();
        $output->nav = 'order';
        if ($crud->getState() == 'list')
            $this->load->view('admin/dandelion.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }

}
?>

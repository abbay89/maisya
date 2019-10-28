<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class konfirmasi_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

	public function insert_order($orderheader) {
        $this->db->insert('konfirmasi_order', $orderheader);
        return $this->db->insert_id();
    }
	public function update_order($confirmid,$invoice){
		$this->db->set('order_status', $confirmid);
		$this->db->where('order_code', $invoice);
		$this->db->update('order'); 
		//echo $this->db->last_query();exit;
	}
}

?>

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

class News_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	public function getData($id) {
		 
		 $where = '';
		
		 if(!empty($id)){
			$where = 'WHERE news_id = '.$id;	 
		 }
		 
        return $this->db->query('select * from news '.$where.' order by news_id  desc')->result();
    }
	
}
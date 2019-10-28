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

class Career_model extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
    }

    function get_list_vacancy($dept_id = '') {
        $query = "select *, 
                DATE_FORMAT(career_due_date,'%d %M %Y') as career_due_date
                from career where career_due_date > CURRENT_TIMESTAMP AND career_active = 1 ";
        $param = array();
        if ($dept_id != '') {
            $query .= " AND dept_id = ?";
            $param[] = $dept_id;
        }
        return $this->db->query($query, $param)->result();
    }

    function get_list_department() {
        return $this->db->get('department')->result();
    }

    function insert_form_apply1($cf) {
        $this->db->insert('career_appform', $cf);
        return $this->db->insert_id();
    }

    function check_career($carier_url){
        return $this->db->query('select career_id,  count(1) as total 
            from career where career_url = ? and 
            career_due_date > CURRENT_TIMESTAMP AND career_active = 1', array($carier_url))->row();
    }
    
    function update_career($cf_id, $cf){
        $this->db->where('cf_id', $cf_id);
        $this->db->update('career_appform',$cf);
    }
}

?>

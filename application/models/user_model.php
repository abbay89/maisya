<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function auth($username, $password) {
        return $this->db->query('select * from user where username = ? and password = ?', array($username, $password))->row();
    }

    public function get_list_city() {
        return $this->db->query('select * from city order by city_name')->result();
    }

    public function get_list_address_type() {
        return $this->db->query('select * from address_type')->result();
    }

    public function check_user_cust($username) {
        return $this->db->query("select count(1) as total from customer where cust_username = ?", array($username))->row()->total;
    }

    public function insert_customer($customer) {
        $this->db->insert('customer', $customer);
        return $this->db->insert_id();
    }

    public function update_customer($customer, $cust_id) {
        $this->db->where('cust_id', $cust_id);
        $this->db->update('customer', $customer);
    }

    public function insert_customer_address($cust_ad) {
        $this->db->insert('customer_address', $cust_ad);
        return $this->db->insert_id();
    }

    public function update_customer_address($cust_ad, $cust_ad_id) {
        $this->db->where('cust_ad_id', $cust_ad_id);
        return $this->db->update('customer_address', $cust_ad);
    }

    public function get_customer_phones($cust_id) {
        $this->db->where('cust_id', $cust_id);
        return $this->db->get('customer_phone')->result();
    }

    public function insert_customer_phone($cust_id, $cust_phone, $primary = false) {
        $data['cust_id'] = $cust_id;
        $data['cust_phone_number'] = $cust_phone;
        $data['cust_phone_primary'] = $primary;
        $this->db->insert('customer_phone', $data);
        return $this->db->insert_id();
    }

    public function delete_customer_phone($cust_phone_id) {
        $this->db->delete('customer_phone', array('cust_phone_id' => $cust_phone_id));
    }

    public function update_customer_phone($cust_phone_id, $cust_phone) {
        $data['cust_phone_number'] = $cust_phone;
        $this->db->where('cust_phone_id', $cust_phone_id);
        return $this->db->update('customer_phone', $data);
    }

    public function set_primary_customer_phone($cust_id, $cust_phone_id) {
        $data = array();
        $data['cust_phone_primary'] = false;
        $this->db->where('cust_id', $cust_id);
        $this->db->update('customer_phone', $data);
        $data = array();
        $data['cust_phone_primary'] = true;
        $this->db->where('cust_phone_id', $cust_phone_id);
        $this->db->update('customer_phone', $data);
//        $data = array();
//        $data['cust_phone'] = $cust_phone_number;
//        $this->db->where('cust_id', $cust_id);
//        $this->db->update('customer', $data);
    }

    public function auth_customer($username, $password) {
        return $this->db->query("select cust_id, cust_name,cust_username from customer where (cust_username = ? or cust_email = ?) and cust_password = ?", array($username, $username, sha1($password)))->row();
    }

    public function get_list_address($cust_id) {
        return $this->db->query("select ca.*, c.city_name, at_name_en, at_name_idn from customer_address ca 
                                    left join city c on c.city_id = ca.city_id 
                                    inner join address_type at on at.at_id = ca.at_id where cust_id = ?
                                    order by cust_ad_created desc", array($cust_id))->result();
    }

    public function get_customer($cust_id) {
        return $this->db->query("select * from customer where cust_id = ?", array($cust_id))->row();
    }

    public function get_customer_address($cust_ad_id, $cust_id = '') {
        return $this->db->query("select * from customer_address where cust_ad_id = ?", array($cust_ad_id))->row();
    }

    public function check_email_customer($email) {
        return $this->db->query("select cust_email, cust_username, cust_id from customer where cust_email = ? ", array($email))->row();
    }

    public function check_customer($cust_id, $cust_username, $cust_email) {
        return $this->db->query("select count(1) as total from customer where cust_email = ? and cust_id = ? and cust_username = ?", array($cust_email, $cust_id, $cust_username))->row()->total;
    }

    public function update_customer_password($cust_id, $cust_password) {
        $this->db->query("update customer set cust_password = ? where cust_id = ?", array(sha1($cust_password), $cust_id));
    }

    public function get_delivery_address($cust_ad_id) {
        $query = "select ca.*, c.city_name,province_name
                      from customer_address ca 
                      inner join city c on c.city_id = ca.city_id
                      inner join province p on p.province_id = c.province_id
                      where ca.cust_ad_id = ?";
        return $this->db->query($query, array($cust_ad_id))->row();
    }

    public function check_career_slug($career_url) {
        return $this->db->query("select count(1) as total from career where career_url = ?", array($career_url))->row()->total;
    }
	public function check_sharetolove_slug($sharetolove_url) {
        return $this->db->query("select count(1) as total from sharetolove where image_slug = ?", array($sharetolove_url))->row()->total;
    }

    public function get_csr_title($csr_id) {
        return $this->db->query("select csr_title_en as title from csr_activity where csr_id = ?", array($csr_id))->row()->title;
    }

    public function get_list_csr() {
        $this->db->where('csr_status', 1);
        return $this->db->get('csr_activity')->result();
    }

    public function check_csr_url($csr_url) {
        return $this->db->query("select count(1) as total from csr_activity where csr_url = ?", array($csr_url))->row()->total;
    }

    public function has_url($csr_id) {
        return $this->db->query("select count(csr_url) as total from csr_activity where csr_id = ?")->row()->total;
    }

    public function get_csr_activity($csr_url) {
        $this->db->where('csr_url', $csr_url);
        return $this->db->get('csr_activity')->row();
    }

    public function get_csr_images($csr_id) {
        $this->db->where('csr_id', $csr_id);
        return $this->db->get('csr_image')->result();
    }

    public function get_history_order($cust_id) {
        $query = "select o.order_hokben_id,o.order_id, o.order_code, DATE_FORMAT(o.order_date, '%d-%m-%Y') as order_date, o.order_total_price,
                            (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.title_en,' (x', od.ord_det_qty ,')') SEPARATOR '<br/>')
                                                    FROM menu m 
                                                            LEFT JOIN order_detail od ON m.menu_id = od.menu_id 
                                                            WHERE od.order_id = o.order_id 
                                                            GROUP BY od.order_id) 
                                    AS makanan
                     from `order` o
                    where o.cust_id = ?";
        return $this->db->query($query, array($cust_id))->result();
    }
	public function get_history_point($cust_username) {
        $query = "select * from customer a left join sync_web b on a.cust_username = REPLACE(b.msisdn,'+62','0')
                    where a.cust_username = ?";
		//echo $query;
        return $this->db->query($query, array($cust_username))->result();
    }

    public function get_list_slide_show($slideshow_type) {
        $query = "select s.* from slideshow s 
                        inner join menu_show ms on s.ms_id = ms.ms_id
                        where ((ms.ms_time_from < CURRENT_TIME() and ms.ms_time_end > CURRENT_TIME())
                        or (ms.ms_time_from2 < CURRENT_TIME() and ms.ms_time_end2 > CURRENT_TIME())) and 
                        slideshow_type = ? order by slideshow_created desc, slideshow_id DESC ";
        return $this->db->query($query, array($slideshow_type))->result();
    }

    public function get_visi_misi() {
        $query = "select ";
        $suffix = '';
        if ($this->session->userdata('language') != 'en') {
            $suffix = '_idn';
        }
        $query .= "hoka_visi" . $suffix . ' as hoka_visi, ';
        $query .= "hoka_misi" . $suffix . ' as hoka_misi ';
        $query .= "from setting limit 1";
        return $this->db->query($query)->row();
    }

    public function get_list_dbo() {
        return $this->db->get('dob')->result();
    }

    public function get_city_province($city_id) {
        $query = "select c.city_name, p.province_name 
                from city c 
                inner join province p on p.province_id = c.province_id
                where c.city_id = ?";
        return $this->db->query($query, array($city_id))->row();
    }

    public function get_who_apply($cf_id) {
        $this->load->dbutil();
        $query = $this->db->query("SELECT c.career_title_en, ca.* FROM career_appform ca
            inner join career c on
            c.career_id = ca.career_id where cf_id = ?", array($cf_id));
        return array('query' => $query->row(), 'csv' => $this->dbutil->csv_from_result($query));
    }

    public function get_all_apply() {
        $this->load->dbutil();
        $query = $this->db->query("SELECT c.career_title_en, ca.* FROM career_appform ca
            inner join career c on
            c.career_id = ca.career_id");
        return array('query' => $query->result(), 'csv' => $this->dbutil->csv_from_result($query));
    }

    public function insert_reserv($reservation) {
        $this->db->insert('reservation', $reservation);
        return $this->db->insert_id();
    }

    public function get_reserv($reserv_id) {
        $this->db->where('reserv_id', $reserv_id);
        return $this->db->get('reservation')->row();
    }

    public function update_reserv($reservation, $reserv_id) {
        $this->db->where('reserv_id', $reserv_id);
        $this->db->update('reservation', $reservation);
    }

    public function insert_reserv_detail($reservation) {
        $this->db->insert('reservation_detail', $reservation);
        return $this->db->insert_id();
    }

    public function get_reserv_details($reserv_id) {
        $this->db->select('reservation_detail.*, title_en, title_idn');
        $this->db->join('menu', 'menu.menu_id = reservation_detail.menu_id');
        $this->db->where('reserv_id', $reserv_id);
        $this->db->order_by('menu.menu_hoka_party');
        return $this->db->get('reservation_detail')->result();
    }

    public function update_reserv_detail_qty($qty, $reserv_detail_id) {
        $this->db->where('reserv_detail_id', $reserv_detail_id);
        $reserv = array();
        $reserv['qty'] = $qty;
        $this->db->update('reservation_detail', $reserv);
        return $this->db->affected_rows();
    }

    public function remove_reserv_detail($reserv_detail_id) {
        $this->db->where('reserv_detail_id', $reserv_detail_id);
        $this->db->delete('reservation_detail');
        return $this->db->affected_rows();
    }

    public function sum_qty_main_reservation($reserv_id) {
        $this->db->select('sum(qty) as total');
        $this->db->where('reserv_id', $reserv_id);
        $this->db->join('menu', 'menu.menu_id = reservation_detail.menu_id');
        $this->db->where_in('menu.menu_hoka_party', array(1, 2));
        return $this->db->get('reservation_detail')->row()->total;
    }

    public function get_reserv_detail($reserv_detail_id) {
        $this->db->select('reservation_detail.*, menu.menu_hoka_party');
        $this->db->join('menu', 'menu.menu_id = reservation_detail.menu_id');
        $this->db->where('reserv_detail_id', $reserv_detail_id);
        return $this->db->get('reservation_detail')->row();
    }

    public function calculate_reserv($reserv_id) {
        return $this->db->query('select sum((reserv_detail_price + reserv_detail_charge_price) * qty) as total'
                        . ' from reservation_detail'
                        . ' where reserv_id = ?', array($reserv_id))->row()->total;
    }

    public function get_list_reserv($reserv_id) {
        $query = "select r.reserv_id,  
                    DATE_FORMAT(r.reserv_date, '%d-%m-%Y') as reserv_date,
                    r.reserv_total_price,
                            (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.title_en,' (x', rd.qty ,')') SEPARATOR '<br/>')
                                                    FROM menu m 
                                                            LEFT JOIN reservation_detail rd ON m.menu_id = rd.menu_id 
                                                            WHERE rd.reserv_id = r.reserv_id 
                                                            GROUP BY rd.reserv_id) 
                                    AS makanan,
                     l.location_name_en as location
                     from `reservation` r
                     inner join location l on r.location_id = l.location_id
                    where r.reserv_id = ? and r.reserv_status = 2";
        return $this->db->query($query, array($reserv_id))->result();
    }

    public function get_reserv_formatted($reserv_id) {
        $query = "select r.reserv_total_price,
                            (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.title_en,' (x', rd.qty ,')') SEPARATOR '<br/>')
                                                    FROM menu m 
                                                            LEFT JOIN reservation_detail rd ON m.menu_id = rd.menu_id 
                                                            WHERE rd.reserv_id = r.reserv_id and m.menu_hoka_party  =1
                                                            GROUP BY rd.reserv_id) 
                                    AS paket_main_menu,
                            (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.title_en,' (x', rd.qty ,')') SEPARATOR '<br/>')
                                                    FROM menu m 
                                                            LEFT JOIN reservation_detail rd ON m.menu_id = rd.menu_id 
                                                            WHERE rd.reserv_id = r.reserv_id and m.menu_hoka_party  =2
                                                            GROUP BY rd.reserv_id) 
                                    AS main_menu,
                            (SELECT GROUP_CONCAT(DISTINCT CONCAT(m.title_en,' (x', rd.qty ,')') SEPARATOR '<br/>')
                                                    FROM menu m 
                                                            LEFT JOIN reservation_detail rd ON m.menu_id = rd.menu_id 
                                                            WHERE rd.reserv_id = r.reserv_id and m.menu_hoka_party  =3
                                                            GROUP BY rd.reserv_id) 
                                    AS additional_menu,
                     l.location_name_en as location
                     from `reservation` r
                     inner join location l on r.location_id = l.location_id
                    where r.reserv_id = ?";
        return $this->db->query($query, array($reserv_id))->row();
    }

    public function get_guest_customer() {
        $this->db->where('cust_id', $this->config->item('guest_id'));
        return $this->db->get('customer')->row();
    }
	
	public function insertLog($data){
		
		$data['key'] = '1';
        $data['level'] = '10';
        $this->db->insert('keys', $data);
		
	}

}

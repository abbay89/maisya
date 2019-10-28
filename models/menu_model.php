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

class Menu_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
	public function getmenuid($id)
	{
		$query = "select menu_id
				 from menu where menu_id_hokben='".$id."'";       
		return $this->db->query($query)->row();				 
	}
    public function check_menu_slug($url) {
        $query = "select count(1) as total from menu where menu_slug = ?";
        return $this->db->query($query, array($url))->row()->total;
    }

    public function get_menu_price($menu_id) {
        return $this->db->query("select price from menu where menu_id = ?", array($menu_id))->row()->price;
    }

    public function get_category_name($menu_id) {
        return $this->db->query("select category_name_en from menu m inner join category c on c.category_id = m.category_id  where menu_id = ?", array($menu_id))->row()->category_name_en;
    }

    public function check_category_slug($url) {
        $query = "select count(1) as total from category where category_url = ?";
        return $this->db->query($query, array($url))->row()->total;
    }

    public function get_all_menu() {
        $query = "select m.menu_id, title_en, title_idn, menu_image, price, menu_slug, category_id from menu as m
                        inner join menu_show ms on m.ms_id = ms.ms_id
                        where ms.ms_time_from < CURRENT_TIME() and ms.ms_time_end > CURRENT_TIME()
                        and m.menu_active = 1 and category_id != 15";
        return $this->db->query($query)->result();
    }

    public function get_categories() {
        $query = "select * from category";
        return $this->db->query($query)->result();
    }

    public function get_favorites_menu() {
		//echo "masuk";
        $query = "select m.* from menu m where menu_active != 0";
//        $total_order = $this->db->query('select count(m.menu_id) as total from order_detail od 
//                        inner join menu m on od.menu_id = m.menu_id
//                        where m.menu_favorite = 1 group by m.menu_id')->row();
//        echo $total_order->total;
//        exit();
//        if ($total_order && $total_order->total > 6) {
//            $query .= " left join order_detail od
//                        on m.menu_id = od.menu_id
//                        order by menu_favorite desc, count(od.menu_id) desc";
//        } else {
        $query .= " order by menu_favorite desc, rand()";
//        }
        $query .= " limit 5";
		//echo $query;
        return $this->db->query($query)->result();
    }

    public function get_menu_by_id($menu_id) {
        return $this->db->get_where('menu', array('menu_id' => $menu_id, 'menu_active' => true))->row();
    }

    public function get_menu_by_slug($menu_slug) {
        return $this->db->get_where('menu', array('menu_slug' => $menu_slug, 'menu_active' => true))->row();
    }

    public function get_contains($menu_id) {
        $query = "select contains_name_en, contains_name_idn, contains_pic from contains c 
                        inner join menu_contains mc 
                        on c.contains_id = mc.contains_id
                        and mc.menu_id = ?";
        return $this->db->query($query, array($menu_id))->result();
    }

    public function add_order($order) {
        $this->db->insert('order', $order);
        $order_id = $this->db->insert_id();
        $total = $this->db->query('select count(1) as total from `order` o where YEAR(o.order_date) = YEAR(CURDATE())')->row()->total;
        $order_code = date('dy') . sprintf("%05d", $total);
        $this->db->where('order_id', $order_id);
        $data['order_code'] = $order_code;
        $this->db->update('order', $data);
        return $order_id;
    }

    public function add_order_detail($order_detail) {
        $this->db->insert('order_detail', $order_detail);
        return $this->db->insert_id();
    }

    public function get_order($order_id) {
        return $this->db->query("select o.*, DATE_FORMAT(o.order_date,'%d %M %Y') as date_order, 
                                cust_ad_address as address, cust_name, ci.city_name, order_phone, order_email
                                from `order` o 
                                inner join customer_address ca on o.cust_ad_id = ca.cust_ad_id
                                inner join customer c on ca.cust_id = c.cust_id
                                left join city ci on ci.city_id = ca.city_id
                                where o.order_id = ?", array($order_id))->row();
    }

    public function get_order_details($order_id) {
        return $this->db->query("select od.*, title_en, menu_image, menu_id_hokben
                            from order_detail od inner join 
                            menu m on od.menu_id = m.menu_id
                            where order_id = ?", array($order_id))->result();
//        return $this->db->get('order_detail')->result();
    }

    public function get_list_whatshot() {
        $this->db->where('wh_active', true);
		$this->db->order_by('wh_created', 'desc');
		$this->db->order_by('wh_id', 'desc');
        return $this->db->get('whatshot')->result();
    }

    public function get_whatshot($wh_url) {
        $this->db->where('wh_active', true);
        $this->db->where('wh_url', $wh_url);
        return $this->db->get('whatshot')->row();
    }

    public function get_whatshot_images($wh_id) {
        $this->db->where('wh_id', $wh_id);
        return $this->db->get('whatshot_image')->result();
    }

    public function check_whatshot_url($wh_url) {
        return $this->db->query("select count(1) as total from whatshot where wh_url = ?", array($wh_url))->row()->total;
    }

    public function hoka_party_paket_main_menu() {
        $query = "select m.menu_id, title_en, 0 as total, title_idn, menu_image, price, menu_slug, category_id from menu as m
                    where m.menu_hoka_party = 1 order by FIELD(m.menu_id,132,133,134,90,91,92)";
        return $this->db->query($query)->result();
    }

    public function hoka_party_main_menu() {
        $query = "select m.menu_id, title_en, 0 as total, title_idn, menu_image, price, menu_slug, category_id from menu as m
                    where m.menu_hoka_party = 2";
        return $this->db->query($query)->result();
    }

    public function hoka_party_additional_menu() {
        $query = "select m.menu_id, title_en, 0 as total, title_idn, menu_image, price, menu_slug, category_id from menu as m
                    where m.menu_hoka_party = 3";
        return $this->db->query($query)->result();
    }

    public function get_menu_url() {
        $query = "select title_en, menu_slug from menu";
        return $this->db->query($query)->result();
    }

    public function total_price($menu_id, $qty) {
        $query = "select ((price + if(menu_hoka_party=2,?,0)) * ?) as total from menu where menu_id = ?";
        return $this->db->query($query, array($this->config->item('hokben_party_price'), $qty, $menu_id))->row();
    }

    public function get_menu_party($menu_id) {
        return $this->db->query("select price, menu_hoka_party from menu where menu_id = ?", array($menu_id))->row();
    }
	
	//update mobile apps
	public function getImagePromo($location)
	{
		$sql	= "select * from whatshot where wh_position IS NOT NULL
					and wh_mob_active in  ('1','0') and wh_image_thumb_url_apps != '' order by wh_position asc";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function getMinimumOrder()
	{
		$sql	= "select * from apps_minimum_fee";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function getdetailwh($id)
	{
		$sql	= "select * from whatshot where wh_id = '".$id."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->row();
	}
	public function getdetail_minimum_fee($id)
	{
		$sql	= "select * from apps_minimum_fee where id = '".$id."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->row();
	}
	public function getAllPromo()
	{
		$sql	= "select * from tb_promo";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function getDetPromo($id)
	{
		$sql	= "select * from tb_promo where id ='".$id."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->row();
	}
	public function getDetNotification($id)
	{
		$sql	= "select * from notif_apps_new where notification_id ='".$id."'";
		//echo $sql; exit;
		$query	= $this->db->query($sql);
		return $query->row();
	}
	public function getnotification()
	{
		$sql	= "select * from notif_apps_new WHERE notification_startperiode <= '".date('Y-m-d')."' AND notification_endperiode > '".date('Y-m-d')."'";

		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function getlistnotif()
	{
		$sql	= "select b.*,a.notiflist_order from notif_apps_new b 
						LEFT JOIN notif_apps_list a ON b.notification_id = a.notification_id  
						WHERE b.notification_startperiode <= '".date('Y-m-d')."' AND b.notification_endperiode >= '".date('Y-m-d')."' AND b.notification_flag = '1' AND a.notification_id IS NULL";

		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	public function getnotifaktif()
	{
		$sql	= "select a.notiflist_id, a.notiflist_order, b.* from notif_apps_list a 
						INNER JOIN notif_apps_new b ON a.notification_id = b.notification_id 
						WHERE b.notification_startperiode <= '".date('Y-m-d')."' AND b.notification_endperiode >= '".date('Y-m-d')."' AND b.notification_flag = '1' 
						ORDER BY a.notiflist_order DESC";

		$query	= $this->db->query($sql);
		return $query->result_array();
	}
}

?>

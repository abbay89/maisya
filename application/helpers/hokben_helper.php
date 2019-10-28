<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (!function_exists('is_guest')) {

    function is_guest() {
        $CI = & get_instance();
        return $CI->config->item('guest_id') == $CI->session->userdata('cust_id');
    }

}
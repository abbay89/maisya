<?php

class LanguageLoader {

    function initialize() {
        $ci = & get_instance();
        $ci->load->helper('language');
        $site_lang = $ci->session->userdata('language');
        if ($site_lang) {
            if ($site_lang == 'en') {
                $ci->config->set_item('language', 'english');
                $ci->lang->load('content', 'english');
            } else {
                $ci->config->set_item('language', 'indonesia');
                $ci->lang->load('content', 'indonesia');
            }
        } else {
            $ci->config->set_item('language', 'indonesia');
            $ci->lang->load('content', 'indonesia');
        }
    }

}

?>
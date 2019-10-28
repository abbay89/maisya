<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        if ($this->session->userdata('who')) {
            redirect(base_url() . "admin/order");
        }
        $this->load->view('admin/login.php');
    }

    public function do_login() {
        $username = $this->input->get_post('username', true);
        $password = $this->input->get_post('password', true);
        if ($username == '') {
            $this->session->set_flashdata('error', $this->session->userdata('language') != 'en' ?'Username tidak boleh kosong':'Username cannot be empty');
        } else if ($password == '') {
            $this->session->set_flashdata('error', $this->session->userdata('language') != 'en' ?'Password tidak boleh kosong':'Password cannot be empty');
        } else {
            $this->load->model('user_model');
            $user = $this->user_model->auth($username, sha1($password));
			//print_r($user);exit;
            if ($user) {
                $this->session->set_userdata('who', $user->user_id);
//                $this->session->set_userdata('role', $user->role);
                redirect(base_url() . 'admin');
                die();
            } else {
                $this->session->set_flashdata('error', $this->session->userdata('language') != 'en' ?'Username atau Password salah':'Wrong username or password');
            }
        }
        redirect(base_url().'admin');
    }


    public function logout() {
        $this->session->unset_userdata('who');
        $this->session->sess_destroy();
        redirect(base_url().'admin');
    }

    public function test(){
        echo sha1('admin');
    }
}

?>
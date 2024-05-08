<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kader extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_kader');
    }

     public function index()
    {
        $data['page'] = 'Kader';
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kader/index',$data);
        $this->load->view('layout/footer');
    }
}

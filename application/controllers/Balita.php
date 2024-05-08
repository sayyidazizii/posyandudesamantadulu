<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_balita');
    }

    public function index()
    {
        $data['page'] = 'Balita';
        $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Balita/index',$data);
        $this->load->view('layout/footer');
    }
}

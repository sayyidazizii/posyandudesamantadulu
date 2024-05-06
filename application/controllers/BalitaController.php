<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BalitaController extends CI_Controller
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
      

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Balita/index');
        $this->load->view('layout/footer');
    }
}

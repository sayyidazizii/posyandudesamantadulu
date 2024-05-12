<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_admin');
        $this->load->model('M_balita');
        $this->load->model('M_kader');
        $this->load->model('M_kematian');
        $this->load->model('M_penimbangan');
        $this->load->model('M_imunisasi');

    }

    public function index()
    {
        $data['balita']         = $this->M_balita->count();
        $data['kader']          = $this->M_kader->count();
        $data['kematian']       = $this->M_kematian->count();
        $data['penimbangan']    = $this->M_penimbangan->count();
        $data['imunisasi']      = $this->M_imunisasi->count();
        
        // echo json_encode($data);
        // exit;

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('home',$data);
        $this->load->view('layout/footer');
    }

    public function logout()
    {
        $data['page']           = 'Keluar';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('logout',$data);
        $this->load->view('layout/footer');
    }

}

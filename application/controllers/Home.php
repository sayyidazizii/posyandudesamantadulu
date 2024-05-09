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
    }

    public function index()
    {
        // $data['user']           = $this->db->count_all('user');
        // $data['obat']           = $this->db->count_all('obat');
        // $data['rekam_medis']    = $this->db->count_all('rekam_medis');

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('home');
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

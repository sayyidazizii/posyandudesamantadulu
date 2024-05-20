<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_kematian');
        $this->load->model('M_balita');
    }

    public function index()
    {
        $data['page'] = 'Kematian';
        $data['kematian'] = $this->M_kematian->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kematian/index', $data);
        $this->load->view('layout/footer');
    }
    public function add()
    {
        $data['page'] = 'Tambah Kematian';
        $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kematian/add', $data);
        // $this->load->view('layout/footer');
    }
    //get balita
    public function fetch_data()
    {
        $id_balita = $this->input->post('id_balita');

        $dataBalita = $this->M_balita->getbyid($id_balita);

        echo json_encode($dataBalita); // Kirim sebagai respons
    }

    function processAddkematian()
    {
        $nib             = $this->input->post('nib');
        $id_balita             = $this->input->post('id_balita');
        $nama_lengkap     = $this->input->post('nama_lengkap');
        $tempat_lahir     = $this->input->post('tempat_lahir');
        $tanggal_lahir     = $this->input->post('tanggal_lahir');
        $jenis_kelamin     = $this->input->post('jenis_kelamin');
        $tgl_kematian     = $this->input->post('tgl_kematian');
        $alamat         = $this->input->post('alamat');
        $keterangan        = $this->input->post('keterangan');

        $data = array(
            'nib'            => $nib,
            'id_balita'       => $id_balita,
            'nama_lengkap'    => $nama_lengkap,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_kematian'  => $tgl_kematian,
            'alamat'        => $alamat,
            'keterangan'    => $keterangan,
            'data_state'    => 0
        );

        $this->M_kematian->insert($data);
        $this->session->set_flashdata('alert', 'Data berhasil ditambah.');
        $this->session->set_flashdata('alert_type', 'info');
        redirect('kematian');
    }

    public function Edit($id_kematian)
    {
        $data['page'] = 'Edit Kematian';
        $data['kematian'] = $this->M_kematian->getbyid($id_kematian);
        $data['balita'] = $this->M_balita->get_data();

        // echo json_encode($data);
        // exit;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kematian/edit', $data);
        $this->load->view('layout/footer');
    }

    function processEditkematian()
    {
        $id_kematian     = $this->input->post('id_kematian');
        $id_balita       = $this->input->post('id_balita');
        $nib             = $this->input->post('nib');
        $nama_lengkap    = $this->input->post('nama_lengkap');
        $tempat_lahir    = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $jenis_kelamin   = $this->input->post('jenis_kelamin');
        $tgl_kematian    = $this->input->post('tgl_kematian');
        $alamat          = $this->input->post('alamat');
        $keterangan      = $this->input->post('keterangan');

        $data = array(
            'id_kematian'   => $id_kematian,
            'id_balita'     => $id_balita,
            'nib'           => $nib,
            'nama_lengkap'  => $nama_lengkap,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_kematian'  => $tgl_kematian,
            'alamat'        => $alamat,
            'keterangan'    => $keterangan,
            'data_state'    => 0
        );

        // echo json_encode($data);
        // exit;
        $this->M_kematian->update($id_kematian, $data);
        $this->session->set_flashdata('alert', 'Data berhasil diedit.');
        $this->session->set_flashdata('alert_type', 'info');
        redirect('kematian');
    }
    function delete($idkematian)
    {
        $id_kematian         = $idkematian;

        $data = array(
            'data_state'     => 1,
        );
        $this->M_kematian->delete($id_kematian, $data);
        $this->session->set_flashdata('alert', 'Data berhasil dihapus.');
        $this->session->set_flashdata('alert_type', 'info');
        redirect('kematian');
    }
}

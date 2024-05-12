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
        $data['kader'] = $this->M_kader->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kader/index', $data);
        $this->load->view('layout/footer');
    }
    public function add()
    {
        $data['page'] = 'Tambah Kader';
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kader/add', $data);
        $this->load->view('layout/footer');
    }

    function processAddKader()
    {
        $nama_lengkap     = $this->input->post('nama_lengkap');
        $tempat_lahir     = $this->input->post('tempat_lahir');
        $tanggal_lahir     = $this->input->post('tanggal_lahir');
        $jabatan        = $this->input->post('jabatan');
        $lama_kerja        = $this->input->post('lama_kerja');

        $data = array(
            'nama_lengkap'    => $nama_lengkap,
            'tempat_lahir'    => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jabatan'        => $jabatan,
            'lama_kerja'    => $lama_kerja,
            'data_state'    => 0
        );

        $this->M_kader->insert($data);
        $this->session->set_flashdata('alert', 'Data berhasil ditambah.');
        $this->session->set_flashdata('alert_type', 'info');
        redirect('kader');
    }

    public function Edit($id_kader)
    {
        $data['page'] = 'Edit Kader';
        $data['kader'] = $this->M_kader->getbyid($id_kader);

        // echo json_encode($data);
        // exit;
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Kader/edit', $data);
        $this->load->view('layout/footer');
    }

    function processEditKader()
    {
        $id_kader         = $this->input->post('id_kader');
        $nama_lengkap     = $this->input->post('nama_lengkap');
        $tempat_lahir     = $this->input->post('tempat_lahir');
        $tanggal_lahir     = $this->input->post('tanggal_lahir');
        $jabatan        = $this->input->post('jabatan');
        $lama_kerja        = $this->input->post('lama_kerja');

        $data = array(
            'nama_lengkap'    => $nama_lengkap,
            'tempat_lahir'    => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jabatan'        => $jabatan,
            'lama_kerja'    => $lama_kerja,
        );

        // echo json_encode($data);
        // exit;
        $this->M_kader->update($id_kader, $data);
        $this->session->set_flashdata('alert', 'Data berhasil diedit.');
        $this->session->set_flashdata('alert_type', 'info');
        redirect('kader');
    }
    function delete($idkader)
    {
        $id_kader         = $idkader;

        $data = array(
            'data_state'     => 1,
        );
        $this->M_kader->delete($id_kader, $data);
        $this->session->set_flashdata('alert', 'Data berhasil dihapus.');
        $this->session->set_flashdata('alert_type', 'info');
        redirect('kader');
    }
}

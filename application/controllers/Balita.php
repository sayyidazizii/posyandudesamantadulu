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

    public function add()
    {
        $data['page'] = 'Tambah Balita';
        // $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Balita/add',$data);
        $this->load->view('layout/footer');
    }

    function processAddBalita()
	{
		$nama_lengkap 	= $this->input->post('nama_lengkap');
		$tempat_lahir 	= $this->input->post('tempat_lahir');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$usia			= $this->input->post('usia');
		$nama_ayah		= $this->input->post('nama_ayah');
		$nama_ibu		= $this->input->post('nama_ibu');

		$data = array(
			'nib'		    => $this->nib(),
			'nama_lengkap'	=> $nama_lengkap,
			'tempat_lahir'	=> $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin'	=> $jenis_kelamin,
			'usia'		    => $usia,
			'nama_ayah'		=> $nama_ayah,
			'nama_ibu'		=> $nama_ibu,
			'data_state'	=> 0
		);

		$this->M_balita->insert($data);
        $this->session->set_flashdata('alert', 'Data berhasil ditambah.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('balita');
	}
    //nomor nib
	public function nib()
    {
        $latest = $this->M_balita->latest();

        if (!$latest) {
            return 'B0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->nib);

        return 'B' . sprintf('%04d', $string + 1);
    }

    public function Edit($id_balita)
    {
        $data['page'] = 'Edit Balita';
        $data['balita'] = $this->M_balita->getbyid($id_balita);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Balita/edit',$data);
        $this->load->view('layout/footer');
    }

     function processEditBalita()
	{
		$id_balita 	    = $this->input->post('id_balita');
		$nib 	        = $this->input->post('nib');
		$nama_lengkap 	= $this->input->post('nama_lengkap');
		$tempat_lahir 	= $this->input->post('tempat_lahir');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$usia			= $this->input->post('usia');
		$nama_ayah		= $this->input->post('nama_ayah');
		$nama_ibu		= $this->input->post('nama_ibu');

		$data = array(
            // 'id_balita'     => $id_balita,
			'nama_lengkap'	=> $nama_lengkap,
			'nib'		    => $nib,
			'nama_lengkap'	=> $nama_lengkap,
			'tempat_lahir'	=> $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin'	=> $jenis_kelamin,
			'usia'		    => $usia,
			'nama_ayah'		=> $nama_ayah,
			'nama_ibu'		=> $nama_ibu,
		);

		$this->M_balita->update($id_balita,$data);
        $this->session->set_flashdata('alert', 'Data berhasil diedit.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('balita');
	}
    function delete($idbalita)
	{
        $id_balita 	    = $idbalita;

		$data = array(
            'data_state'     => 1,
		);
		$this->M_balita->delete($id_balita,$data);
        $this->session->set_flashdata('alert', 'Data berhasil dihapus.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('balita');
	}
}

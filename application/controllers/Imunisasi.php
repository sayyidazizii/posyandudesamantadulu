<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_imunisasi');
        $this->load->model('M_balita');
    }

    public function index()
    {
        $data['page'] = 'Imunisasi';
        $data['imunisasi'] = $this->M_imunisasi->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Imunisasi/index',$data);
        $this->load->view('layout/footer');
    }
    
    public function add()
    {
        $data['page'] = 'Input Data Imunisasi Balita';
        $data['imunisasi'] = $this->M_imunisasi->get_data();
        $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Imunisasi/add',$data);
        // $this->load->view('layout/footer');
    }

    //get balita
	public function fetch_data()
	{
		$id_balita = $this->input->post('id_balita');
		
		$dataBalita = $this->M_balita->getbyid($id_balita);

		echo json_encode($dataBalita); // Kirim sebagai respons
	}

    function processAddimunisasi()
	{
		// $nib 	        = $this->input->post('nib');
		$id_balita 	                = $this->input->post('id_balita');
		$nama_lengkap 	            = $this->input->post('nama_lengkap');
		$tempat_lahir 	            = $this->input->post('tempat_lahir');
		$tanggal_lahir 	            = $this->input->post('tanggal_lahir');
		$jenis_kelamin 	            = $this->input->post('jenis_kelamin');
		$tgl_imunisasi 	            = $this->input->post('tgl_imunisasi');
		$imunisasi 	                = $this->input->post('imunisasi');
		$vitamin 	                = $this->input->post('vitamin');
		$keterangan	                = $this->input->post('keterangan');

		$data = array(
			'id_balita'	        => $id_balita,
			'tgl_imunisasi'     => $tgl_imunisasi,
			'imunisasi'         => $imunisasi,
			'vitamin'           => $vitamin,
			'keterangan'	    => $keterangan,
			'data_state'	    => 0
		);

		$this->M_imunisasi->insert($data);
        $this->session->set_flashdata('alert', 'Data berhasil ditambah.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('imunisasi');
	}

    public function Edit($id_imunisasi)
    {
        $data['page'] = 'Edit Data Penimbangan';
        $data['imunisasi'] = $this->M_imunisasi->getbyid($id_imunisasi);
        $data['balita'] = $this->M_balita->get_data();

       
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Imunisasi/edit',$data);
        $this->load->view('layout/footer');
    }

    function processEditImunisasi()
	{
		$id_imunisasi               = $this->input->post('id_imunisasi');
		$id_balita 	                = $this->input->post('id_balita');
		$nama_lengkap 	            = $this->input->post('nama_lengkap');
		$tempat_lahir 	            = $this->input->post('tempat_lahir');
		$tanggal_lahir 	            = $this->input->post('tanggal_lahir');
		$jenis_kelamin 	            = $this->input->post('jenis_kelamin');
		$tgl_imunisasi 	            = $this->input->post('tgl_imunisasi');
		$imunisasi 	                = $this->input->post('imunisasi');
		$vitamin 	                = $this->input->post('vitamin');
		$keterangan	                = $this->input->post('keterangan');

		$data = array(
			'id_balita'	        => $id_balita,
			'tgl_imunisasi'     => $tgl_imunisasi,
			'imunisasi'         => $imunisasi,
			'vitamin'           => $vitamin,
			'keterangan'	    => $keterangan,
			'data_state'	    => 0
		);

		$this->M_imunisasi->update($id_imunisasi,$data);
        $this->session->set_flashdata('alert', 'Data berhasil diedit.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('imunisasi');
	}

     function delete($idImunisasi)
	{
        $id_imunisasi 	    = $idImunisasi;

		$data = array(
            'data_state'     => 1,
		);
       
		$this->M_imunisasi->delete($id_imunisasi,$data);
        $this->session->set_flashdata('alert', 'Data berhasil dihapus.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('imunisasi');
	}

}

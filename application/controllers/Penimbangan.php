<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_penimbangan');
        $this->load->model('M_balita');

    }

    public function index()
    {
        $data['page'] = 'Penimbangan';
        $data['penimbangan'] = $this->M_penimbangan->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Penimbangan/index',$data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['page'] = 'Input Data Penimbangan Balita';
        $data['penimbangan'] = $this->M_penimbangan->get_data();
        $data['balita'] = $this->M_balita->get_data();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Penimbangan/add',$data);
        // $this->load->view('layout/footer');
    }

    //get balita
	public function fetch_data()
	{
		$id_balita = $this->input->post('id_balita');
		
		$dataBalita = $this->M_balita->getbyid($id_balita);

		echo json_encode($dataBalita); // Kirim sebagai respons
	}

    function processAddpenimbangan()
	{
		// $nib 	        = $this->input->post('nib');
		$id_balita 	                = $this->input->post('id_balita');
		$nama_lengkap 	            = $this->input->post('nama_lengkap');
		$tempat_lahir 	            = $this->input->post('tempat_lahir');
		$tanggal_lahir 	            = $this->input->post('tanggal_lahir');
		$jenis_kelamin 	            = $this->input->post('jenis_kelamin');
		$tgl_penimbangan 	        = $this->input->post('tgl_penimbangan');
		$berat_badan 	            = $this->input->post('berat_badan');
		$tinggi_badan 	            = $this->input->post('tinggi_badan');
		$lingkar_kepala             = $this->input->post('lingkar_kepala');
		$lingkar_perut 	            = $this->input->post('lingkar_perut');
		$keterangan	                = $this->input->post('keterangan');

		$data = array(
			'id_balita'	        => $id_balita,
			'tgl_penimbangan'   => $tgl_penimbangan,
			'berat_badan'       => $berat_badan,
			'tinggi_badan'      => $tinggi_badan,
			'lingkar_kepala'    => $lingkar_kepala,
			'lingkar_perut'     => $lingkar_perut,
			'keterangan'	    => $keterangan,
			'data_state'	    => 0
		);

		$this->M_penimbangan->insert($data);
        $this->session->set_flashdata('alert', 'Data berhasil ditambah.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('penimbangan');
	}

    public function Edit($id_timbangan)
    {
        $data['page'] = 'Edit Data Penimbangan';
        $data['penimbangan'] = $this->M_penimbangan->getbyid($id_timbangan);
        $data['balita'] = $this->M_balita->get_data();

       
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('content/Penimbangan/edit',$data);
        $this->load->view('layout/footer');
    }

     function delete($idPenimbangan)
	{
        $id_penimbangan 	    = $idPenimbangan;

		$data = array(
            'data_state'     => 1,
		);
       
		$this->M_penimbangan->delete($id_penimbangan,$data);
        $this->session->set_flashdata('alert', 'Data berhasil dihapus.');
        $this->session->set_flashdata('alert_type', 'info');
		redirect('penimbangan');
	}
    
}

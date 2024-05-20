<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index()
	{
		if ($this->session->userdata('is_login') == true) {
			$level = $this->session->userdata('level');

			if ($level == 1) {
				redirect('Home');
			} else if ($level == 2) {
				redirect('Home');
			} else {
				redirect('Home');
			}
		}

		// $this->load->view('layout/header');
		$this->load->view('auth/login_admin');
		// $this->load->view('layout/footer');
	}

	public function AuthAdmin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_login = $this->M_admin->check_user($username, $password);

		if ($cek_login->num_rows() > 0) {
			$user = $cek_login->row();

			$data_user = array(
				'id_user' 	=> $user->id_user,
				'nama'		=> $user->nama,
				'level'		=> $user->level,
				'is_login'	=> true
			);

			$this->session->set_userdata($data_user);
			redirect('login');
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('login/Admin');
		}
	}

	public function AuthKetua()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_login = $this->M_admin->check_ketua($username, $password);

		if ($cek_login->num_rows() > 0) {
			$user = $cek_login->row();

			$data_user = array(
				'id_user' 	=> $user->id_user,
				'nama'		=> $user->nama,
				'level'		=> $user->level,
				'is_login'	=> true
			);

			$this->session->set_userdata($data_user);
			redirect('login');
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('login/Ketua');
		}
	}

	public function Admin()
	{
		if ($this->session->userdata('is_login') == true) {
			$level = $this->session->userdata('level');

			if ($level == 1) {
				redirect('Home');
			} else if ($level == 2) {
				redirect('Home');
			} else {
				redirect('Home');
			}
		}

		// $this->load->view('layout/header');
		$this->load->view('auth/login_admin');
		// $this->load->view('layout/footer');
	}

	public function Ketua()
	{
		if ($this->session->userdata('is_login') == true) {
			$level = $this->session->userdata('level');

			if ($level == 1) {
				redirect('Home');
			} else if ($level == 2) {
				redirect('Home');
			} else {
				redirect('Home');
			}
		}

		// $this->load->view('layout/header');
		$this->load->view('auth/login_ketua');
		// $this->load->view('layout/footer');
	}


	public function forget_pass()
	{
		if ($this->session->userdata('is_login') == true) {
			$level = $this->session->userdata('level');

			if ($level == 1) {
				redirect('Home');
			} else if ($level == 2) {
				redirect('Home');
			} else {
				redirect('Home');
			}
		}

		// $this->load->view('layout/header');
		$this->load->view('auth/forget_password');
		// $this->load->view('layout/footer');
	}

	public function Auth()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_login = $this->M_admin->check_user($username, $password);

		if ($cek_login->num_rows() > 0) {
			$user = $cek_login->row();

			$data_user = array(
				'id_admin' 	=> $user->id_admin,
				'nama'		=> $user->nama,
				'level'		=> $user->level,
				'is_login'	=> true
			);

			// echo json_encode($data_user);
			// echo 'Login Berhasil';
			// exit;

			$this->session->set_userdata($data_user);
			redirect('Home');
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('login');
		}
	}

	public function search_user()
	{
		$username = $this->input->post('username');
		// $password = md5($this->input->post('password'));

		$cek_user = $this->M_admin->search_user($username);

		if ($cek_user->num_rows() > 0) {
			$user = $cek_user->row();

			$data_user = array(
				'id_admin' 	=> $user->id_admin,
				'nama'		=> $user->nama,
				'username'  => $user->username,
				'level'		=> $user->level,
				'is_login'	=> false
			);

			// echo json_encode($data_user);
			// echo 'Login Berhasil';
			// exit;

			$this->session->set_userdata($data_user);
			$this->load->view('auth/reset_password', $data_user);
		} else {
			$this->session->set_flashdata(array('error_login' => true));
			redirect('Login/forget');
		}
	}

	public function save_pass()
	{

		$id_admin = $this->input->post('id_admin');
		$password = $this->input->post('password');

		$data = array(
			'id_admin' => $id_admin,
			'password' => md5($password),

		);
		// echo json_encode($data);
		// echo 'Berhasil';
		// exit;
		$this->M_admin->update($id_admin, $data);
		$this->session->set_flashdata('alert', 'Password Berhasil Di ubah , Silahkan Login.');
		$this->session->set_flashdata('alert_type', 'info');
		redirect("Login");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}

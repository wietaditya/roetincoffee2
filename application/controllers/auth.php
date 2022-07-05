<?php

class Auth extends CI_Controller {

	public function signup() {
		$this->load->view('auth/signup');
	}

	public function login() {
		$this->form_validation->set_rules('no_telp', 'No_telp', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login');
		} else {
			$auth = $this->model_auth->cek_login();
			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan',
			'<div class="alert alert-danger fade show" role="alert">
				<strong>No Telpon atau Password salah!
			  </div>');
			  redirect('auth/login');
			} else {
				$this->session->set_userdata('nama', $auth->nama);
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);

				switch($auth->role_id) {
					case 1 : 
						redirect('admin/admincontroller/dashboard');
						break;
					case 2 :
						redirect('home');
						break;
					default: 
						break;
				}
			}
		}
	}

	public function daftar() {
		$this->form_validation->set_rules('no_telp', 'No_telp', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passwordConfirmation', 'passwordConfirmation', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/signup');
		} else {
			$data = array(
				'id'		=> '',
				'nama'		=> $this->input->post('nama'),
				'no_telp'	=> $this->input->post('no_telp'),
				'password'	=> $this->input->post('password'),
				'role_id'	=> 2
			);

			$this->db->insert('tb_user', $data);
			redirect('auth/login');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		if ($this->session->userdata('role_id') == 1) {
			redirect('auth/login');
		} else {
			redirect('home');
		}

	}
}

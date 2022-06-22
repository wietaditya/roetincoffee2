<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cafe extends CI_Controller {
	
	public function index()
	{
		$this->load->view('nav');
		$this->load->view('home');
	}

	public function about()
	{
		$this->load->view('nav');
		$this->load->view('about');
	}

	public function products()
	{
		$this->load->view('nav');
		$this->load->view('products');
	}

	public function store()
	{
		$data['produk'] = $this->model_produk->tampil_data()->result();
		$this->load->view('nav');
		$this->load->view('store', $data);
	}

	public function signup() {
		$this->load->view('login/signup');
	}

}

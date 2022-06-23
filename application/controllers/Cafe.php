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

	public function tambah_ke_keranjang($id) {
		$produk = $this->model_produk->find($id);
		$data = array(
			'id'		=> $produk->id,
			'qty'		=> 1,
			'price'		=> $produk->harga,
			'name'		=> $produk->nama
		);

		$this->cart->insert($data);
		redirect('store');
	}

	public function keranjang() {
		$this->load->view('nav');
		$this->load->view('keranjang');
	}

	public function hapus_keranjang() {
		$this->cart->destroy();
		redirect('store');
	}

	public function pembayaran() {
		$this->load->view('nav');
		$this->load->view('pembayaran');
	}

	public function proses_pesanan() {
		$this->cart->destroy();
		$this->load->view('nav');
		$this->load->view('proses_pesanan');
	}

	public function signup() {
		$this->load->view('login/signup');
	}

}

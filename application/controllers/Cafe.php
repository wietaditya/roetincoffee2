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
		if($this->session->userdata('nama') == FALSE) {
			redirect('auth/login');
		} else {


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
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('nav');
			$this->load->view('proses_pesanan');
		} else {
			echo "Maaf, Pesanan Anda Gagal Diproses.";
		}
	}

	public function detail_product($id) {
		$data['produk'] = $this->model_produk->find($id);
		$this->load->view('nav');
		$this->load->view('detail_product', $data);
	}

	public function signup() {
		$this->load->view('login/signup');
	}

}

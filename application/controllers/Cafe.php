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
			$total = $this->cart->total();
			$data['total'] = $total;
			$this->cart->destroy();
			$this->load->view('nav');
			$this->load->view('pesan_berhasil_memesan', $data);
		} else {
			echo "Maaf, Pesanan Anda Gagal Diproses.";
		}
	}

	public function proses_pesanan_bayar() {
			$username = $this->session->userdata('username');
			$pesanan = $this->model_pesanan->tampil_pesanan($username)->result();
			$total = 0;
			foreach ($pesanan as $psn) {
				$ongkir = $psn->ongkir;
			}
			$total += $ongkir;
			$id_invoice = '';
			foreach ($pesanan as $psn) {
				$total += $psn->harga;
				$id_invoice = $psn->id_invoice;
			}
			$data['total'] = $total;
			$data['id_invoice'] = $id_invoice;
			$this->cart->destroy();
			$this->load->view('nav');
			$this->load->view('proses_pesanan', $data);
	}

	public function batalkan_pesanan($id) {
		$data = array(
			'status'	=> 3
		);

		$where = array(
			'id'	=> $id
		);

		$this->db->where($where);
		$this->db->update('tb_invoice', $data);

		$this->db->where('id_invoice',$where['id']);
		$this->db->delete('tb_pesanan');
		redirect();
	}

	public function detail_product($id) {
		$data['produk'] = $this->model_produk->find($id);
		$this->load->view('nav');
		$this->load->view('detail_product', $data);
	}

	public function signup() {
		$this->load->view('login/signup');
	}

	public function daftar_pesanan() {
		$username = $this->session->userdata('username');
		$data['pesanan'] = $this->model_pesanan->tampil_pesanan($username)->result();
		$this->load->view('nav');
		$this->load->view('pesanan', $data);
	}

	public function upload_bukti_pembayaran($id) {
		$bukti_tf = $_FILES['bukti_pembayaran'];
		if($bukti_tf == '') {

		} else {
			$config['upload_path']		= './assets/bukti_tf';
			$config['allowed_types']	= 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('bukti_pembayaran')) {
				echo "upload gagal"; die();
			} else {
				$bukti_tf=$this->upload->data('file_name');
			}

			$data = array(
				'status'	=> 1,
				'bukti_pembayaran'	=> $bukti_tf
			);

			$where = array(
				'id'	=> $id
			);

			$this->db->where($where);
			$this->db->update('tb_invoice', $data);
			$this->load->view('nav');
			$this->load->view('pembayaran_berhasil');
		}
	}
	

}

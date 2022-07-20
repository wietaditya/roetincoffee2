<?php

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-danger fade show" role="alert">
				<strong>Anda belum login!
			  </div>');
			  redirect('auth/login');
		}
	}

	public function dashboard() {
		$this->load->view('admin/dashboard');
	}

	public function data_produk() {
		$data['produk'] = $this->model_produk->tampil_data()->result();
		$this->load->view('admin/data_produk', $data);
	}

	public function data_member() {
		$data['member'] = $this->model_member->tampil_data()->result();
		$this->load->view('admin/data_member', $data);
	}

	public function data_kategori() {
		$data['kategori'] = $this->model_kategori->tampil_data()->result();
		$this->load->view('admin/data_kategori', $data);
	}

	public function add_produk() {
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar == '') {} else {
			$config['upload_path']		= './assets/images';
			$config['allowed_types']	= 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar gagal diunggah";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama' 			=> $nama,
			'keterangan' 	=> $keterangan,
			'kategori' 		=> $kategori,
			'harga' 		=> $harga,
			'stok' 			=> $stok,
			'gambar' 		=> $gambar
		);

		$this->model_produk->add_produk($data, 'tb_produk');
		redirect('admin/data_produk');
	}

	public function add_kategori() {
		$nama = $this->input->post('nama');
		$desc = $this->input->post('desc');

		$data = array(
			'nama' 			=> $nama,
			'desc' 			=> $desc
		);

		$this->model_kategori->add_kategori($data, 'tb_kategori');
		redirect('admin/data_kategori');
	}

	public function edit_produk($id) {
		$where = array('id' => $id);
		$data['produk'] = $this->model_produk->edit_produk(
			$where, 'tb_produk')->result();
		$this->load->view('admin/edit_produk', $data);
	}

	public function edit_kategori($id) {
		$where = array('id' => $id);
		$data['kategori'] = $this->model_kategori->edit_kategori(
			$where, 'tb_kategori')->result();
		$this->load->view('admin/edit_kategori', $data);
	}

	public function update() {
		$id				= $this->input->post('id');
		$nama			= $this->input->post('nama');
		$keterangan		= $this->input->post('keterangan');
		$kategori		= $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');
		
		$data = array(
			'nama' => $nama,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok,
		);

		$where = array(
			'id' => $id
		);

		$this->model_produk->update_data($where, $data, 'tb_produk');
		redirect('admin/data_produk');
	}

	public function update_kategori() {
		$id				= $this->input->post('id');
		$nama			= $this->input->post('nama');
		$desc		= $this->input->post('desc');
		
		$data = array(
			'nama' => $nama,
			'desc' => $desc
		);

		$where = array(
			'id' => $id
		);

		$this->model_kategori->update_data($where, $data, 'tb_kategori');
		redirect('admin/data_kategori');
	}

	public function delete_produk($id) {
		$where = array('id' => $id);
		$this->model_produk->delete_data($where, 'tb_produk');
		redirect('admin/data_produk');
	}

	public function delete_kategori($id) {
		$where = array('id' => $id);
		$this->model_kategori->delete_data($where, 'tb_kategori');
		redirect('admin/data_kategori');
	}

	public function delete_member($id) {
		$where = array('id' => $id);
		$this->model_kategori->delete_data($where, 'tb_user');
		redirect('admin/data_member');
	}

	//Invoice
	public function invoices() {
		$data['invoices'] = $this->model_invoice->tampil_data();
		$this->load->view('admin/data_invoice', $data);
	}

	public function invoice_detail($id_invoice) {
		$data['invoice'] = $this->model_invoice
								->detail_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice
								->detail_pesanan($id_invoice);
		$this->load->view('admin/detail_invoice', $data);

	}

	public function konfirmasi_pembayaran($id) {

		$data = array(
			'status'	=> 2
		);

		$where = array(
			'id'	=> $id
		);

		$this->db->where($where);
		$this->db->update('tb_invoice', $data);
		redirect('admin/invoices');
	}
	
}

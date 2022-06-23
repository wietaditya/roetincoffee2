<?php

class AdminController extends CI_Controller {
	public function dashboard() {
		$this->load->view('admin/dashboard');
	}

	public function data_produk() {
		$data['produk'] = $this->model_produk->tampil_data()->result();
		$this->load->view('admin/data_produk', $data);
	}

	public function add_produk() {
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar == '') {} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

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
		redirect('admin/admincontroller/data_produk');
	}

	public function edit($id) {
		$where = array('id' => $id);
		$data['produk'] = $this->model_produk->edit_produk($where, 'tb_produk')->result();
		$this->load->view('admin/edit_produk', $data);
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
		redirect('admin/admincontroller/data_produk');
	}

	public function delete($id) {
		$where = array('id' => $id);
		$this->model_produk->delete_data($where, 'tb_produk');
		redirect('admin/admincontroller/data_produk');
	}
	
}

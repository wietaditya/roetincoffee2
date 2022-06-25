<?php

class Kategori extends CI_Controller {
	public function kopi() {
		$data['produk'] = $this->model_kategori->data_kopi()->result();
		$this->load->view('nav');
		$this->load->view('kategori/kategori_kopi', $data);
	}

	public function merch() {
		$data['produk'] = $this->model_kategori->data_merch()->result();
		$this->load->view('nav');
		$this->load->view('kategori/kategori_merch', $data);
	}
}

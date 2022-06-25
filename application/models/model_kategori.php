<?php

class Model_kategori extends CI_Model {
	public function data_kopi() {
		return $this->db->get_where("tb_produk",array('kategori' => 'kopi'));
	}

	public function data_merch() {
		return $this->db->get_where("tb_produk",array('kategori' => 'merch'));
	}
}

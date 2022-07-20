<?php

class Model_kategori extends CI_Model {
	public function tampil_data() {
		return $this->db->get('tb_kategori');
	}

	public function add_kategori($data, $table) {
		$this->db->insert($table, $data);
	}

	public function edit_kategori($where, $table) {
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function delete_data($where, $table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function data_kopi() {
		return $this->db->get_where("tb_produk",array('kategori' => 'kopi'));
	}

	public function data_merch() {
		return $this->db->get_where("tb_produk",array('kategori' => 'merch'));
	}
}

<?php

class Model_pesanan extends CI_Model {

	public function tampil_pesanan($username) {
		return $this->db->select('t1.id_invoice, t1.nama_pdk, t1.harga, t2.ongkir')
						->from('tb_pesanan as t1')
						->where('t2.username', $username)
						->where('t2.status', 0)
						->join('tb_invoice as t2', 't1.id_invoice = t2.id', 'LEFT')
						->get();

	}

}

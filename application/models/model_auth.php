<?php

class Model_auth extends CI_Model {
	public function cek_login() {
		$no_telp	= set_value('no_telp');
		$password	= set_value('password');

		$result		= $this->db->where('no_telp', $no_telp)
								->where('password', $password)
								->limit(1)
								->get('tb_user');
		
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
}

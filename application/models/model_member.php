<?php

class Model_member extends CI_Model {
	
	public function tampil_data() {
		return $this->db->select('id, nama, no_telp')
						->from('tb_user')
						->where('role_id', 2)
						->get();
	}

}

<?php

/**
 * 
 */
class Model_anggota extends CI_Model
{
	
	function view_anggota(){

		return $this->db->get('tb_anggota')->result();
	}
}




?>
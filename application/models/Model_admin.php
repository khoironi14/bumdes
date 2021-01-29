<?php
/**
 * 
 */
class Model_admin extends CI_Model
{
	
	function view_admin(){

		return $this->db->get('tb_admin')->result();
	}

	function add_admin(){

		if (isset($_POST['simpan'])) {
			# code...
		}else{

			
		}
	}
}












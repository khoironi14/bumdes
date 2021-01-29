<?php
/**
 * 
 */
class Model_bunga extends CI_Model
{
	
	function view_bunga(){

		return $this->db->get('tb_durasi')->result();
	}
}









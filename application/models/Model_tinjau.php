<?php
/**
 * 
 */
class Model_tinjau extends CI_Model
{
	
	function view_pengajuan(){

		return $this->db->join('tb_anggota','tb_peminjaman.nik=tb_anggota.nik')->get('tb_peminjaman')->result();
	}
}









?>
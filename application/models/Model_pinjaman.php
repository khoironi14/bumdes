<?php

/**
 * 
 */
class Model_pinjaman extends CI_Model
{
	
	function view_pinjaman(){

		return $this->db
		->join('tb_anggota','tb_peminjaman.nik=tb_anggota.nik')
		->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->get_where('tb_peminjaman',['status'=>1])->result();

	}
}








?>
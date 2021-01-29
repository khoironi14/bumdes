<?php

/**
 * 
 */
class Model_pembayaran extends CI_Model
{
	
	function view_pembayaran(){

		//return $this->db->query("SELECT * FROM `tb_anggota` left outer join tb_pembayaran ON tb_anggota.nik=tb_pembayaran.nik where tb_anggota.nik not in(select nik from tb_pembayaran)")->result();

		return $this->db
		//->select('nama','tb_peminjaman.nik','id_peminjaman','tb_peminjaman.bunga','jumlah_pembayaran','jumlah_peminjaman')
		->join('tb_anggota','tb_peminjaman.nik=tb_anggota.nik')
		//->join('tb_pembayaran','tb_peminjaman.nik=tb_pembayaran.nik','left')
		->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->order_by('tanggal','desc')
		->get_where('tb_peminjaman',['status'=>1])->result();
	}
}
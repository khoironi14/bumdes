<?php
/**
 * 
 */
class Cek_pembayaran extends CI_Controller
{
	
	function __construct()
	{
			parent::__construct();
			$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		if ($akses ==1) {
					redirect('akses');
				}	
	}


	function index(){
		$nik=$this->session->userdata('nik');
		$data['pinjam']=$this->db
		->select('jumlah_pinjaman,besar_angsuran,bunga,lama_pinjaman,id_peminjaman')
		//->join('tb_pembayaran','tb_peminjaman.nik=tb_pembayaran.nik')
		->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->order_by('id_peminjaman','desc')
		->get_where('tb_peminjaman',['tb_peminjaman.nik'=>$nik,'lunas'=>0])->row_array();
		$id=$data['pinjam']['id_peminjaman'];
		$data['p']=$this->db->select('sum(jumlah_pembayaran) as bayar,count(jumlah_pembayaran) as jml')->get_where('tb_pembayaran',['nik'=>$nik,'status_pembayaran'=>1,'id_pinjaman'=>$id])->row_array();
		
			

		 $data['pembayaran']=$this->db->get_where('tb_pembayaran',['nik'=>$nik,'id_pinjaman'=>$id,'status_pembayaran'=>1])->result();

		 $data['content']='pembayaran';
		 $this->load->view('dashboard',$data);
	}
}







?>
<?php
/**
 * 	
 */
class Report extends CI_Controller
{
	
	function __construct(){
parent::__construct();
		
		
		$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		if ($akses ==2) {
					redirect('akses');
				}
	}

	function report_anggota(){

		$data['anggota']=$this->db
		->join('tb_peminjaman','tb_anggota.nik=tb_peminjaman.nik')
		->get('tb_anggota')->result();
		$data['content']='admin/report_anggota';
		$this->load->view('dashboard',$data);
	}

	function print_anggota(){
			$data['anggota']=$this->db
		->join('tb_peminjaman','tb_anggota.nik=tb_peminjaman.nik')
		->get('tb_anggota')->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('admin/cetak_anggota',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        //$this->load->view('print_anggota',$data);

	}

	function report_pembayaran(){

		$data['pembayaran']=$this->db
		//->join('tb_anggota','tb_pembayaran.nik=tb_anggota.nik')
		//->group_by('tb_pembayaran.nik')
		->join('tb_peminjaman','tb_anggota.nik=tb_peminjaman.nik')
		->get('tb_anggota')->result();

		$data['content']='admin/report_pembayaran';
		$this->load->view('dashboard',$data);


	}

	function print_pembayaran(){

		$data['pembayaran']=$this->db
		->get('tb_anggota')->result();
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('admin/cetak_pembayaran',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}
}









?>
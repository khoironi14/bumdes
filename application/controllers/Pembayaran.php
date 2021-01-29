<?php
/**
 * 
 */
class Pembayaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pembayaran');
		$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		if ($akses ==2) {
					redirect('akses');
				}
		
	}


	function index(){
		
		$data['pembayaran']=$this->Model_pembayaran->view_pembayaran();
		$data['content']='admin/view_pembayaran';
		$this->load->view('dashboard',$data);
	}

	function cek_tagihan($id){
		$peminjaman=$this->db
		//->order_by('id_peminjaman','desc')
		->get_where('tb_peminjaman',['id_peminjaman'=>$id])->row_array();
$cek=$this->db
->order_by('id_pembayaran','desc')
->get_where('tb_pembayaran',['id_pinjaman'=>$id]);
if ($cek->num_rows()>0) {
	$view=$cek->row_array();
	$tempo=date('d-m-Y',strtotime('+30 days',strtotime($view['tanggal_pembayaran'])));
}else{


$tempo=date('d-m-Y',strtotime('+30 days',strtotime($peminjaman['tanggal'])));
}

		$sekarang=date('d-m-Y');
				 
 $selisih=strtotime($sekarang)-strtotime($tempo);
 $hari = $selisih/(60*60*24);
 $bunga=$peminjaman['besar_angsuran']+$peminjaman['bunga'];
  $bulan= floor($hari/30);
 $total= 1*$bunga/100*$bulan;
 if ($total<0) {
 	$data['denda']=0;
 }else{

 	$data['denda']=floor($total);
 }


		 $data['count']=$this->db
		 ->select('count(*) as jumlah')
		 ->get_where('tb_pembayaran',['id_pinjaman'=>$id])->row_array();
		$data['p']=$this->db
		->join('tb_anggota','tb_peminjaman.nik=tb_anggota.nik')
		->get_where('tb_peminjaman',['id_peminjaman'=>$id])->row_array();
		echo json_encode($data);
	}

	function simpan_pembayaran(){
		$nik=$this->input->post('nik');
		$data=[
			'nik'=>$this->input->post('nik'),
			'jumlah_pembayaran'=>$this->input->post('bayar'),
			'id_pinjaman'=>$this->input->post('id_peminjaman'),
			'tanggal_pembayaran'=>date('Y-m-d'),
			'angsuranke'=>$this->input->post('angsuran_ke'),
			'status_pembayaran'=>1,
			'denda'=>$this->input->post('denda'),
			'no_pembayaran'=>$this->input->post('no_pembayaran')

		];
		$this->db->insert('tb_pembayaran',$data);
		$p=$this->db->select('jumlah_pinjaman,lama_pinjaman,id_peminjaman')
		->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->get_where('tb_peminjaman',['nik'=>$nik,'lunas'=>0])->row_array();
		$idp=$p['id_peminjaman'];
		$cek=$this->db
		->select('sum(jumlah_pembayaran) as bayar,count(jumlah_pembayaran) as jumlah_angsur')
		//->join('tb_peminjaman','tb_pembayaran.nik=tb_peminjaman.nik')
		//->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->get_where('tb_pembayaran',['tb_pembayaran.nik'=>$nik,'status_pembayaran'=>1,'id_pinjaman'=>$idp])->row_array();
		if ($cek['bayar'] > $p['jumlah_pinjaman'] OR $cek['jumlah_angsur']==$p['lama_pinjaman']) {
			$this->db->where('nik',$nik);
			$this->db->update('tb_peminjaman',['lunas'=>1]);
		}
		$this->session->set_flashdata('flash', "<script> Swal.fire({
                              title: 'Success',
                              text: 'Pembayaran telah disimpan',
                              type: 'success',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Ok',
                              closeOnConfirm: true
                  })</script>");
		redirect('pembayaran');
	}


	function detail_pembayaran($nik,$id){
		
		$data['detail']=$this->db
		->join('tb_anggota','tb_pembayaran.nik=tb_anggota.nik')
		->get_where('tb_pembayaran',['tb_pembayaran.nik'=>$nik,'id_pinjaman'=>$id,'status_pembayaran'=>1])->result();
		$data['content']='admin/detail_pembayaran';
		$this->load->view('dashboard',$data);



	}


	function pengajuan_pembayaran(){
//$nik=$this->session->userdata('nik');
			$data['pembayaran']= $this->db->query("select tb_pembayaran.foto,jumlah_pembayaran,tanggal_pembayaran,status_pembayaran,nama,tb_pembayaran.nik,id_pembayaran,no_pembayaran from tb_pembayaran	join tb_anggota on tb_pembayaran.nik=tb_anggota.nik order by tanggal_pembayaran	desc")->result();
		$data['content']='admin/pengajuan_pembayaran';
		$this->load->view('dashboard',$data);


	}

	function status($id,$status,$nik){

		$this->db->where('id_pembayaran',$id);
		$this->db->update('tb_pembayaran',['status_pembayaran'=>$status]);
		
		$p=$this->db->select('jumlah_pinjaman,lama_pinjaman,id_peminjaman')
		->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->get_where('tb_peminjaman',['nik'=>$nik,'lunas'=>0])->row_array();

		$idp=$p['id_peminjaman'];
		if($status==1) {
			$cek=$this->db
		->select('sum(jumlah_pembayaran) as bayar,count(jumlah_pembayaran) as jumlah_angsur')
		//->join('tb_peminjaman','tb_pembayaran.nik=tb_peminjaman.nik')
		//->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->get_where('tb_pembayaran',['tb_pembayaran.nik'=>$nik,'status_pembayaran'=>1,'id_pinjaman'=>$idp])->row_array();
		if ($cek['bayar'] > $p['jumlah_pinjaman'] OR $cek['jumlah_angsur']==$p['lama_pinjaman']) {
			$this->db->where('nik',$nik);
			$this->db->update('tb_peminjaman',['lunas'=>1]);
		}

		}

		$this->session->set_flashdata('berhasil','Status Pembayaran berhasil diupdate');
		redirect('pembayaran/pengajuan_pembayaran');


	}
}










?>
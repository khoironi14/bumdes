<?php

class Pengajuan extends CI_Controller
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

		if (isset($_POST['simpan'])) {
			# code...
		}else{
			$nik=$this->session->userdata('nik');
			$data['cek']=$this->db->get_where('tb_peminjaman',['nik'=>$nik,'lunas'=>0]);
			$data['durasi']=$this->db->get('tb_durasi')->result();
			$data['content']='pengajuan';
			$this->load->view('dashboard',$data);
		}



	}
	function cek_bunga($id){

			$data=$this->db->get_where('tb_durasi',['id_durasi'=>$id])->row_array();
			echo json_encode($data);
		}

		function simpan_pengajuan(){

			$data=[
				'nik'=>$this->input->post('nik'),
				'jumlah_pinjaman'=>$this->input->post('jumlah_pinjaman'),
				'bunga'=>$this->input->post('bunga'),
				'id_durasi'=>$this->input->post('durasi'),
				'besar_angsuran'=>$this->input->post('angsuran'),
				'tanggal'=>date('Y-m-d')

			];
			$this->db->insert('tb_peminjaman',$data);
			redirect('pengajuan/cek_status');
		}

		function cek_status(){
			$data['status']=$this->db
			->join('tb_anggota','tb_peminjaman.nik=tb_anggota.nik')
			->get('tb_peminjaman')->result();
			$data['content']='cek_status';
			$this->load->view('dashboard',$data);

		}


		function cetak_surat(){
			$nik=$this->session->userdata('nik');

			$data['cetak']=$this->db

			->join('tb_peminjaman','tb_anggota.nik=tb_peminjaman.nik')
			->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
			->get_where('tb_anggota',['tb_anggota.nik'=>$nik])->row_array();
			$data['kades']=$this->db->get_where('tb_login',['akses'=>3])->row_array();

		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('cetak_surat',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
		}

		function pengajuan_pembayaran(){
				if (isset($_POST['simpan'])) {
					$config['upload_path']          = './assets/gambar';
    $config['allowed_types']        = 'jpg|png|pdf';
    $config['max_size']             = 20048;
    $config['max_width']            = 20048;
    $config['max_height']           = 20048;
 
    $this->load->library('upload', $config);
 
   $this->upload->do_upload('foto');
   $foto=$this->upload->data();

					$data=[
						'nik'=>$this->input->post('nik'),
						'jumlah_pembayaran'=>$this->input->post('nominal'),
						'id_pinjaman'=>$this->input->post('id_peminjaman'),
						'angsuranke'=>$this->input->post('angsuran_ke'),
						'tanggal_pembayaran'=>date('Y-m-d'),
						'foto'=>$foto['file_name'],
						'denda'=>$this->input->post('denda'),
						'no_pembayaran'=>$this->input->post('no_pembayaran')


					];
					$this->db->insert('tb_pembayaran',$data);
					$this->session->set_flashdata('berhasil','Berhasil disimpan');
					redirect('pengajuan/view_pembayaranp');
				}else{
					$nik=$this->session->userdata('nik');
					$data['cek']=$this->db
					//->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
					->order_by('id_peminjaman','desc')
					->get_where('tb_peminjaman',['nik'=>$nik,'lunas'=>0])->row_array();
					$id=$data['cek']['id_peminjaman'];
					$data['denda']=$this->db
					->order_by('id_pembayaran','desc')
					->get_where('tb_pembayaran',['id_pinjaman'=>$id,'status_pembayaran'=>1])->row_array();
					$data['count']=$this->db->select('count(*) as jumlah')->get_where('tb_pembayaran',['id_pinjaman'=>$id,'status_pembayaran'=>1])->row_array();
					$data['cp']=$this->db->get_where('tb_pembayaran',['nik'=>$nik,'status_pembayaran'=>1,'id_pinjaman'=>$id])->num_rows();
			$data['tgpi']=$this->db->get_where('tb_peminjaman',['nik'=>$nik,'lunas'=>0])->row_array();

					$data['content']='pengajuan_pembayaran';
			$this->load->view('dashboard',$data);
				}

		}


		function view_pembayaranp(){
				$nik1=$this->session->userdata('nik');
			$data['pembayaran']= $this->db
		//->select('nama','tb_peminjaman.nik','id_peminjaman','tb_peminjaman.bunga','jumlah_pembayaran')
		//->join('tb_anggota','tb_peminjaman.nik=tb_anggota.nik')
		//->join('tb_pembayaran','tb_peminjaman.nik=tb_pembayaran.nik','left')
		//->join('tb_durasi','tb_peminjaman.id_durasi=tb_durasi.id_durasi')
		->get_where('tb_pembayaran',['nik'=>$nik1])->result();
		$data['content']='view_pembayaran_status';
			$this->load->view('dashboard',$data);
		}
}







?>
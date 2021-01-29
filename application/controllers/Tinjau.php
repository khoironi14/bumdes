<?php
/**
 * 
 */
class Tinjau extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		if ($akses ==2) {
					redirect('akses');
				}
		$this->load->model('Model_tinjau');
	}

	function index(){
		

		$data['pinjaman']=$this->Model_tinjau->view_pengajuan();
		$data['content']='admin/view_pengajuan';
		$this->load->view('dashboard',$data);
	}

	function status($id,$status){
		if ($status==1) {
			$ket="disetujui";
		}else{

			$ket="ditolak";
		}
$this->db->where('id_peminjaman',$id);
$this->db->update('tb_peminjaman',['status'=>$status]);
//$this->session->set_flashdata('flash','Simpan');
$this->session->set_flashdata('flash', "<script> Swal.fire({
                              title: 'Success',
                              text: 'Pinjaman <?=$ket?>',
                              type: 'success',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Ok',
                              closeOnConfirm: true
                  })</script>");
redirect('tinjau');
	}


	function hapus($id){


		$this->db->where('id_peminjaman',$id);
		$this->db->delete('tb_peminjaman');
		$this->session->set_flashdata('flash','Hapus');
		redirect('tinjau');

	}
}





?>
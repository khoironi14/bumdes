<?php
/**
 * 
 */
class Anggota extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		
		$this->load->model('Model_anggota');
	}

	function index(){
$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		if ($akses ==2) {
					redirect('akses');
				}
		$data['anggota']=$this->Model_anggota->view_anggota();
		$data['content']='admin/view_anggota';
		$this->load->view('dashboard',$data);
	}

	function show($id){

		$data=$this->db
		->join('tb_login','tb_anggota.nik=tb_login.nik')
		->get_where('tb_anggota',['id_anggota'=>$id])->row_array();
		echo json_encode($data);
	}

	function edit(){
		$id=$this->input->post('id_anggota');
		$nik=$this->input->post('nik');
		$data=[
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telpon'=>$this->input->post('telpon'),
			'tempat_lahir'=>$this->input->post('tempat'),
			'tanggal_lahir'=>$this->input->post('tanggal'),
			'jk'=>$this->input->post('jenis'),
			'nik'=>$this->input->post('nik')

		];
		$user=[
			'email'=>$this->input->post('email'),
			'username'=>$this->input->post('username')

		];
		$this->db->where('id_anggota',$id);
		$this->db->update('tb_anggota',$data);
		$this->db->where('nik',$nik);
		$this->db->update('tb_login',$user);
		$this->session->set_flashdata('flash','Edit');
		redirect('anggota/index');
	}

	function hapus($id){
		$this->db->where('id_anggota',$id);
		$this->db->delete('tb_anggota');
			$this->session->set_flashdata('flash','Hapus');
		redirect('anggota/index');


	}


	function status($id,$status){
		$this->db->where('id_anggota',$id);
		$this->db->update('tb_anggota',['aktif'=>$status]);
		redirect('anggota/index');
		
	}
}







?>
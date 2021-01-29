<?php
/**
 * 
 */
class Bunga extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_bunga');
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

		$data['bunga']=$this->Model_bunga->view_bunga();
		$data['content']='admin/view_bunga';
		$this->load->view('dashboard',$data);
	}

	function add_bunga(){
		$id=$this->input->post('id_durasi');
		$data=[
			'lama_pinjaman'=>$this->input->post('durasi'),
			'presentase_bunga'=>$this->input->post('bunga'),
			//'angsuran'=>$this->input->post('angsuran'),

		];
		if ($id=="") {
			# code...
		
		$this->db->insert('tb_durasi',$data);
		$this->session->set_flashdata('flash','Simpan');
		}else{

			$this->db->where('id_durasi',$id);
			$this->db->update('tb_durasi',$data);
			$this->session->set_flashdata('flash','Edit');
		}

		redirect('bunga/index');
	}

	function edit($id){
		$data=$this->db->get_where('tb_durasi',['id_durasi'=>$id])->row_array();
		echo json_encode($data);

	}
	function hapus($id){

		$this->db->where('id_durasi',$id);
		$this->db->delete('tb_durasi');
		$this->session->set_flashdata('flash','Hapus');
		redirect('bunga/index');
	}

}









?>
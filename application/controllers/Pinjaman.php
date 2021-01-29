<?php
/**
 * 
 */
class Pinjaman extends CI_Controller
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
		$this->load->model('Model_pinjaman');
	}

	function index(){

		$data['pinjam']=$this->Model_pinjaman->view_pinjaman();
		$data['content']='admin/view_pinjaman';
		$this->load->view('dashboard',$data);
	}
}






?>
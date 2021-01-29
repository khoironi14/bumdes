<?php 
/**
 * 
 */
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin');
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
		$data['admin']=$this->Model_admin->view_admin();
		$data['content']='admin/view_admin';
		$this->load->view('dashboard',$data);

	}

	function add_admin(){

		if (isset($_POST['simpan'])) {
			$data=[

				'nama_lengkap'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'jk'=>$this->input->post('jenis'),
				'telpon'=>$this->input->post('telpon'),
				'nik'=>$this->input->post('nik')

			];
			$user=[
				'nama'=>$this->input->post('nama'),
				'email'=>$this->input->post('email'),
				'nik'=>$this->input->post('nik'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'akses'=>$this->input->post('akses'),
				'status'=>1

			];
			$this->db->insert('tb_login',$user);
			$this->db->insert('tb_admin',$data);
			$this->session->set_flashdata('flash','Simpan');
			redirect('admin/index');
		}else{
			$data['content']='admin/add_admin';
		$this->load->view('dashboard',$data);

		}
	}

	function edit(){

		if (isset($_POST['simpan'])) {
			$id=$this->input->post('id_admin');
			$nik=$this->input->post('nik');
			$data=[

				'nama_lengkap'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'jk'=>$this->input->post('jenis'),
				'telpon'=>$this->input->post('telpon'),
				'nik'=>$this->input->post('nik'),
				

			];

			$user=[
				'email'=>$this->input->post('email'),
				'username'=>$this->input->post('username')

			];
			$this->db->where('id_admin',$id);
			$this->db->update('tb_admin',$data);
			$this->db->where('nik',$nik);
			$this->db->update('tb_login',$user);
$this->session->set_flashdata('flash','Edit');
			redirect('admin/index');
		}else{
			$id=$this->uri->segment(3);
			$data['edit']=$this->db
			->join('tb_login','tb_admin.nik=tb_login.nik')
			->get_where('tb_admin',['id_admin'=>$id])->row_array();
			$data['content']='admin/edit_admin';
		$this->load->view('dashboard',$data);

		}

	}

	function hapus($id){
		$this->db->where('id_admin',$id);
		$this->db->delete('tb_admin');
		$this->session->set_flashdata('flash','Hapus');
			redirect('admin/index');


	}

	

		function profil(){

$nik=$this->session->userdata('nik');
		$data['profil']=$this->db->get_where('tb_admin',['nik'=>$nik])->row_array();
		$data['content']='admin/profil_admin';
		$this->load->view('dashboard',$data);
	}

	function show($id){
		$data=$this->db->get_where('tb_admin',['id_admin'=>$id])->row_array();
		echo json_encode($data);

	}
	function edit_profil(){
		$id_admin=$this->input->post('id_admin');
		$nik=$this->input->post('nik1');
		$config['upload_path']          = './assets/gambar';
    $config['allowed_types']        = 'jpg|png|pdf';
    $config['max_size']             = 20048;
    $config['max_width']            = 20048;
    $config['max_height']           = 20048;
 
    $this->load->library('upload', $config);
 
   $this->upload->do_upload('foto');
   $foto=$this->upload->data();

   if ($_FILES['foto']['name'] !="") {
   	$data=[
			'nama_lengkap'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telpon'=>$this->input->post('telpon'),
			
			'jk'=>$this->input->post('jenis'),
			'nik'=>$this->input->post('nik'),
			'foto'=>$foto['file_name']

		];
   }else{
	$data=[
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telpon'=>$this->input->post('telpon'),
			
			'jk'=>$this->input->post('jenis'),
			'nik'=>$this->input->post('nik'),
			//'foto'=>$foto['file_name']

		];

   }

		
		$user=[
			'nama'=>$this->input->post('nama'),
				'nik'=>$this->input->post('nik')
		];
		$this->db->where('id_admin',$id_admin);
		$this->db->update('tb_admin',$data);
		$this->db->where('nik',$nik);
		$this->db->update('tb_login',$user);
		redirect('admin/profil');

	}

	function ganti_password(){

		$lama=md5($this->input->post('lama'));
		$baru=md5($this->input->post('baru'));
		$konfirmasi=md5($this->input->post('konfirmasi'));
		$cek=$this->db->get_where('tb_login',['password'=>$lama]);
		if ($cek->num_rows() >0) {
			if ($konfirmasi==$baru) {
				$data=[

					'password'=>$baru
				];
				$this->db->where('password',$lama);
				$this->db->update('tb_login',$data);
				$keterangan['keterangan']="<div class='alert alert-success'><p>Password Berhasil diganti</p></div>";
			echo json_encode($keterangan);

			}else{
				$keterangan['keterangan']="<div class='alert alert-danger'><p>Konfirmasi Password Salah</p></div>";
			echo json_encode($keterangan);

			}
		}else{
			$keterangan['keterangan']="<div class='alert alert-danger'><p>Password Lama Salah</p></div>";
			echo json_encode($keterangan);

		}
	}
}
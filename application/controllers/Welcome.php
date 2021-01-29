<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{

		if (isset($_POST['login'])) {
			$data=[
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password'))


			];
			$cek=$this->db->get_where('tb_login',$data);
			if ($cek->num_rows() >0) {
				$data=$cek->row_array();
				$session['username']=$data['username'];
				$session['nama']=$data['nama'];
				$session['akses']=$data['akses'];
				$session['nik']=$data['nik'];
				$session['login']=true;
				$this->session->set_userdata($session);
				redirect('welcome/home');
			}else{
				$this->session->set_flashdata('notif',"Login Gagal Periksa Username/password");
				redirect('welcome');
			}
		}else{

		$this->load->view('login');
	}
	}

	function simpan_registrasi(){

		$nik=$this->input->post('nik');
		$cek=$this->db->get_where('tb_login',['nik'=>$nik]);
		if ($cek->num_rows() >0) {
			$this->session->set_flashdata('notif','Registrasi Gagal,NIK Sudah terdaftar');
		redirect('welcome');
		

	

	}else{
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
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password')),
			'akses'=>2,
			'nik'=>$this->input->post('nik')

		];
		$this->db->insert('tb_anggota',$data);
		$this->db->insert('tb_login',$user);
		$this->session->set_flashdata('berhasil','Registrasi Akun Berhasil');
		redirect('welcome');
			
	}
	}
	

	function home(){
		$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		
		$data['anggota']=$this->db->select('count(*) as jumlah')->get('tb_anggota')->row_array();
		$data['admin']=$this->db->select('count(*) as jumlah')->get('tb_admin')->row_array();
		$data['lunas']=$this->db->select('count(*) as jumlah')->get_where('tb_peminjaman',['lunas'=>1])->row_array();
		$data['belum']=$this->db->select('count(*) as jumlah')->get_where('tb_peminjaman',['lunas'=>0])->row_array();

		$data['content']='home';
		$this->load->view('dashboard',$data);
	}

	function profil(){
$login=$this->session->userdata('login');
			$akses=$this->session->userdata('akses');
		if (!isset($login)) {
				redirect('welcome/index');
				
		}
		if ($akses ==1 OR $akses==3) {
					redirect('akses');
				}
$nik=$this->session->userdata('nik');
		$data['profil']=$this->db->get_where('tb_anggota',['nik'=>$nik])->row_array();
		$data['content']='profil';
		$this->load->view('dashboard',$data);

	}

	function show($id){

		$data=$this->db->get_where('tb_anggota',['id_anggota'=>$id])->row_array();
		echo json_encode($data);
	}
	function edit_profil(){

		$id=$this->input->post('id_anggota');
$config['upload_path']          = './assets/gambar';
    $config['allowed_types']        = 'jpg|png|pdf|jpeg';
    //$config['max_size']             = 20048;
    //$config['max_width']            = 20048;
   // $config['max_height']           = 20048;
 
    $this->load->library('upload', $config);
 
  $f= $this->upload->do_upload('foto');
  
   if ($_FILES['foto']['name']=="") {
	$foto=$this->input->post('file_foto');
}else{

	 $f=$this->upload->data();
	 $foto=$f['file_name'];
}
    //echo "<pre>";
    // echo "</pre>";
   $k=$this->upload->do_upload('ktp');
  

   if ($_FILES['ktp']['name']=="") {
   	$ktp=$this->input->post('file_ktp');
   }else{
   	 $k=$this->upload->data();
   	 $ktp=$k['file_name'];
   }
$nik=$this->input->post('nik1');


		
		$data=[
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telpon'=>$this->input->post('telpon'),
			'tempat_lahir'=>$this->input->post('tempat'),
			'tanggal_lahir'=>$this->input->post('tanggal'),
			'jk'=>$this->input->post('jenis'),
			'nik'=>$this->input->post('nik'),
			'foto'=>$foto,
			'ktp'=>$ktp

		];

		$user=[
			'nik'=>$this->input->post('nik'),
			'nama'=>$this->input->post('nama')


		];
	
$this->db->where('id_anggota',$id);
		$this->db->update('tb_anggota',$data);
		$this->db->where('nik',$nik);
		$this->db->update('tb_login',$user);
		
		redirect('welcome/profil');
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
	function forgot(){
		$from_email = "ronitangerang14@gmail.com"; 
         $to_email =$this->input->post('email'); 
         $cek=$this->db->get_where('tb_login',['email'=>$to_email]);
         if ($cek->num_rows() >0) {
         	$token=date('hisd');
         	$this->db->where('email',$to_email);
         	$this->db->update('tb_login',['token'=>$token]);
         

         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'sambong141096',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
        );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");   

         $this->email->from($from_email, 'Khoironi'); 
         $this->email->to($to_email);
         $this->email->subject('Reset Password'); 
         $this->email->message('Kode Token Untuk Reset Password:'.$token.''); 

         //Send mail 
         if($this->email->send()){
                $this->session->set_flashdata("berhasil","Email berhasil terkirim.");
                redirect('welcome/reset');

         }else {
                $this->session->set_flashdata("berhasil","Email gagal dikirim."); 
                
         } 

     }else{
     	$this->session->set_flashdata('notif', "Gagal Email tidak terdaftar");

     	redirect('welcome/index');

     }


	}

	function reset(){
		if (isset($_POST['reset'])) {
			$token=$this->input->post('token');
			$cek=$this->db->get_where('tb_login',['token'=>$token]);
			if ($cek->num_rows() >0) {
				$password=md5($this->input->post('password'));
				$konfirmasi=md5($this->input->post('konfirmasi'));
				if ($password==$konfirmasi) {
					
					$this->db->where('token',$token);
					$this->db->update('tb_login',['password'=>$password]);

					$this->session->set_flashdata('berhasil', "Password Berhasil diganti");
					redirect('welcome');

				}
			}else{
				$this->session->set_flashdata('notif', "Token Salah");
				redirect('welcome');

			}
			
		}else{
			$this->load->view('reset');

		}

	}
	function log_out(){
$this->session->sess_destroy();
		redirect('welcome/index');
	}
}

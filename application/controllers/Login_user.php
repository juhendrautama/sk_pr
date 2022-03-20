<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login_user extends CI_Controller {

	function __construct(){

			parent::__construct();
			$this->load->model('M_crud_pelanggan');
			$this->load->library("session");
		}



	function index(){
			$this->load->view('home');
		}



	function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{
				redirect('Home');
			}
		}



  

	function cek(){
			$hsl=$this->M_crud_pelanggan->cek();
			if ($hsl->num_rows() == 1)
			{//jika salah satu pasword ada di di dalam table 
					$ok=$hsl->row();
					$data=array(
						'id_pelanggan'=>$ok->id_pelanggan,
						'nama'=>$ok->nama,
						'jenis_kel'=>$ok->jenis_kel,
						'tgl_lahir'=>$ok->tgl_lahir,
						'alamat'=>$ok->alamat,
						'no_telpon'=>$ok->no_telpon,
						'email'=>$ok->email,
						'pass'=>$ok->pass,
						'pass_samaran'=>$ok->pass_samaran,
						'tgl'=>$ok->tgl,
						'login_user'=>true
						);	
					$this->session->set_userdata($data);

					redirect('/Home/#portfolio');
			}else{

				echo'<script type="text/javascript">
						//<![CDATA[
						alert("password salah silah kan login kembali ");
						window.location="../";
						//]]>
					</script>';

			}
		}

		

	function logout()
		{
			$this->session->sess_destroy();
			redirect('Home');
			$this->keluar();
		}
		
		function keluar(){
			$this->load->view('home');
		}	

}




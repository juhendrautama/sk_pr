<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login_akses extends CI_Controller {

	function __construct(){

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->library("session");
		}



	function index(){
			$this->load->view('admin/login');
		}



	function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{
				redirect('adminpanel/Login_akses');
			}
		}



  

	function cek(){
			$hsl=$this->M_crud_admin->cek();
			if ($hsl->num_rows() == 1)
			{//jika salah satu pasword ada di di dalam table 
					$ok=$hsl->row();
					$data=array(
						'id_admin'=>$ok->id_admin,
						'user'=>$ok->user,
						'pass'=>$ok->pass,
						'alamat'=>$ok->alamat,
						'no_tlpn'=>$ok->no_tlpn,
						'status'=>$ok->status,
						'tgl'=>$ok->tgl,
						'login'=>true
						);	
					$this->session->set_userdata($data);
					if ($ok->status=='1') {
						redirect('adminpanel/Home');

					}else if ($ok->status=='2') {
						redirect('adminpanel/Home');
					}
			}else{

				echo'<script type="text/javascript">
						//<![CDATA[
						alert("password salah silah kan login kembali ");
						window.location="../Login_akses";
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




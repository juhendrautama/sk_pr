<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Data_pelanggan extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_pelanggan');
			$this->load->library("session");
			$this->sessionku();

		}

public function index()
	{	
		$data['tampil_data_pelanggan']=$this->M_crud_pelanggan->tampil_data_pelanggan();
		$this->load->view('admin/admin_data_pelanggan',$data);
	}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}





}





/* copy reg juhendra utama*/


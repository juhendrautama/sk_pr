<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_pelanggan');
			$this->load->library("session");
			$this->sessionku();

		}

	

	function sessionku ()

	{
		$berhasil=$this->session->userdata('login');
		if (!isset($berhasil) || $berhasil !=true )
		{ redirect('user/Login_akses'); }
	}

	public function index()

	{
		$this->load->view('user/home');

	}



	





}





/* copy reg juhendra utama*/


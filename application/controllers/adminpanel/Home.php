<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->library("session");
			$this->sessionku();

		}

	

	function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}

	public function index()

	{
		$this->load->view('admin/home');

	}



	





}





/* copy reg juhendra utama*/


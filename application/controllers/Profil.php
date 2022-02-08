<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Profil extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_baner');
			$this->load->model('M_crud_profil');
			$this->load->model('M_crud_kontak');
			$this->load->model('M_crud_kat_produk');
			$this->load->model('M_crud_produk');
		}	
	

	public function Selengkap_nya($id='')

	{
		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();
		
		$data['tampil_data_profil_id']=$this->M_crud_profil->tampil_data_profil_id2($id);
		$this->load->view('profil',$data);

	}



	





}





/* copy reg juhendra utama*/


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Detail extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_baner');
			$this->load->model('M_crud_profil');
			$this->load->model('M_crud_kontak');
			$this->load->model('M_crud_kat_produk');
			$this->load->model('M_crud_produk');
			$this->load->model('M_crud_transaki');
		}

	

	public function Produk($id)

	{
		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();

		$data['tampil_data_kontak_addres']=$this->M_crud_kontak->tampil_data_kontak_addres();
		$data['tampil_data_kontak_nomber_phone']=$this->M_crud_kontak->tampil_data_kontak_nomber_phone();
		$data['tampil_data_kontak_email']=$this->M_crud_kontak->tampil_data_kontak_email();

		//kategori produk
		$data['tampil_data_kat_produk']=$this->M_crud_kat_produk->tampil_data_kat_produk();
		//kategori produk


	

		//Detail produk
		$data['tampil_produk_detail']=$this->M_crud_produk->tampil_data_produk_detail($id);
		//Detail produk
		
		$this->load->view('detail_produk',$data);

	}



	





}





/* copy reg juhendra utama*/


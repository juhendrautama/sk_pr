<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_baner');
			$this->load->model('M_crud_profil');
			$this->load->model('M_crud_kontak');
			$this->load->model('M_crud_kat_produk');
			$this->load->model('M_crud_produk');
			$this->load->model('M_crud_transaki');
			$this->load->library('curl');
		}

	

	public function index()

	{
		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();

		$data['tampil_data_kontak_addres']=$this->M_crud_kontak->tampil_data_kontak_addres();
		$data['tampil_data_kontak_nomber_phone']=$this->M_crud_kontak->tampil_data_kontak_nomber_phone();
		$data['tampil_data_kontak_email']=$this->M_crud_kontak->tampil_data_kontak_email();


		//kategori produk
		$data['tampil_data_kat_produk']=$this->M_crud_kat_produk->tampil_data_kat_produk();
		//kategori produk

		//produk
		$data['tampil_data_produk']=$this->M_crud_produk->tampil_data_produk();
		//produk
		


		$this->load->view('home',$data);

	}


//// REST API
	public function Api_ambil_data(){
		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();

		$data['tampil_data_kontak_addres']=$this->M_crud_kontak->tampil_data_kontak_addres();
		$data['tampil_data_kontak_nomber_phone']=$this->M_crud_kontak->tampil_data_kontak_nomber_phone();
		$data['tampil_data_kontak_email']=$this->M_crud_kontak->tampil_data_kontak_email();


		$a = $this->curl->simple_get('https://api.jambiprov.go.id/pegawai/');
		$data['tampil_data_api'] = json_decode($a);

		$this->load->view('data_api_pegawai',$data);

	}


	public function Api_kirim_data(){
		
		header('Content-Type: application/json');
		$data=$this->M_crud_produk->tampil_data_produk()->result_object();
		
		
		echo json_encode($data);

	}

//// REST API
	





}





/* copy reg juhendra utama*/


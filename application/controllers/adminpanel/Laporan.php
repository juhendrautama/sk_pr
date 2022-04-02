<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Laporan extends CI_Controller {

	function __construct(){

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_produk');
			$this->load->model('M_crud_sopir');
			$this->load->model('M_crud_pelanggan');
			$this->load->library("session");
			$this->sessionku();

		}

public function index(){	
		$this->load->view('admin/admin_laporan');
	}

function sessionku (){
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}

public function Cari(){	
		if (isset($_POST['proses'])) {
			$data['tampil_data_sopir']=$this->M_crud_sopir->tampil_data_sopir();
			$data['tampil_data_cari_laporan']=$this->M_crud_produk->tampil_data_cari_laporan();
			$this->load->view('admin/admin_laporan',$data);
		}else{
			redirect('adminpanel/Laporan');
		}
	}
public function Cetak_laporan($tgl1,$tgl2){	
		$data['tampil_data_cari_laporan']=$this->M_crud_produk->cetak_laporan($tgl1,$tgl2);
		$this->load->view('admin/cetak_laporan',$data);
	}


/* copy reg juhendra utama*/

}





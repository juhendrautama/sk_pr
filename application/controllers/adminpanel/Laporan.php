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
function sessionku (){
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}

//laporan penjualan		
public function Penjualan(){	
	if (isset($_POST['proses'])) {
		$data['tampil_data_sopir']=$this->M_crud_sopir->tampil_data_sopir();
		$data['tampil_data_cari_laporan']=$this->M_crud_produk->tampil_data_cari_laporan();
		$this->load->view('admin/admin_laporan',$data);
	}else{
		$this->load->view('admin/admin_laporan');
	}
}

public function Cetak_laporan($tgl1,$tgl2){	
		$data['tampil_data_cari_laporan']=$this->M_crud_produk->cetak_laporan($tgl1,$tgl2);
		$this->load->view('admin/cetak_laporan',$data);
	}
//laporan penjualan	


//laporan Pelanggan		
public function Pelanggan(){	
	if (isset($_POST['proses'])) {
		$data['tampil_data_pelanggan_lap']=$this->M_crud_pelanggan->tampil_data_pelanggan_lap();
		$this->load->view('admin/admin_laporan_pelanggan',$data);
	}else{
		$this->load->view('admin/admin_laporan_pelanggan');
	}
	
}

public function Cetak_laporan_pelanggan($tgl1,$tgl2){	
	$data['cetak_laporan_pelanggan']=$this->M_crud_pelanggan->cetak_laporan_pelanggan($tgl1,$tgl2);
	$this->load->view('admin/cetak_laporan_pelanggan',$data);
}
//laporan Pelanggan	


//laporan invoice		
public function Invoice(){	
	if (isset($_POST['proses'])) {
		$data['tampil_data_lap_invoice']=$this->M_crud_produk->tampil_data_lap_invoice();
		$this->load->view('admin/admin_laporan_invoice',$data);
	}else{
		$this->load->view('admin/admin_laporan_invoice');
	}
}

public function Cetak_laporan_invoice($id_pesanan,$kode_pesanan){	
	$data['tampil_data_invoice']=$this->M_crud_produk->tampil_data_invoice($id_pesanan);
	$data['tampil_data_pesanan']=$this->M_crud_produk->tampil_data_detail_pesanan($kode_pesanan);
	$this->load->view('admin/cetak_laporan_invoice',$data);
}
//laporan invoice	

/* copy reg juhendra utama*/

}





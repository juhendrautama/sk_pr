<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Data_pembelian extends CI_Controller {

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
		$data['tampil_data_sopir']=$this->M_crud_sopir->tampil_data_sopir();
		$data['tampil_data_pembelian']=$this->M_crud_produk->tampil_data_pembelian();
		$this->load->view('admin/admin_data_pembelian',$data);
	}

function sessionku (){
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}

//konfiramsi pembelian
public function Simpan_data_konfirmasi(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_produk->Simpan_data_konfirmasi();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Data_pembelian";
					</script>
				<?php }
			}else{
				redirect('/Data_pembelian');
			}
	}

public function Proses_kirim_barang(){
		if(isset($_POST['proses'])){
		$id_sopir=$this->db->escape_str($this->input->post('id_sopir'));	
		$hasil=$this->M_crud_sopir->Ubah_status_sopir($id_sopir);
		$hasil2=$this->M_crud_produk->Simpan_data_pengiriman($hasil);
		if ($hasil2){ ?>
				<script type="text/javascript">
						alert('Barang Dikirim');window.location="<?php echo base_url() ?>adminpanel/Data_pembelian";
					</script>
				<?php }
			}else{
				redirect('/Data_pembelian');
			}
	}	



public function Proses_cetak_invoice(){
		if(isset($_POST['proses'])){
		$kode_pesanan=$this->db->escape_str($this->input->post('kode_pesanan'));	
		$hasil2=$this->M_crud_produk->Proses_cetak_invoice();
		if ($hasil2){ ?>
				<script type="text/javascript">
						alert('Data Disimpan');window.location="<?php echo base_url() ?>adminpanel/Data_pembelian/Cetak_invoice/<?php echo $kode_pesanan ?>";
					</script>
				<?php }
			}else{
				redirect('/Data_pembelian');
			}
	}		

public function Cetak_invoice($kode_pesanan){	
		
		$data['tampil_pesanan_invoice']=$this->M_crud_produk->tampil_pesanan_invoice($kode_pesanan);
		$data['tampil_detail_pesanan_invoice']=$this->M_crud_produk->tampil_detail_pesanan_invoice($kode_pesanan);
		$this->load->view('admin/cetak_invoice',$data);
	}	


/* copy reg juhendra utama*/
//konfiramsi pembelian

}





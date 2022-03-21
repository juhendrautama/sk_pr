<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Data_pembelian extends CI_Controller {

	function __construct(){

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_produk');
			$this->load->library("session");
			$this->sessionku();

		}

public function index(){	
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
				redirect('/Admin_kegiatan');
			}
	}

public function Proses_cetak_invoice(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_produk->Simpan_data_konfirmasi();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Data_pembelian";
					</script>
				<?php }
			}else{
				redirect('/Admin_kegiatan');
			}
	}	
//konfiramsi pembelian

}





/* copy reg juhendra utama*/


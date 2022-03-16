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


public function Simpan_data(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_pelanggan->Simpan_data();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan Silahkan Login');window.location="<?php echo base_url() ?>Home";
					</script>
				<?php }
			}else{
				redirect('/Admin_kegiatan');
			}
	}


}





/* copy reg juhendra utama*/


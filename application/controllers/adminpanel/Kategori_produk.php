<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Kategori_produk extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_kat_produk');
			$this->load->library("session");
			$this->sessionku();

		}

public function index()
	{	
		$data['tampil_data_kat_produk']=$this->M_crud_kat_produk->tampil_data_kat_produk();
		$this->load->view('admin/admin_data_kat_produk',$data);
	}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}

public function Simpan_data(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_kat_produk->Simpan_data();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Kategori_produk";
					</script>
				<?php }
			}else{
				redirect('/Kategori_produk');
			}
	}

public function Simpan_data_ubah(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_kat_produk->Simpan_data_ubah();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Kategori_produk";
					</script>
				<?php }
			}else{
				redirect('/Kategori_produk');
			}
	}	
	
function Hapus_data($id='0'){
		$hasil=$this->M_crud_kat_produk->Hapus_data($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						window.location="<?php echo base_url() ?>adminpanel/Kategori_produk";
					</script>
				<?php }
		}


}





/* copy reg juhendra utama*/


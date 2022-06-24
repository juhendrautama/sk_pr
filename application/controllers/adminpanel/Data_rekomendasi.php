<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Data_rekomendasi extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_produk');
			$this->load->model('M_crud_kat_produk');
			$this->load->library("session");
			$this->sessionku();

		}

public function index()
	{	
		$data['tampil_data_rekomen']=$this->M_crud_produk->tampil_data_rekomen();
		$this->load->view('admin/admin_data_rekomen',$data);
	}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}

public function Simpan_data(){
		if(isset($_POST['proses'])){
		$nama_file=$this->M_crud_produk->upload_gambar_rekomen();	
		$hasil=$this->M_crud_produk->Simpan_data_rekomen($nama_file);
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Data_rekomendasi";
					</script>
				<?php }
			}else{
				redirect('/Data_rekomendasi');
			}
	}

public function Simpan_data_ubah(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_produk->Simpan_data_ubah_rekomen();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Data_rekomendasi";
					</script>
				<?php }
			}else{
				redirect('/Data_rekomendasi');
			}
	}	
	
function Hapus_data($id='0'){
		$hasil=$this->M_crud_produk->Hapus_data_rekomen($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						window.location="<?php echo base_url() ?>adminpanel/Data_rekomendasi";
					</script>
				<?php }
		}


}





/* copy reg juhendra utama*/


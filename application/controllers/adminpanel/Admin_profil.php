<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_profil extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_profil');
			$this->load->library("session");
			$this->sessionku();

		}

public function index()
	{	
		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();
		$this->load->view('admin/admin_profil',$data);
	}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}




public function Tambah_profil(){
		$this->load->view('admin/admin_profil_add');
	}
	
public function Simpan_profil(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_profil->Simpan_profil();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Admin_profil";
					</script>
				<?php }
			}else{
				redirect('/Admin_kegiatan');
			}
	}

function Hapus_profil($id='0'){
		$hasil=$this->M_crud_profil->Hapus_profil($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						window.location="<?php echo base_url() ?>adminpanel/Admin_profil";
					</script>
				<?php }
		}
public function Ubah_profil($id){
		$data['tampil_data_profil_id']=$this->M_crud_profil->tampil_data_profil_id($id);
		$this->load->view('admin/admin_profil_edit',$data);

	}
public function Simpan_ubah($id){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_profil->Simpan_ubah($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Admin_profil";
					</script>
				<?php }
			}else{
				redirect('/Admin_kegiatan');
			}
	}	

}





/* copy reg juhendra utama*/


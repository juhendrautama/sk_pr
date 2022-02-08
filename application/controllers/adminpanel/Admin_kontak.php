<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_kontak extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_kontak');
			$this->load->library("session");
			$this->sessionku();

		}

public function index()
	{	
		$data['tampil_data_kontak']=$this->M_crud_kontak->tampil_data_kontak();
		$this->load->view('admin/admin_kontak',$data);
	}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}




public function Tambah_kontak(){
		$this->load->view('admin/admin_kontak_add');
	}
	
public function Simpan_kontak(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_kontak->Simpan_kontak();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Admin_kontak";
					</script>
				<?php }
			}else{
				redirect('/Admin_kontak');
			}
	}

public function Ubah_kontak($id){
		$data['tampil_data_kontak_id']=$this->M_crud_kontak->tampil_data_kontak_id($id);
		$this->load->view('admin/admin_kontak_edit',$data);

	}
public function Simpan_ubah_kontak($id){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_kontak->Simpan_ubah_kontak($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan');window.location="<?php echo base_url() ?>adminpanel/Admin_kontak";
					</script>
				<?php }
			}else{
				redirect('/Admin_kontak');
			}
	}	

function Hapus_kontak($id='0'){
		$hasil=$this->M_crud_kontak->Hapus_kontak($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						window.location="<?php echo base_url() ?>adminpanel/Admin_kontak";
					</script>
				<?php }
		}
	

}





/* copy reg juhendra utama*/


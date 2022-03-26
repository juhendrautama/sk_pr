<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Data_sopir extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_admin');
			$this->load->model('M_crud_sopir');
			$this->load->library("session");
			$this->sessionku();

		}

public function index()
	{	
		$data['tampil_data_sopir']=$this->M_crud_sopir->tampil_data_sopir();
		$this->load->view('admin/admin_data_sopir',$data);
	}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('adminpanel/Login_akses'); }
		}


public function Simpan_data(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_sopir->Simpan_data();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan ');window.location="<?php echo base_url() ?>adminpanel/Data_sopir";
					</script>
				<?php }
			}else{
				redirect('/home');
			}
	}

public function Simpan_data_ubah(){
		if(isset($_POST['proses'])){
		$hasil=$this->M_crud_sopir->Simpan_data_ubah();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Diubah ');window.location="<?php echo base_url() ?>adminpanel/Data_sopir";
					</script>
				<?php }
			}else{
				redirect('/home');
			}
	}

function Hapus_data($id='0'){
		$hasil=$this->M_crud_sopir->Hapus_data($id);
		if ($hasil){ ?>
				<script type="text/javascript">
						window.location="<?php echo base_url() ?>adminpanel/Data_sopir";
					</script>
				<?php }
		}

}





/* copy reg juhendra utama*/


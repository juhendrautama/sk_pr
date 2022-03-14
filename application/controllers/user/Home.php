<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_pelanggan');
			$this->load->library("session");
			$this->sessionku();

		}

	

	

public function index()

	{
		$this->load->view('user/home');

	}

function sessionku ()

	{
		$berhasil=$this->session->userdata('login');
		if (!isset($berhasil) || $berhasil !=true )
		{ redirect('user/Login_akses'); }
	}






//profil pelanggan
public function Profil($id)

	{
		$data['tampil_data_profil_user']=$this->M_crud_pelanggan->tampil_data_profil_user($id);
		$this->load->view('user/profil',$data);

	}

public function Simpan_ubah(){
		if(isset($_POST['proses'])){
		$id=$this->db->escape_str($this->input->post('id_pelanggan'));	
		$hasil=$this->M_crud_pelanggan->Simpan_ubah();
		if ($hasil){ ?>
				<script type="text/javascript">
						alert('Data Tersimpan ');window.location="<?php echo base_url() ?>user/Home/Profil/<?php echo $id; ?>";
					</script>
				<?php }
			}else{
				redirect('/Admin_kegiatan');
			}
	}

//profil pelanggan	





}





/* copy reg juhendra utama*/


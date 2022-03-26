<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_produk');
			$this->load->model('M_crud_pelanggan');
			$this->load->model('M_crud_sopir');
			$this->load->library("session");
			$this->sessionku();

		}

	

	

public function index()

	{
		$this->load->view('user/home');

	}

function sessionku ()

	{
		$berhasil=$this->session->userdata('login_user');
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

//data order
public function Data_pesanan($id)
	{
		$data['tampil_data_pesanan_user']=$this->M_crud_produk->tampil_data_pesanan_user($id);
		$this->load->view('user/data_pesanan',$data);

	}
public function Detail_pesanan($id)

	{
		$data['tampil_detail_pesanan_user']=$this->M_crud_produk->tampil_detail_pesanan_user($id);
		$this->load->view('user/detail_pesanan',$data);

	}	
//data order



}





/* copy reg juhendra utama*/


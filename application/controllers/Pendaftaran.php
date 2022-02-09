<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Pendaftaran extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_pelanggan');

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


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Transaksi extends CI_Controller {

	function __construct()

		{

			parent::__construct();
			$this->load->model('M_crud_transaki');
			$this->load->model('M_crud_baner');
			$this->load->model('M_crud_profil');
			$this->load->model('M_crud_kontak');
			$this->load->model('M_crud_kat_produk');
			$this->load->model('M_crud_produk');

		}


public function Simpan_data_keranjang(){
		if(isset($_POST['proses_keranjang'])){
		$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));	
		$hasil=$this->M_crud_transaki->Simpan_data_keranjang();
		if ($hasil){ ?>
					<script type="text/javascript">
						window.location="<?php echo base_url() ?>Transaksi/Keranjang/<?php echo $id_pelanggan ?>";
					</script>
				<?php }
			}else{
				redirect('/Home');
			}
	}

	public function Keranjang($id='')
	{
		
		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();

		$data['tampil_data_kontak_addres']=$this->M_crud_kontak->tampil_data_kontak_addres();
		$data['tampil_data_kontak_nomber_phone']=$this->M_crud_kontak->tampil_data_kontak_nomber_phone();
		$data['tampil_data_kontak_email']=$this->M_crud_kontak->tampil_data_kontak_email();

		//kategori produk
		$data['tampil_data_kat_produk']=$this->M_crud_kat_produk->tampil_data_kat_produk();
		//kategori produk


		$data['tampil_data_keranjang_pel']=$this->M_crud_transaki->tampil_data_keranjang_pel($id);
		$this->load->view('keranjang',$data);

	}	
public function hitung_jumlah_pesanan(){
		if(isset($_POST['kurang_1'])){
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));	
			$hasil=$this->M_crud_transaki->proses_kurang_pesanan();
			if ($hasil){ ?>
						<script type="text/javascript">
							window.location="<?php echo base_url() ?>Transaksi/Keranjang/<?php echo $id_pelanggan ?>";
						</script>
					<?php }
		}else if(isset($_POST['tambah_1'])) {
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));	
			$hasil=$this->M_crud_transaki->proses_tambah_pesanan();
			if ($hasil){ ?>
						<script type="text/javascript">
							window.location="<?php echo base_url() ?>Transaksi/Keranjang/<?php echo $id_pelanggan ?>";
						</script>
					<?php }	
		}else{
				redirect('/Home');
		}
	}	


	public function Proses_beli()
	{

		$data['tampil_data_profil']=$this->M_crud_profil->tampil_data_profil();

		$data['tampil_data_kontak_addres']=$this->M_crud_kontak->tampil_data_kontak_addres();
		$data['tampil_data_kontak_nomber_phone']=$this->M_crud_kontak->tampil_data_kontak_nomber_phone();
		$data['tampil_data_kontak_email']=$this->M_crud_kontak->tampil_data_kontak_email();

		//kategori produk
		$data['tampil_data_kat_produk']=$this->M_crud_kat_produk->tampil_data_kat_produk();
		//kategori produk

		$id=$this->db->escape_str($this->input->post('id_pelanggan'));
		$data['kode_pesanan'] = $this->M_crud_transaki->kode_pesanan();
		$data['tampil_data_keranjang_pel']=$this->M_crud_transaki->tampil_data_keranjang_pel($id);
		$this->load->view('proses_beli',$data);

	}	



}





/* copy reg juhendra utama*/


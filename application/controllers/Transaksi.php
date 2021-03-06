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
			$this->load->model('M_crud_sopir');
			$this->load->library("session");
			$this->sessionku();

		}

function sessionku ()

		{
			$berhasil=$this->session->userdata('login_user');
			if (!isset($berhasil) || $berhasil !=true )
			{ redirect('Home'); }
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
		}else if(isset($_POST['hapus_data_keranjang'])) {
			$id_detail_pesanan=$this->db->escape_str($this->input->post('id_detail_pesanan'));	
			$hasil=$this->M_crud_transaki->hapus_data_keranjang($id_detail_pesanan);
			if ($hasil){ ?>
						<script type="text/javascript">
							window.location="<?php echo base_url() ?>Home/#portfolio";
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

public function Simpan_pesanan(){
	if(isset($_POST['proses'])){
				
		//simpan detail pesanan	
		$id_detail_pesanan=$this->db->escape_str($this->input->post('id_detail_pesanan'));
	 	$total_con=count($id_detail_pesanan);
		for ($i=0; $i < $total_con; $i++) { 
			$data = array(
				'status' =>$this->input->post('status')[$i],
				'kode_pesanan' =>$this->input->post('kode_pesanan')[$i], 
			);
			$where = array(
				'id_detail_pesanan' =>$this->input->post('id_detail_pesanan')[$i],
			);
	 		$sql1=$this->M_crud_transaki->Simpan_pesanan_detail($where,$data,'tbl_detail_pesanan');
		}
		//simpan detail pesanan	


		//simpan pesanan
		$nama_file=$this->M_crud_transaki->upload_bukti($sql1);
		$sql2=$this->M_crud_transaki->Simpan_pesanan($sql1,$nama_file);	
		//simpan pesanan

		 if ($sql2){ ?>
					<script type="text/javascript">
						alert('DATA TERSIMPAN');window.location="<?php echo base_url() ?>Home";
					</script>
				<?php }


			}else{
				redirect('/Home');
			}
	}

//proses kirim ulang bukti pembayaran
	public function Kirim_ulang(){
		if(isset($_POST['proses'])){
		$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));	
		$nama_file2=$this->M_crud_transaki->upload_bukti2();
		$hasil=$this->M_crud_transaki->Kirim_ulang($nama_file2);
		if ($hasil){ ?>
					<script type="text/javascript">
						window.location="<?php echo base_url() ?>user/Home/Data_pesanan/<?php echo $id_pelanggan ?>";
					</script>
				<?php }
			}else{
				redirect('/Home');
			}
	}
//proses kirim ulang bukti pembayaran

//proses terima barang
	public function Terima_barang($id_pesanan,$kode_pesanan,$id_pelanggan,$id_sopir){
		$hasil1=$this->M_crud_transaki->Terima_barang($id_pesanan,$kode_pesanan,$id_pelanggan);
		$hasil=$this->M_crud_sopir->Ubah_status_sopir2($id_sopir,$hasil1);
		if ($hasil){ ?>
					<script type="text/javascript">
						alert('DATA TERSIMPAN');window.location="<?php echo base_url() ?>user/Home/Data_pesanan/<?php echo $id_pelanggan ?>";
					</script>
				<?php }
			
	}


}





/* copy reg juhendra utama*/


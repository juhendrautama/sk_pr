<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_produk extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}

//data rekomendasi
function ambil_jumlah_slider_id(){
			
	$sql=$this->db->query("select max(id_rekomen) as jumlah from tbl_rekomendasi");
	return $sql->row();
	
}

function tampil_data_rekomen(){
	$sql=$this->db->query("select	* FROM tbl_rekomendasi  ");
	return $sql;
}
function upload_gambar_rekomen(){
	$config['upload_path'] = 'img/rekomen';
	$config['allowed_types'] = '*';
	$config['max_size']	= '1000000';
	$config['max_width']  = '1000000';
	$config['max_height']  = '1000000';
	$this->load->library('upload',$config);


	
	
if ( ! $this->upload->do_upload()){
	$this->load->view('admin/admin_data_rekomen');

}
}

function Simpan_data_rekomen(){
	$judul=$this->db->escape_str($this->input->post('judul'));
	$dt=$this->upload->data();
	$file=$dt['orig_name'];
	$ket=$this->db->escape_str($this->input->post('ket'));
	$tgl=Date("Y-m-d");
	$sql=$this->db->query("
		INSERT INTO `tbl_rekomendasi` (
			`id_rekomen`,
			`judul`,
			`file`,
			`ket`,
			`tgl`
		)
		VALUES
			(
			'$',
			'$judul',
			'$file',
			'$ket',
			'$tgl'
			);
	");
return $sql ;	
}
function Simpan_data_ubah_rekomen(){
	$id_rekomen=$this->db->escape_str($this->input->post('id_rekomen'));
	$judul=$this->db->escape_str($this->input->post('judul'));
	$ket=$this->db->escape_str($this->input->post('ket'));
	$sql=$this->db->query("
			UPDATE
			  `tbl_rekomendasi`
			SET
			  `judul` = '$judul',
			  `ket` = '$ket'
			WHERE `id_rekomen` = '$id_rekomen';
	");
return $sql ;	
}

function Hapus_data_rekomen($id=''){

$this->db->where('id_rekomen',$id);
$query = $this->db->get('tbl_rekomendasi');
$row = $query->row();
unlink("img/rekomen/$row->file");
$hasil=$this->db->query("delete from tbl_rekomendasi where id_rekomen = '$id' ");
return $hasil;
} 

//data rekomendasi

function tampil_data_produk(){
			$sql=$this->db->query("select	id_produk,id_kategori,kode_produk,nama_produk,stok,harga,keterangan,tgl_tambah,gambar FROM tbl_produk ");
			return $sql;
		}

function tampil_data_produk_id($id){
			$sql=$this->db->query("select	* FROM tbl_produk where id_produk='$id'");
			return $sql;
		}		


function buat_kode()   {    
  $this->db->select('RIGHT(tbl_produk.kode_produk,2) as kode', FALSE);
  $this->db->order_by('id_produk','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('tbl_produk');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "0".$kodemax;     
  return $kodejadi;  
 }	

function upload_gambar(){
			$config['upload_path'] = 'img/gambar_produk';
			$config['allowed_types'] = '*';
			$config['max_size']	= '10000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';
			$this->load->library('upload',$config);
		

			
			
		if ( ! $this->upload->do_upload()){
			$this->load->view('admin/admin_data_produk');

		}
		}

function Simpan_data(){
			$dt=$this->upload->data();
			$gambar=$dt['orig_name'];
			$kode_produk=$this->db->escape_str($this->input->post('kode_produk'));
			$nama_produk=$this->db->escape_str($this->input->post('nama_produk'));
			$id_kategori=$this->db->escape_str($this->input->post('id_kategori'));
			$stok=$this->db->escape_str($this->input->post('stok'));
			$harga=$this->db->escape_str($this->input->post('harga'));
			$keterangan=$this->db->escape_str($this->input->post('keterangan'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `kode_produk`,`nama_produk`, `stok`, `harga`, `keterangan`,`tgl_tambah`,`gambar`) 
				VALUES ('', '$id_kategori', '$kode_produk','$nama_produk', '$stok', '$harga','$keterangan','$tgl','$gambar');
			");
		return $sql ;	
		}

function Simpan_data_ubah(){
			$id_produk=$this->db->escape_str($this->input->post('id_produk'));
			$nama_produk=$this->db->escape_str($this->input->post('nama_produk'));
			$id_kategori=$this->db->escape_str($this->input->post('id_kategori'));
			$stok=$this->db->escape_str($this->input->post('stok'));
			$harga=$this->db->escape_str($this->input->post('harga'));
			$keterangan=$this->db->escape_str($this->input->post('keterangan'));
			$sql=$this->db->query("
					UPDATE
					  `tbl_produk`
					SET
					  `id_kategori` = '$id_kategori',
					  `nama_produk` = '$nama_produk',
					  `stok` = '$stok',
					  `harga` = '$harga',
					  `keterangan` = '$keterangan'
					WHERE `id_produk` = '$id_produk';
			");
		return $sql ;	
		}		

function Hapus_data($id=''){

			$this->db->where('id_produk',$id);
		  $query = $this->db->get('tbl_produk');
		  $row = $query->row();

		  unlink("img/gambar_produk/$row->gambar");

			$hasil=$this->db->query("delete from tbl_produk where id_produk = '$id' ");
			return $hasil;
		} 



///halaman depan
		function tampil_data_produk_detail($id=''){
			$sql=$this->db->query("select	id_produk,id_kategori,kode_produk,nama_produk,stok,harga,keterangan,tgl_tambah,gambar FROM tbl_produk where id_produk='$id' ");
			return $sql->row();
		}

		function tampil_produk_per_kat($id=''){
			$sql=$this->db->query("select	id_produk,id_kategori,kode_produk,nama_produk,stok,harga,keterangan,tgl_tambah,gambar FROM tbl_produk where id_kategori='$id' ");
			return $sql;
		}

		function tampil_data_stok($id=''){
			$sql=$this->db->query("select	stok FROM tbl_produk where id_produk='$id' ");
			return $sql;
		}		


///halaman depan		

//proses dasbor data order
		function tampil_data_pesanan_user($id=''){
			$sql=$this->db->query("select	* FROM tbl_pesanan where id_pelanggan='$id' ");
			return $sql;
		}
		function tampil_detail_pesanan_user($id=''){
			$sql=$this->db->query("select	* FROM tbl_detail_pesanan where kode_pesanan='$id' ");
			return $sql;
		}
//proses dasbor data order

//proses data pembelian admin
	function tampil_data_pembelian(){
			$sql=$this->db->query("select	id_pesanan, id_pelanggan, kode_pesanan, bukti_pembayaran, jumlah_pesan, total_harga, tanggal_pesan, status, id_sopir, kode_invoice, tgl_invoice, no_urut_kode_invoice FROM tbl_pesanan  ");
			return $sql;
		}
	function Simpan_data_konfirmasi(){
			$id_pesanan=$this->db->escape_str($this->input->post('id_pesanan'));
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
			$kode_pesanan=$this->db->escape_str($this->input->post('kode_pesanan'));
			$status=$this->db->escape_str($this->input->post('status'));
			$sql=$this->db->query("
					UPDATE
					  `tbl_pesanan`
					SET
					  `status` = '$status'
					WHERE `id_pesanan` = '$id_pesanan' and  `id_pelanggan` ='$id_pelanggan' and `kode_pesanan`='$kode_pesanan';
			");
		return $sql ;	
		}		

	function Simpan_data_pengiriman(){
			$id_pesanan=$this->db->escape_str($this->input->post('id_pesanan'));
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
			$kode_pesanan=$this->db->escape_str($this->input->post('kode_pesanan'));
			$id_sopir=$this->db->escape_str($this->input->post('id_sopir'));
			$sql=$this->db->query("
					UPDATE
					  `tbl_pesanan`
					SET

					  `status` = 'Di Kirim',
					  `id_sopir` = '$id_sopir'
					WHERE `id_pesanan` = '$id_pesanan' and  `id_pelanggan` ='$id_pelanggan' and `kode_pesanan`='$kode_pesanan';
			");
		return $sql ;	
		}			
//proses data pembelian admin		


//data invoice
function tampil_pesanan_invoice($kode_pesanan){
			$sql=$this->db->query("select	* FROM tbl_pesanan where kode_pesanan='$kode_pesanan' ");
			return $sql->row();
		}
	function tampil_detail_pesanan_invoice($kode_pesanan=''){
			$sql=$this->db->query("select	* FROM tbl_detail_pesanan where kode_pesanan='$kode_pesanan' ");
			return $sql;
		}
	function Proses_cetak_invoice(){
			$id_pesanan=$this->db->escape_str($this->input->post('id_pesanan'));
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
			$kode_pesanan=$this->db->escape_str($this->input->post('kode_pesanan'));
			$kode_invoice=$this->db->escape_str($this->input->post('kode_invoice'));
			$no_urut_kode_invoice=$this->db->escape_str($this->input->post('no_urut_kode_invoice'));
			$tgl_invoice=Date("Y-m-d");
			$sql=$this->db->query("
					UPDATE
					  `tbl_pesanan`
					SET
					  `kode_invoice` = '$kode_invoice',
					  `tgl_invoice` = '$tgl_invoice',
					  `no_urut_kode_invoice` = '$no_urut_kode_invoice'
					WHERE `id_pesanan` = '$id_pesanan' and  `id_pelanggan` ='$id_pelanggan' and `kode_pesanan`='$kode_pesanan';
			");
		return $sql ;	
		}		

function buat_kode_invoice()   {    
  $this->db->select('RIGHT(tbl_pesanan.no_urut_kode_invoice,2) as kode', FALSE);
  $this->db->order_by('no_urut_kode_invoice','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('tbl_pesanan');      //cek dulu apakah ada sudah ada kode di tabel.    
  if($query->num_rows() <> 0){       
   //jika kode ternyata sudah ada.      
   $data = $query->row();      
   $kode = intval($data->kode) + 1;     
  }
  else{       
   //jika kode belum ada      
   $kode = 1;     
  }
  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
  $kodejadi = "0".$kodemax;     
  return $kodejadi;  
 }	
	
//data invoice		



 ///qury laporan
 	function tampil_data_pembelian_laporan(){
			$sql=$this->db->query("select	* FROM tbl_pesanan  ");
			return $sql;
		}
	function tampil_data_pesanan($kode_pesanan){
			$sql=$this->db->query("select	* FROM tbl_pesanan where kode_pesanan='$kode_pesanan' ");
			return $sql->row();
		}	

	function tampil_data_cari_laporan(){
			$tgl1=$this->db->escape_str($this->input->post('tgl1'));
			$tgl2=$this->db->escape_str($this->input->post('tgl2'));
			$sql=$this->db->query("SELECT	* FROM tbl_pesanan WHERE tgl_invoice BETWEEN '$tgl1' AND '$tgl2'");
			return $sql;
		}		

	function cetak_laporan($tgl1,$tgl2){
			$sql=$this->db->query("SELECT	* FROM tbl_pesanan WHERE tgl_invoice BETWEEN '$tgl1' AND '$tgl2'");
			return $sql;
		}	

//laporan invoice
function tampil_data_lap_invoice(){
	$tgl1=$this->db->escape_str($this->input->post('tgl1'));
	$tgl2=$this->db->escape_str($this->input->post('tgl2'));
	$sql=$this->db->query("SELECT * FROM tbl_pesanan WHERE no_urut_kode_invoice IS NOT NULL AND tgl_invoice BETWEEN '$tgl1' AND '$tgl2'");
	return $sql;
}

function tampil_data_invoice($id_pesanan){
	$sql=$this->db->query("SELECT	* FROM tbl_pesanan WHERE id_pesanan='$id_pesanan' ");
	return $sql->row();
}

function tampil_data_detail_pesanan($kode_pesanan){
	$sql=$this->db->query("SELECT	* FROM tbl_detail_pesanan WHERE kode_pesanan='$kode_pesanan' ");
	return $sql;
}
//laporan invoice			
		
		
	

}

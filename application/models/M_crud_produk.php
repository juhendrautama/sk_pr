<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_produk extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}



function tampil_data_produk(){
			$sql=$this->db->query("select	id_produk,id_kategori,kode_produk,nama_produk,stok,harga,keterangan,tgl_tambah,gambar FROM tbl_produk ");
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
			$sql=$this->db->query("select	id_pesanan, id_pelanggan, kode_pesanan, bukti_pembayaran, jumlah_pesan, total_harga, tanggal_pesan, status, no_telpon_super FROM tbl_pesanan  ");
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
//proses data pembelian admin		


}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_transaki extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}



//transaksi keranjang
function Simpan_data_keranjang(){
		$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
		$id_produk=$this->db->escape_str($this->input->post('id_produk'));
		$nama_produk=$this->db->escape_str($this->input->post('nama_produk'));
		$jumlah_pesanan=$this->db->escape_str($this->input->post('jumlah_pesanan'));
		$harga=$this->db->escape_str($this->input->post('harga'));
		$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_detail_pesanan` (
				  `id_detail_pesanan`,
				  `id_pelanggan`,
				  `id_produk`,
				  `kode_pesanan`,
				  `nama_produk`,
				  `jumlah_pesanan`,
				  `harga`,
				  `tgl`,
				  `status`
				)
				VALUES
				  (
				    '',
				    '$id_pelanggan',
				    '$id_produk',
				    '',
				    '$nama_produk',
				    '$jumlah_pesanan',
				    '$harga',
				    '$tgl',
				    'K'
				  );
			");
		return $sql ;	
		}
function tampil_data_keranjang_pel($id){
			$sql=$this->db->query("select	* FROM tbl_detail_pesanan where id_pelanggan='$id' and status='K' ");
			return $sql;
		}	
function tot_data_keranjang_pel($id_pelanggan){
			$sql=$this->db->query("SELECT COUNT(id_detail_pesanan) AS total FROM tbl_detail_pesanan WHERE id_pelanggan='$id_pelanggan' and status='K' ");
			return $sql;
		}

function proses_kurang_pesanan(){
		$id_detail_pesanan=$this->db->escape_str($this->input->post('id_detail_pesanan'));
		$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
		$id_produk=$this->db->escape_str($this->input->post('id_produk'));
		$jumlah_pesanan=$this->db->escape_str($this->input->post('jumlah_pesanan'));
		$total_pesanan=$jumlah_pesanan-1;
		$sql=$this->db->query("
		UPDATE
		  `tbl_detail_pesanan`
		SET
		  `jumlah_pesanan` = '$total_pesanan'
		WHERE `id_detail_pesanan` = '$id_detail_pesanan' AND `id_pelanggan` = '$id_pelanggan' AND `id_produk` = '$id_produk';
		");
		return $sql ;	
		}

function proses_tambah_pesanan(){
		$id_detail_pesanan=$this->db->escape_str($this->input->post('id_detail_pesanan'));
		$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
		$id_produk=$this->db->escape_str($this->input->post('id_produk'));
		$jumlah_pesanan=$this->db->escape_str($this->input->post('jumlah_pesanan'));
		$total_pesanan=$jumlah_pesanan+1;
		$sql=$this->db->query("
		UPDATE
		  `tbl_detail_pesanan`
		SET
		  `jumlah_pesanan` = '$total_pesanan'
		WHERE `id_detail_pesanan` = '$id_detail_pesanan' AND `id_pelanggan` = '$id_pelanggan' AND `id_produk` = '$id_produk';
		");
		return $sql ;	
		}		

function tampil_data_stok_order($id){

			$sql=$this->db->query("SELECT sum(jumlah_pesanan) as tot_pesanan FROM tbl_detail_pesanan where status='O' and id_produk='$id' ");
			return $sql;
		}	

function hapus_data_keranjang($id_detail_pesanan=''){
			$hasil=$this->db->query("delete from tbl_detail_pesanan where id_detail_pesanan = '$id_detail_pesanan' ");
			return $hasil;
		} 

//transaksi keranjang
		




function kode_pesanan_detail()   {    
  $this->db->select('RIGHT(tbl_detail_pesanan.kode_pesanan,2) as kode', FALSE);
  $this->db->order_by('id_detail_pesanan','DESC');    
  $this->db->limit(1);     
  $query = $this->db->get('tbl_detail_pesanan');      //cek dulu apakah ada sudah ada kode di tabel.    
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


 function kode_pesanan()   {    
  $this->db->select('RIGHT(tbl_pesanan.kode_pesanan,2) as kode', FALSE);
  $this->db->order_by('id_pesanan','DESC');    
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



//proses simpan pesanan detail
 function Simpan_pesanan_detail($where,$data,$table){
 		$this->db->where($where);
		$sql=$this->db->update($table,$data);
		return $sql;	
		}
//proses simpan pesanan detail




	function upload_bukti(){
			$config['upload_path'] = 'img/bukti_bayar';
			$config['allowed_types'] = '*';
			$config['max_size']	= '100000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';
			$this->load->library('upload',$config);
			
			
		if ( ! $this->upload->do_upload()){
			$this->load->view('proses_beli');
		}
		}			

 

function Simpan_pesanan(){
		$kode_pesanan2=$this->db->escape_str($this->input->post('kode_pesanan2'));
		$id_pelanggan2=$this->db->escape_str($this->input->post('id_pelanggan2'));
		$dt=$this->upload->data();
		$bukti_pembayaran=$dt['orig_name'];
		$jumlah_pesan2=$this->db->escape_str($this->input->post('jumlah_pesan2'));
		$total_harga2=$this->db->escape_str($this->input->post('total_harga2'));
		$tanggal_pesan2=Date("Y-m-d");
		$status2=$this->db->escape_str($this->input->post('status2'));
		$sql=$this->db->query("
						INSERT INTO `tbl_pesanan` (
						  `id_pesanan`,
						  `id_pelanggan`,
						  `kode_pesanan`,
						  `bukti_pembayaran`,
						  `jumlah_pesan`,
						  `total_harga`,
						  `tanggal_pesan`,
						  `status`
						)
						VALUES
						  (
						    '',
						    '$id_pelanggan2',
						    '$kode_pesanan2',
						    '$bukti_pembayaran',
						    '$jumlah_pesan2',
						    '$total_harga2',
						    '$tanggal_pesan2',
						    '$status2'
						  )
			");
		return $sql ;	
		}		

	

		function upload_bukti2(){
			$config['upload_path'] = 'img/bukti_bayar';
			$config['allowed_types'] = '*';
			$config['max_size']	= '100000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';
			$this->load->library('upload',$config);
			
			
		if ( ! $this->upload->do_upload()){
			$this->load->view('user/data_pesanan');
		}
		}			

		function Kirim_ulang($id=''){
			$dt=$this->upload->data();
			$bukti_pembayaran=$dt['orig_name'];
			$id_pesanan=$this->db->escape_str($this->input->post('id_pesanan'));
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
			$kode_pesanan=$this->db->escape_str($this->input->post('kode_pesanan'));

			$this->db->where('id_pesanan',$id_pesanan);
			$query = $this->db->get('tbl_pesanan');
			$row = $query->row();

			unlink("img/bukti_bayar/$row->bukti_pembayaran");

			$sql=$this->db->query("
			UPDATE
					  `tbl_pesanan`
					SET
					`bukti_pembayaran` = '$bukti_pembayaran',
					  `status` = 'Pemabayaran Terverifikasi'
					WHERE `id_pesanan` = '$id_pesanan' and  `id_pelanggan` ='$id_pelanggan' and `kode_pesanan`='$kode_pesanan'; 
			");
		return $sql ;	
		}


		function Terima_barang($id_pesanan,$kode_pesanan,$id_pelanggan){

			$sql=$this->db->query("
			UPDATE
					  `tbl_pesanan`
					SET
					  `status` = 'Selesai'
					WHERE `id_pesanan` = '$id_pesanan' and  `id_pelanggan` ='$id_pelanggan' and `kode_pesanan`='$kode_pesanan'; 
			");
		return $sql ;	
		}


}

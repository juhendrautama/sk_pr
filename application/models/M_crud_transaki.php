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
		$total_harga=$this->db->escape_str($this->input->post('total_harga'));
		$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_keranjang` (
				  `id_keranjang`,
				  `id_pelanggan`,
				  `id_produk`,
				  `nama_produk`,
				  `jumlah_pesanan`,
				  `total_harga`,
				  `tgl`
				)
				VALUES
				  (
				    '',
				    '$id_pelanggan',
				    '$id_produk',
				    '$nama_produk',
				    '$jumlah_pesanan',
				    '$total_harga',
				    '$tgl'
				  );
			");
		return $sql ;	
		}
function tampil_data_keranjang_pel($id){
			$sql=$this->db->query("select	* FROM tbl_keranjang where id_pelanggan='$id' ");
			return $sql;
		}		
//transaksi keranjang

}

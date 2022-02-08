<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_kat_produk extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}



function tampil_data_kat_produk(){
			$sql=$this->db->query("select	id_kategori,nama,tgl FROM tbl_kategori_produk ");
			return $sql;
		}


function Simpan_data(){
			$nama=$this->db->escape_str($this->input->post('nama'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_kategori_produk` (`id_kategori`, `nama`, `tgl`) VALUES ('', '$nama', '$tgl');
			");
		return $sql ;	
		}

function Simpan_data_ubah(){
			$id_kategori=$this->db->escape_str($this->input->post('id_kategori'));
			$nama=$this->db->escape_str($this->input->post('nama'));
			$sql=$this->db->query("
					UPDATE
					`tbl_kategori_produk`
					SET
					  `nama` = '$nama'
					WHERE `id_kategori` = '$id_kategori';
			");
		return $sql ;	
		}		
function Hapus_data($id=''){
			$hasil=$this->db->query("delete from tbl_kategori_produk where id_kategori = '$id' ");
			return $hasil;
		} 

//tampil kategori depan
function tampil_kat_id($id){
			$sql=$this->db->query("select	id_kategori,nama,tgl FROM tbl_kategori_produk where id_kategori='$id' ");
			return $sql->row();
		}		
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_kontak extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

function tampil_data_kontak(){
			$sql=$this->db->query("select	* FROM tbl_kontak ");
			return $sql;
		}




function Simpan_kontak(){
			$nama_kontak=$this->db->escape_str($this->input->post('nama_kontak'));
			$isi=$this->db->escape_str($this->input->post('isi'));
		
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_kontak` (`id_kontak`, `nama_kontak`, `isi`, `tgl`) VALUES ('', '$nama_kontak', '$isi', '$tgl');
			");
		return $sql ;	
		}
		

function tampil_data_kontak_id($id){
			$sql=$this->db->query("select	* FROM tbl_kontak where id_kontak='$id' ");
			return $sql->row();
		}		
			
function Simpan_ubah_kontak($id=''){
			$nama_kontak=$this->db->escape_str($this->input->post('nama_kontak'));
			$isi=$this->db->escape_str($this->input->post('isi'));
			$sql=$this->db->query("
			
			UPDATE
			`tbl_kontak`
			SET
			  `nama_kontak` = '$nama_kontak',
			  `isi` = '$isi'
			WHERE `id_kontak` = '$id';
			
			");
		return $sql ;	
		}

function Hapus_kontak($id=''){
			$hasil=$this->db->query("delete from tbl_kontak where id_kontak = '$id' ");
			return $hasil;
		} 


function tampil_data_kontak_addres(){
			$sql=$this->db->query("select	* FROM tbl_kontak where nama_kontak='ADDRESS' ");
			return $sql;
		}

function tampil_data_kontak_nomber_phone(){
			$sql=$this->db->query("select	* FROM tbl_kontak where nama_kontak='PHONE NUMBER' ");
			return $sql;
		}

function tampil_data_kontak_email(){
			$sql=$this->db->query("select	* FROM tbl_kontak where nama_kontak='EMAIL' ");
			return $sql;
		}				

}

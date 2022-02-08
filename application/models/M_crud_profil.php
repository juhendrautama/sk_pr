<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_profil extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}



function tampil_data_profil(){
			$sql=$this->db->query("select	* FROM tbl_profil ");
			return $sql;
		}




function Simpan_profil(){
			$nama=$this->db->escape_str($this->input->post('nama'));
			$isi=$this->db->escape_str($this->input->post('isi'));
		
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_profil` (`id_profil`, `nama`, `isi`, `tgl`) VALUES ('', '$nama', '$isi', '$tgl');
			");
		return $sql ;	
		}
		
function Hapus_profil($id=''){
			$hasil=$this->db->query("delete from tbl_profil where id_profil = '$id' ");
			return $hasil;
		} 
function tampil_data_profil_id($id){
			$sql=$this->db->query("select	* FROM tbl_profil where id_profil='$id' ");
			return $sql->row();
		}		
			
function Simpan_ubah($id=''){
			$nama=$this->db->escape_str($this->input->post('nama'));
			$isi=$this->db->escape_str($this->input->post('isi'));
			$sql=$this->db->query("
			
			UPDATE
			`tbl_profil`
			SET
			  `nama` = '$nama',
			  `isi` = '$isi'
			WHERE `id_profil` = '$id';
			
			");
		return $sql ;	
		}


///depan
		function tampil_data_profil_id2($id3){
			$sql=$this->db->query("select	* FROM tbl_profil where id_profil='$id3' ");
			return $sql->row();
		}

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_sopir extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

function tampil_data_sopir(){
			$sql=$this->db->query("select	id_sopir, nama, no_tlp, plat, status FROM tbl_sopir ");
			return $sql;
		}

function tampil_id_sopir($id){
			$sql=$this->db->query("select	id_sopir, nama, no_tlp, plat, status FROM tbl_sopir where id_sopir='$id' ");
			return $sql->row();
		}		


function Simpan_data(){
			$nama=$this->db->escape_str($this->input->post('nama'));
			$no_tlp=$this->db->escape_str($this->input->post('no_tlp'));
			$plat=$this->db->escape_str($this->input->post('plat'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
			INSERT INTO `tbl_sopir` (
				  `id_sopir`,
				  `nama`,
				  `no_tlp`,
				  `plat`,
				  `tgl`,
				  `status`
				)
				VALUES
				  (
				    '',
				    '$nama',
				    '$no_tlp',
				    '$plat',
				    '$tgl',
				    '1'
				  );		
				
			");
		return $sql ;	
		}

function Simpan_data_ubah(){
			$id_sopir=$this->db->escape_str($this->input->post('id_sopir'));
			$nama=$this->db->escape_str($this->input->post('nama'));
			$no_tlp=$this->db->escape_str($this->input->post('no_tlp'));
			$plat=$this->db->escape_str($this->input->post('plat'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
			UPDATE
			  `tbl_sopir`
			SET
			  `nama` = '$nama',
			  `no_tlp` = '$no_tlp',
			  `plat` = '$plat',
			  `tgl` = '$tgl'
			WHERE `id_sopir` = '$id_sopir';


				
			");
		return $sql ;	
		}

function Hapus_data($id=''){


			$hasil=$this->db->query("delete from tbl_sopir where id_sopir = '$id' ");
			return $hasil;
		} 

//proses ubah status sopir

function Ubah_status_sopir(){
			$id_sopir=$this->db->escape_str($this->input->post('id_sopir'));
			$sql=$this->db->query("
			UPDATE
			  `tbl_sopir`
			SET
			  `status` = '2'
			WHERE `id_sopir` = '$id_sopir';


				
			");
		return $sql ;	
		}

function Ubah_status_sopir2($id_sopir){
			$sql=$this->db->query("
			UPDATE
			  `tbl_sopir`
			SET
			  `status` = '1'
			WHERE `id_sopir` = '$id_sopir';


				
			");
		return $sql ;	
		}				

}

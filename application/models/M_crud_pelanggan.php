<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_pelanggan extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}



function tampil_data_pelanggan(){
			$sql=$this->db->query("select	id_pelanggan,nama,jenis_kel,tgl_lahir,alamat,no_telpon,email,pass FROM tbl_pelanggan ");
			return $sql;
		}
function Simpan_data(){
			$nama=$this->db->escape_str($this->input->post('nama'));
			$jenis_kel=$this->db->escape_str($this->input->post('jenis_kel'));
			$tgl_lahir=$this->db->escape_str($this->input->post('tgl_lahir'));
			$alamat=$this->db->escape_str($this->input->post('alamat'));
			$no_telpon=$this->db->escape_str($this->input->post('no_telpon'));
			$email=$this->db->escape_str($this->input->post('email'));
			$pass=$this->db->escape_str($this->input->post('pass'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama`, `jenis_kel`,`tgl_lahir`, `alamat`, `no_telpon`, `email`,`pass`) 
				VALUES ('', '$nama', '$jenis_kel','$tgl_lahir', '$alamat', '$no_telpon','$email','$pass');
			");
		return $sql ;	
		}



}

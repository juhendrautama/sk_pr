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
			$pass=md5($_POST['pass']);
			$pass_samaran=$this->db->escape_str($this->input->post('pass'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama`, `jenis_kel`,`tgl_lahir`, `alamat`, `no_telpon`, `email`,`pass`,`pass_samaran`,`tgl`) 
				VALUES ('', '$nama', '$jenis_kel','$tgl_lahir', '$alamat', '$no_telpon','$email','$pass','$pass_samaran','$tgl');
			");
		return $sql ;	
		}

function cek (){	
		$email=$this->db->escape_str($this->input->post('email'));
		$pass=md5($_POST['pass']);
		$hsl=$this->db->query("select * from tbl_pelanggan where email='$email' and pass='$pass'");
		return $hsl;
	}


function tampil_data_profil_user($id){
			$sql=$this->db->query("select * FROM tbl_pelanggan where id_pelanggan='$id' ");
			return $sql->row();
		}	


//setting profil
function Simpan_ubah(){
			$id_pelanggan=$this->db->escape_str($this->input->post('id_pelanggan'));
			$nama=$this->db->escape_str($this->input->post('nama'));
			$jenis_kel=$this->db->escape_str($this->input->post('jenis_kel'));
			$tgl_lahir=$this->db->escape_str($this->input->post('tgl_lahir'));
			$alamat=$this->db->escape_str($this->input->post('alamat'));
			$no_telpon=$this->db->escape_str($this->input->post('no_telpon'));
			$email=$this->db->escape_str($this->input->post('email'));
			$pass=md5($_POST['pass']);
			$pass_samaran=$this->db->escape_str($this->input->post('pass'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
			UPDATE
			  `tbl_pelanggan`
			SET
			  `nama` = '$nama',
			  `jenis_kel` = '$jenis_kel',
			  `tgl_lahir` = '$tgl_lahir',
			  `alamat` = '$alamat',
			  `no_telpon` = '$no_telpon',
			  `email` = '$email',
			  `pass` = '$pass',
			  `pass_samaran` = '$pass_samaran',
			  `tgl` = 'tgl'
			WHERE `id_pelanggan` = '$id_pelanggan';
			");
		return $sql ;	
		}	
//setting profil			

}

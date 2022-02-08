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




}

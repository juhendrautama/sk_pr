<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_admin extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}
			
		function cek (){	
				$user=$this->db->escape_str($this->input->post('user'));
				$pass=md5($_POST['pass']);
				$hsl=$this->db->query("select * from tbl_admin where user='$user' and pass='$pass'");
				return $hsl;
			}
		function tampil_data_user_admin(){
			$sql=$this->db->query("select	* FROM tbl_admin ");
			return $sql;
		}
		function tampil_data_user_admin_id($id){
			$sql=$this->db->query("select	* FROM tbl_admin where id_admin='$id' ");
			return $sql->row();
		}	
function upload_gambar(){
			$config['upload_path'] = 'img';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '100000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';
			$this->load->library('upload',$config);
			
		if ( ! $this->upload->do_upload()){
		
			$this->load->view('admin/data_user_admin_add');
		}
		}
function Simpan_user(){
			$dt=$this->upload->data();
			$foto=$dt['orig_name'];
			$id_jabatan=$this->db->escape_str($this->input->post('id_jabatan'));
			$nama=$this->db->escape_str($this->input->post('nama'));
			$no_tlpn=$this->db->escape_str($this->input->post('no_tlpn'));
			$alamat=$this->db->escape_str($this->input->post('alamat'));
			$user=$this->db->escape_str($this->input->post('user'));
			$pass=md5($_POST['pass']);
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
				
				INSERT INTO `tbl_admin` (
				  `id_admin`,
				  `id_jabatan`,
				  `nama`,
				  `user`,
				  `pass`,
				  `alamat`,
				  `no_tlpn`,
				  `status`,
				  `foto`,
				  `tgl`
				)
				VALUES
				  (
				    '',
				    '$id_jabatan',
				    '$nama',
				    '$user',
				    '$pass',
				    '$alamat',
				    '$no_tlpn',
				    'user',
				    '$foto',
				    '$tgl'
				  );
			");
		return $sql ;	
		}









		function Tampil_data_user($id='0'){
			$sql=$this->db->query("select	* FROM tbl_admin where id_admin='$id' ");
			return $sql->row();
		}

		
			
		function Simpan_user_ubah($id=''){
			$id_jabatan=$this->db->escape_str($this->input->post('id_jabatan'));
			$nama=$this->db->escape_str($this->input->post('nama'));
			$no_tlpn=$this->db->escape_str($this->input->post('no_tlpn'));
			$alamat=$this->db->escape_str($this->input->post('alamat'));
			$user=$this->db->escape_str($this->input->post('user'));
			$pass=md5($_POST['pass']);
			$sql=$this->db->query("
			
			UPDATE
			`tbl_admin`
			SET
			  `id_jabatan` = '$id_jabatan',
			  `nama` = '$nama',
			  `user` = '$user',
			  `pass` = '$pass',
			  `alamat` = '$alamat',
			  `no_tlpn` = '$no_tlpn'
			WHERE `id_admin` = '$id';
			
			");
		return $sql ;	
		}

function Hapus_user($id=''){
			$this->db->where('id_admin',$id);
		    $query = $this->db->get('tbl_admin');
		    $row = $query->row();

		    unlink("img/$row->foto");

			$hasil=$this->db->query("delete from tbl_admin where id_admin = '$id' ");
			return $hasil;
		} 

}

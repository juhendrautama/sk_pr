<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_crud_baner extends CI_Model {

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

function tampil_data_baner(){
			$sql=$this->db->query("select	* FROM tbl_baner ");
			return $sql;
		}

function Upload_gambar(){
			$config['upload_path'] = 'img/gambar_baner';
			$config['allowed_types'] = '*';
			$config['max_size']	= '100000';
			$config['max_width']  = '100000';
			$config['max_height']  = '100000';
			$this->load->library('upload',$config);
			
		if ( ! $this->upload->do_upload()){
		
			$this->load->view('admin/admin_baner');
		}
		}

function Simpan_data_baner(){
			$dt=$this->upload->data();
			$gambar=$dt['orig_name'];
			$judul_baner=$this->db->escape_str($this->input->post('judul_baner'));
			$link=$this->db->escape_str($this->input->post('link'));
			$tgl=Date("Y-m-d");
			$sql=$this->db->query("
			INSERT INTO `tbl_baner` (
				  `id_baner`,
				  `judul_baner`,
				  `link`,
				  `gambar_baner`,
				  `tgl_baner`
				)
				VALUES
				  (
				    '',
				    '$judul_baner',
				    '$link',
				    '$gambar',
				    '$tgl'
				  );		
				
			");
		return $sql ;	
		}
function Hapus_baner($id=''){
			$this->db->where('id_baner',$id);
		    $query = $this->db->get('tbl_baner');
		    $row = $query->row();

		    unlink("img/gambar_baner/$row->gambar_baner");

			$hasil=$this->db->query("delete from tbl_baner where id_baner = '$id' ");
			return $hasil;
		} 

}

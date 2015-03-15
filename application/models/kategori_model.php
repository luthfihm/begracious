<?php 
	class Kategori_model extends CI_Model {
		function add_kategori($nama){
			$data = array(
				'nama' => $nama
			);
			$query = $this->db->insert('kategori',$data);
			return $query;
		}
		function get_all(){
			$query = $this->db->get('kategori');
			return $query->result();
		}
		function get_kategori($id){
			$this->db->where('id',$id);
			$query = $this->db->get('kategori');
			return $query->row()->nama;
		}
		function ubah_nama($id,$nama){
			$data = array(
				'nama' => $nama
			);
			$this->db->where('id',$id);
			$query = $this->db->update('kategori',$data);
			return $query;
		}
		function del_kategori($id){
			$query = $this->db->delete('kategori',array('id' => $id));
			//$query = $this->db->delete('barang',array('kategori' => $id));
			return $query;
		}
	}
 ?>
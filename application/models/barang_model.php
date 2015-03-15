<?php 
	class Barang_model extends CI_Model {
		function add_barang ($data){
			$query = $this->db->insert('barang',$data);
			return $query;
		}
		function get_by_id ($id){
			$this->db->where('id',$id);
			$query = $this->db->get('barang');
			return $query->row();
		}
		function get_prev ($id){
			$query = $this->db->query("SELECT * FROM barang WHERE id<$id ORDER BY id DESC LIMIT 0,1");
			$query->row()->id;
		}
		function get_by_kat ($kat,$lim,$offset){
			$this->db->limit($lim,$offset);
			$this->db->where('kategori',$kat);
			$query = $this->db->get('barang');
			return $query;
		}
		function get_all ($lim,$offset){
			$this->db->limit($lim,$offset);
			$this->db->order_by("id","desc");
			$query = $this->db->get('barang');
			return $query;
		}
		function update ($id,$data){
			$this->db->where('id',$id);
			$query = $this->db->update('barang',$data);
			return $query;
		}
		function delete ($id){
			$query = $this->db->delete('barang',array('id' => $id));
			return $query;
		}
	}
 ?>
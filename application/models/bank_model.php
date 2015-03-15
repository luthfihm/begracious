<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_model extends CI_Model {

	function Add($data)
	{
		$query = $this->db->insert('bank', $data);
		return $query;
	}

	function GetAll()
	{
		$query = $this->db->get('bank');
		return $query->result();
	}

	function GetById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bank');
		return $query->row();
	}

	function Update($id,$data)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('bank', $data);
		return $query;
	}

	function Del($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('bank');
		return $query;
	}

}

/* End of file bank_model.php */
/* Location: ./application/models/bank_model.php */ ?>
<?php 

	
	class Cart_model extends CI_Model {
	
		function add($data)
		{
			$query = $this->db->insert('cart',$data);
			return $query;
		}

		function SetQuantity($id,$quantity)
		{
			$this->db->where('id', $id);
			$data = array('quantity' => $quantity );
			$query = $this->db->update('cart', $data);
			return $query;
		}

		function get_by_user($id_user)
		{
			$this->db->where('id_user', $id_user);
			$query = $this->db->get('cart');
			return $query->result();
		}

		function del($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->delete('cart');
			return $query;
		}

		function total($id_user)
		{
			$this->db->where('id_user', $id_user);
			$query = $this->db->get('cart');
			return $query->num_rows();
		}
	
	}
	
	/* End of file cart_model.php */
	/* Location: ./application/models/cart_model.php */
 ?>
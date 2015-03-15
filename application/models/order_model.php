<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {

	function AddOrder($data,$order_line)
	{
		$query = $this->db->insert('order', $data);
		$order_id = $this->db->query("SELECT MAX(`order_id`) as order_id FROM `order`")->row()->order_id;
		foreach ($order_line as $order_data) {
			$data = array(
				'order_id' => $order_id,
				'id_barang' => $order_data->id_barang,
				'ukuran' => $order_data->ukuran,
				'quantity' => $order_data->quantity
				);
			if ($query)
				$query = $this->db->insert('order_line', $data);
				$query = $this->cart_model->del($order_data->id);
		}
		return $query;
	}

	function GetOrder($order_id)
	{
		$this->db->where('order_id',$order_id);
		$query = $this->db->get('order');
		return $query->row();
	}

	function UpdateStatus($order_id,$status)
	{
		$data = array(
			'status' => $status
			);
		$this->db->where('order_id', $order_id);
		$query = $this->db->update('order', $data);
		return $query;
	}
	function UpdateShipping($order_id,$resi)
	{
		$data = array(
			'status' => '2',
			'resi' => $resi
			);
		$this->db->where('order_id', $order_id);
		$query = $this->db->update('order', $data);
		return $query;
	}

	function Validate($order_id)
	{
		$this->db->where('order_id',$order_id);
		$query = $this->db->get('order');
		if ($query->num_rows() > 0)
		{
			if ($query->row()->status != 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}
	}

	function GetAllOrder()
	{
		$this->db->order_by('time', 'desc');
		$query = $this->db->get('order');
		return $query->result();
	}

	function Detail($order_id)
	{
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('order_line');
		return $query->result();
	}

	function GetLastOrder($id_user)
	{
		$order_id = $this->db->query("SELECT MAX(`order_id`) as order_id FROM `order` WHERE id_user=$id_user")->row()->order_id;
		$this->db->where('order_id',$order_id);
		$query = $this->db->get('order');
		return $query->row();
	}
}

/* End of file order_model.php */
/* Location: ./application/models/order_model.php */

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {

	function Add($data)	
	{
		$query = $this->db->insert('payment', $data);
		return $query;
	}

	function GetAll()
	{
		$this->db->select('payment.order_id, bank.img_bank, payment.from, payment.account_name, payment.total, payment.date, payment.note, order.status');
		$this->db->from('payment');
		$this->db->join('order', 'order.order_id = payment.order_id');
		$this->db->join('bank', 'bank.id_bank = payment.id_bank');
		$this->db->order_by('date', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function GetByStat($status)
	{
		$this->db->select('payment.order_id, bank.img_bank, payment.from, payment.account_name, payment.total, payment.date, payment.note, order.status');
		$this->db->from('payment');
		$this->db->join('order', 'order.order_id = payment.order_id');
		$this->db->join('bank', 'bank.id_bank = payment.id_bank');
		if ($status == 'unconfirmed')
		{
			$this->db->where('order.status', $status);
		}
		else
		{
			$this->db->where('order.status !=','0');
		}
		$this->db->order_by('date', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
}

/* End of file payment_model.php */
/* Location: ./application/models/payment_model.php */
?>
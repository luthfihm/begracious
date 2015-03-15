<?php 
	// CRUD for user database
	class User_model extends CI_Model {
		function new_user ($data){
			$query = $this->db->insert('user',$data);
			return $query;
		}
		function get_user_by_id ($id){
			$this->db->where('id_user',$id);
			$query = $this->db->get('user');
			return $query->row();
		}
		function get_user_lim ($lim,$offset){
			$this->db->limit($lim,$offset);
			$this->db->order_by("id","asc");
			$query = $this->db->get('user');
			return $query->result();
		}
		function update_user ($id_user,$data){
			$this->db->where('id_user',$id_user);
			$query = $this->db->update('user',$data);
			return $query;
		}
		function del_user ($id){
			$query = $this->db->delete('user',array('id' => $id));
			return $query;
		}
		function validate_user($user,$pass){
			$this->db->where('username',$user);
			$pass_encrypted = md5($pass);
			$this->db->where('password',$pass_encrypted);
			$query = $this->db->get('user');
			if ($query->num_rows == 1)
			{
				$data = array(
					'id_user'	=> $query->row()->id_user,
					'username'	=> $user,
					'password'	=> $pass_encrypted
				);
				$this->session->set_userdata($data);
				return true;
			}else{
				return false;
			}
		}
		function current_user(){
			$id_user = $this->session->userdata('id_user');
			$this->db->where('id_user',$id_user);
			$query = $this->db->get('user');
			return $query->row();
		}
		function is_logged_in(){
			$this->db->where('username',$this->session->userdata('username'));
			$this->db->where('password',$this->session->userdata('password'));
			$query = $this->db->get('user');
			if ($query->num_rows == 1){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>
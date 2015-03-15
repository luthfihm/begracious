<?php 
	class Admin extends CI_Controller {
		function index(){
			if ($this->admin_model->is_logged_in()){
				redirect('admin/main');
			}else{
				redirect('admin/login');
			}
		}
		function login(){
			if (!$this->admin_model->is_logged_in()){
				$this->load->view('admin/login');
			}else{
				redirect('admin/main');
			}
		}
		function logout(){
			session_start();
			unset($_SESSION[md5('filemanager')]);
			$this->session->sess_destroy();
			session_destroy();
			redirect('admin');
		}
		function main(){
			if ($this->admin_model->is_logged_in()){
				$data['content'] = 'admin/main';
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}	
		}
		function barang($kat="all",$p="1"){
			if ($this->admin_model->is_logged_in()){
				$data['content'] = 'admin/barang';
				$data['kategori'] = $kat;
				$data['list_kategori'] = $this->kategori_model->get_all();
				$data['page'] = $p;
				if ($p <= 1){
					$data['prev'] = false;
				}else{
					$data['prev'] = true;
				}
				if ($kat == "all"){
					$data['next'] = ($this->barang_model->get_all(12,$p*12)->num_rows() > 0);
					$data['list_barang'] = $this->barang_model->get_all(12,($p-1)*12)->result();
				}else{
					$data['next'] = ($this->barang_model->get_by_kat($kat,12,$p*12)->num_rows() > 0);
					$data['list_barang'] = $this->barang_model->get_by_kat($kat,12,($p-1)*12)->result();
				}
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}
		}
		function order()
		{
			if ($this->admin_model->is_logged_in()){
				$data['order'] = $this->order_model->GetAllOrder();
				$data['content'] = 'admin/order';
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}
		}
		function edit_kat(){
			if ($this->admin_model->is_logged_in()){
				$id = $this->input->post('id_kategori');
				$nama = $this->input->post('nama_kategori');
				$jum = count($id);
				for ($i=0;$i<$jum;$i++){
					$query = $this->kategori_model->ubah_nama($id[$i],strtoupper($nama[$i]));
				}
				if($query){
					redirect('admin/barang');
				}
			}else{
				redirect('admin/login');
			}	
		}
		function bank(){
			if ($this->admin_model->is_logged_in()){
				$data['bank'] = $this->bank_model->GetAll();
				$data['content'] = 'admin/bank';
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}
		}
		function change_pass(){
			if ($this->admin_model->is_logged_in()){
				$data['content'] = 'admin/change_pass';
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}
		}
		function payment($status = 'all')
		{
			if ($this->admin_model->is_logged_in()){
				if ($status == 'all')
				{
					$data['payment'] = $this->payment_model->GetAll();
				}
				else if (($status == 'confirmed')||($status == 'unconfirmed'))
				{
					$data['payment'] = $this->payment_model->GetByStat($status);
				}
				$data['stat'] = $status;
				$data['content'] = 'admin/payment';
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}
		}
		function shipping(){
			if ($this->admin_model->is_logged_in()){
				$data['content'] = 'admin/shipping';
				$this->load->view('admin/page',$data);
			}else{
				redirect('admin/login');
			}
		}
	}
 ?>
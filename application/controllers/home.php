<?php 
	class Home extends CI_Controller {
		function index(){
			$data['list_kategori'] = $this->kategori_model->get_all();
			$data['list_barang'] = $this->barang_model->get_all(20,0)->result();
			$data['kat'] = 'all';
			$data['content'] = 'home';	
			$this->load->view('page',$data);
		}
		function logout(){
			$this->session->sess_destroy();
			redirect('');
		}
	}
 ?>
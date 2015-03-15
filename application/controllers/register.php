<?php 
	class Register extends CI_Controller {
		function index(){
			$data['list_kategori'] = $this->kategori_model->get_all();
			$data['kat'] = "all";
			$data['content'] = 'register';	
			$this->load->view('page',$data);
		}
	}
 ?>
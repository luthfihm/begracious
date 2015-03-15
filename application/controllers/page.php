<?php 
	class Page extends CI_Controller {
		function index($p = 1){
			$data['list_kategori'] = $this->kategori_model->get_all();
			$data['kat'] = "all";
			$data['list_barang'] = $this->barang_model->get_all(20,($p-1)*20)->result();
			$data['content'] = 'home';	
			$this->load->view('page',$data);
		}
		function logout(){
			$this->session->sess_destroy();
			redirect('');
		}
		function item($id){
			$data['list_kategori'] = $this->kategori_model->get_all();
			$data['item'] = $this->barang_model->get_by_id($id);
			$data['kat'] = 'all';
			$data['content'] = 'item';	
			$this->load->view('page',$data);
		}
		function kategori($kat){
			$data['list_kategori'] = $this->kategori_model->get_all();
			$data['kat'] = $kat;
			$data['list_barang'] = $this->barang_model->get_by_kat($kat,20,0)->result();
			$data['content'] = 'kategori';	
			$this->load->view('page',$data);
		}
		function cart(){
			if ($this->user_model->is_logged_in()){
				$data['list_kategori'] = $this->kategori_model->get_all();
				$data['cart'] = $this->cart_model->get_by_user($this->user_model->current_user()->id_user);
				$data['kat'] = 'all';
				$data['content'] = 'cart';	
				$this->load->view('page',$data);
			}else{
				redirect('page');
			}
		}
		function checkout()
		{
			if ($this->user_model->is_logged_in()){
				
				if ($this->input->post('id'))
				{
					$id = $this->input->post('id');
					$quantity = $this->input->post('quantity');
					$i = 0;
					foreach ($id as $id_cart) {
						$query = $this->cart_model->SetQuantity($id_cart,$quantity[$i]);
						$i++;
					}
				}
				$data['user'] = $this->user_model->current_user();
				$data['list_kategori'] = $this->kategori_model->get_all();
				$data['cart'] = $this->cart_model->get_by_user($this->user_model->current_user()->id_user);
				$data['kat'] = 'all';
				$data['content'] = 'checkout';	
				$this->load->view('page',$data);
			}else{
				redirect('page');
			}
		}
		function finish()
		{
			if ($this->user_model->is_logged_in()){
				$user = $this->user_model->current_user();
				$cart = $this->cart_model->get_by_user($user->id_user);
				$order = array(
					'id_user' => $user->id_user, 
					'alamat' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'kode_pos' => $this->input->post('kode_pos'),
					'pengiriman' => $this->input->post('pengiriman'),
					'diskon' => $this->input->post('diskon'),
					'subtotal' => $this->input->post('total'),
					'berat' => $this->input->post('berat'),
					'ongkir' => $this->input->post('ongkir'),
					'total' => $this->input->post('grand_total'),
					'status' => '0'
					);
				$query = $this->order_model->AddOrder($order,$cart);
				if ($query){
					$data['bank'] = $this->bank_model->GetAll();
					$data['order'] = $this->order_model->GetLastOrder($user->id_user);
					$data['user'] = $user;
					$data['list_kategori'] = $this->kategori_model->get_all();
					$data['kat'] = 'all';
					$data['content'] = 'finish';	
					$this->load->view('page',$data);
				}else{
					redirect('page/checkout');
				}
			}else{
				redirect('page');
			}
		}
		function payment()
		{
			if ($this->user_model->is_logged_in()){
				$data['list_kategori'] = $this->kategori_model->get_all();
				$data['kat'] = 'all';
				$data['bank'] = $this->bank_model->GetAll();
				$data['content'] = 'payment';
				$this->load->view('page',$data);
			}else{
				redirect('page');
			}
		}
	}
 ?>
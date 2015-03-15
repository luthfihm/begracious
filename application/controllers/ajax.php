<?php 
	class Ajax extends CI_Controller {
		function index(){

		}
		function login_admin(){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$query = $this->admin_model->validate($user,$pass);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function add_kategori(){
			$nama = strtoupper($this->input->post('nama'));
			$query = $this->kategori_model->add_kategori($nama);
			if($query){
				echo "true";
			}else{
				echo "false";
			}	
		}
		function add_barang(){
			$data = array(
				'nama'			=> $this->input->post('nama'),
				'harga'			=> $this->input->post('harga'),
				'harga_diskon'	=> '0',
				'ukuran'		=> $this->input->post('ukuran'),
				'keterangan'	=> $this->input->post('keterangan'),
				'bahan'			=> $this->input->post('bahan'),
				'stock'			=> $this->input->post('stock'),
				'status'		=> '1',
				'berat'			=> $this->input->post('berat'),
				'kategori'		=> $this->input->post('kategori'),
				'gambar'		=> $this->input->post('gambar'),
				'isfeatured'	=> '0'
			);
			$query = $this->barang_model->add_barang($data);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function edit_barang(){
			$data = array(
				'nama'			=> $this->input->post('nama'),
				'harga'			=> $this->input->post('harga'),
				'harga_diskon'	=> '0',
				'ukuran'		=> $this->input->post('ukuran'),
				'bahan'			=> $this->input->post('bahan'),
				'stock'			=> $this->input->post('stock'),
				'status'		=> '1',
				'berat'			=> $this->input->post('berat'),
				'kategori'		=> $this->input->post('kategori'),
				'gambar'		=> $this->input->post('gambar'),
				'isfeatured'	=> '0'
			);
			$id = $this->input->post('id');
			$query = $this->barang_model->update($id,$data);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function delete_barang(){
			$id = $this->input->post('id');
			$query = $this->barang_model->delete($id);
			if ($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function delete_kategori(){
			$id = $this->input->post('id');
			$query = $this->kategori_model->del_kategori($id);
			if ($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function get_xml_barang($id){
			$barang = $this->barang_model->get_by_id($id);
			//$this->load->view("admin/edit_barang",$data);
			echo json_encode($barang);
		}
		function change_pass()
		{
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$query = $this->admin_model->change_pass($user,$pass);
			if ($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function cek_pass(){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$query = $this->admin_model->validate($user,$pass);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function list_city($query){
			$list_city = $this->ongkir_model->GetCity($query);
			echo json_encode($list_city);
		}
		function GetOngkir()
		{
			$city = $this->input->post('kota');
			$weight = $this->input->post('berat');
			$service = $this->input->post('service');
			$ongkir = $this->ongkir_model->GetOngkir($city,$weight,$service);
			echo $ongkir;
		}
		function register(){
			$data = array(
				'nama'			=> $this->input->post('nama'),
				'username'		=> $this->input->post('username'),
				'password'		=> md5($this->input->post('password')),
				'no_hp'			=> $this->input->post('no_hp'),
				'alamat'		=> $this->input->post('alamat'),
				'kota'			=> $this->input->post('kota'),
				'kode_pos' 		=> $this->input->post('kode_pos')
			);
			$query = $this->user_model->new_user($data);
			if($query){
				echo "true";
			}else{
				echo "false";
			};
		}
		function login_user(){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$query = $this->user_model->validate_user($user,$pass);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
		}
		function add_cart(){
			$data = array(
				'id_user' => $this->user_model->current_user()->id_user,
				'id_barang' => $this->input->post('id_barang'),
				'ukuran' => $this->input->post('ukuran'),
				'quantity' => $this->input->post('quantity')
			);
			$query = $this->cart_model->add($data);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
			//echo $this->input->post('id_barang');
		}
		function del_cart(){
			$id = $this->input->post('id');
			$query = $this->cart_model->del($id);
			if($query){
				echo "true";
			}else{
				echo "false";
			}
		}

		function tambah_bank()
		{
			$data = array(
				'no_rek' => $this->input->post('no_rek'),
				'nama_bank' => $this->input->post('nama_bank'),
				'nama' => $this->input->post('nama'),
				'img_bank' => $this->input->post('img_bank')
				);
			$query = $this->bank_model->Add($data);
			if ($query)
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
		function validate_order_id()
		{
			$order_id = $this->input->post('order_id');
			$query = $this->order_model->Validate($order_id);
			if ($query)
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
		function payment()
		{
			$data = array(
				'order_id' => $this->input->post('order_id'),
				'id_bank' => $this->input->post('id_bank'),
				'from' => $this->input->post('from'),
				'account_name' => $this->input->post('account_name'),
				'total' => $this->input->post('total'),
				'date' => $this->input->post('date'),
				'note' => $this->input->post('note')
				);
			$query = $this->payment_model->Add($data);
			if ($query)
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
		function change_order_status()
		{
			$order_id = $this->input->post('order_id');
			$status = $this->input->post('status');
			$query = $this->order_model->UpdateStatus($order_id,$status);
			if ($query)
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
		function resi_order()
		{
			$order_id = $this->input->post('order_id');
			$resi = $this->input->post('resi');
			$query = $this->order_model->UpdateShipping($order_id,$resi);
			if ($query)
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}
 ?>
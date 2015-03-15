<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="100px">Order ID</th>
				<th width="300px">Data User</th>
				<th width="300px">Detail Pemesanan</th>
				<th width="250px">Rincian Biaya</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		foreach($order as $row){ 
			$user = $this->user_model->get_user_by_id($row->id_user);
			$orderline = $this->order_model->Detail($row->order_id);
		?>
			<tr>
				<td><?php echo $row->order_id; ?></td>
				<td>
					<?php 
						echo $user->nama."<br>";
						echo $user->username."<br>";
						echo $user->no_hp."<br>";
						echo $row->alamat."<br>";
						echo $row->kota."<br>";
						echo $row->kode_pos;
					 ?>
				</td>
				<td>
					<dl>
						<?php 
						foreach ($orderline as $item){ 
							$barang = $this->barang_model->get_by_id($item->id_barang);
						?>
						<dt><?php echo $barang->nama; ?></dt>
						<dd>Price : <?php echo $barang->harga; ?></dd>
						<dd>Discount : <?php echo $barang->harga_diskon; ?></dd>
						<dd>Size : <?php echo $item->ukuran; ?></dd>
						<dd>Quantity : <?php echo $item->quantity; ?></dd>
						<?php } ?>
					</dl>
				</td>
				<td>
					<div class="row">
						<div class="col-xs-6">Subtotal</div>
						<div class="col-xs-6">: Rp <?php echo $row->subtotal; ?></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Diskon</div>
						<div class="col-xs-6">: Rp <?php echo $row->diskon; ?></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Ongkos Kirim</div>
						<div class="col-xs-6">: Rp <?php echo $row->ongkir; ?></div>
					</div>
					<div class="row">
						<div class="col-xs-6">Total</div>
						<div class="col-xs-6">: Rp <?php echo $row->total; ?></div>
					</div>
				</td>
				<td>
					<?php
						if ($row->status == 0){
							echo "Belum Bayar";		
						}else if ($row->status == 1){
							echo "Sudah Bayar, belum kirim";		
						}else if ($row->status == 2){
							echo "Sudah Dikirim<br>";
							echo "Resi : ".$row->resi;
						}
					?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
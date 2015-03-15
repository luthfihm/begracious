<div class="container">	
	<div class="row">
		<div class="col-xs-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Payment Status</h3>
				</div>
				<ul class="nav nav-pills nav-stacked">
					<li <?php if ($stat=="all") echo "class='active'"; ?>><a href="<?php echo base_url('admin/payment'); ?>">All</a></li>
					<li <?php if ($stat=="confirmed") echo "class='active'"; ?>><a href="<?php echo base_url('admin/payment/confirmed'); ?>">Confirmed</a></li>
					<li <?php if ($stat=="unconfirmed") echo "class='active'"; ?>><a href="<?php echo base_url('admin/payment/unconfirmed'); ?>">Unconfirmed</a></li>
				</ul>
			</div>
		</div>
		<div class="col-xs-10">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="100px">Order ID</th>
						<th width="120px">Bank</th>
						<th width="200px">From</th>
						<th width="100px">Total</th>
						<th width="100px">Date</th>
						<th>Note</th>
						<th width="100px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($payment as $row) {?>
					<tr>
						<td><?php echo $row->order_id; ?></td>
						<td><img src="<?php echo $row->img_bank; ?>" height="20px" alt=""></td>
						<td>
							<?php echo $row->account_name; ?> - <?php echo $row->from; ?>
						</td>
						<td><?php echo $row->total; ?></td>
						<td><?php echo $row->date; ?></td>
						<td><?php echo $row->note; ?></td>
						<td>
							<?php if ($row->status == 0) { ?>
							<a href="#" onclick="conf_order(<?php echo $row->order_id; ?>); return false;">Confirm</a>
							<?php }else if (($row->status == 1)||($row->status == 2)){ ?>
							<a href="#" onclick="unconf_order(<?php echo $row->order_id; ?>); return false;">Unconfirm</a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	function conf_order(id)
	{
		if (confirm("Are you sure?")){
			$.ajax({
				type		: "POST",
				url 		: "<?php echo base_url('ajax/change_order_status'); ?>",
				data 		: {
					order_id : id,
					status : "1"
				},
				success		: function(html){
					if (html == "true"){
						window.location = location.href;
					}else{
						alert("Gagal");
					}
				}
			});
		}
	}
	function unconf_order(id)
	{
		if (confirm("Are you sure?")){
			$.ajax({
				type		: "POST",
				url 		: "<?php echo base_url('ajax/change_order_status'); ?>",
				data 		: {
					order_id : id,
					status : "0"
				},
				success		: function(html){
					if (html == "true"){
						window.location = location.href;
					}else{
						alert("Gagal");
					}
				}
			});
		}
	}
</script>
<div class="container">
	<div class="col-xs-6 col-xs-offset-3">
		<form class="form-horizontal" role="form" id="ship_form">
			<div class="form-group" align="center">
				<h3>Shipping</h3>
			</div>
			<div class="form-group">
				<label for="order_id" class="col-sm-3 control-label">Order ID</label>
				<div class="col-sm-5">
					<input type="text" name="order_id" class="form-control" id="order_id" placeholder="Order ID">
				</div>
			</div>
			<div class="form-group">
				<label for="resi" class="col-sm-3 control-label">Nomor Resi</label>
				<div class="col-sm-9">
					<input type="text" name="resi" class="form-control" id="resi" placeholder="Nomor Resi">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12" align="center">
					<input type="submit" class="btn btn-primary" value="Confirm">
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#ship_form").submit(function(){
			$.ajax({
				url   : "<?php echo base_url('ajax/validate_order_id') ?>",
		        type  : "POST",
		        data  : {
		          order_id : $("#order_id").val()
		        },
		        success : function(html){
		        	if (html == "true")
		        	{
		        		if ($("#resi").val() != "")
		        		{
		        			$.ajax({
		        				url   : "<?php echo base_url('ajax/resi_order') ?>",
						        type  : "POST",
						        data  : {
						          order_id : $("#order_id").val(),
						          resi 	   : $("#resi").val()
						        },
						        success : function(html){
						        	if (html == "true")
						        	{
						        		alert("Done!");
						        		window.location = "<?php echo base_url('admin/order'); ?>";
						        	}
						        	else
						        	{
						        		alert("Gagal");
						        	}
						        }
		        			});
		        		}
		        		else
		        		{
		        			alert("Data Belum Lengkap!");
		        		}
		        	}
		        	else
		        	{
		        		alert("Order ID tidak valid!");
		        	}
		        }
			});
			return false;
		});
	});
</script>
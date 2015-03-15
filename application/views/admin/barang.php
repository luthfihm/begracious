<div class="container">
	
	<div class="row">
		<div class="col-xs-2">
			<h4>KATEGORI <a href="#" data-toggle="modal" data-target="#edit-kategori"><span class="glyphicon glyphicon-cog pull-right"></span></a></h4>
			<ul class="nav nav-pills nav-stacked">
				<li class="<?php if ($kategori == 'all') echo 'active'; ?>"><a href="<?php echo base_url('admin/barang') ?>">ALL</a></li>
				<?php foreach ($list_kategori as $row) {?>
				<li class="<?php if ($kategori == $row->id) echo 'active'; ?>"><a href="<?php echo base_url('admin/barang').'/'.$row->id; ?>"><?php echo $row->nama; ?></a></li>
				<?php } ?>
				<li><a href="#" id="tambah-kategori"><span class="glyphicon glyphicon-plus"></span> Tambah Kategori</a></li>
				<li style="display:none;" id="tampil-form-kategori">
					<form class="form-inline" id="form-kategori" role="form">
						<div class="input-group">
      						<input type="text" class="form-control" id="nama-kategori" placeholder="Nama Kategori">
      						<span class="input-group-btn">
        						<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-plus"></span></button>
      						</span>
    					</div>
					</form>
				</li>
			</ul>
		</div>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12" align="center">
					<h4><a href="<?php if ($prev) echo base_url('admin/barang')."/".$kategori."/".($page-1); else echo '#'; ?>"><button class="btn btn-xs"><span class="glyphicon glyphicon-arrow-left"></span></button></a> <a href="#" data-toggle="modal" data-target="#modal-add-brg"><button class="btn btn-xs">Tambah Barang</button></a> <a href="<?php if ($next) echo base_url('admin/barang')."/".$kategori."/".($page+1); else echo '#'; ?>"><button class="btn btn-xs"><span class="glyphicon glyphicon-arrow-right"></span></button></a></h4>
				</div>
			</div>
			<div class="row">
				<?php $i=1; foreach ($list_barang as $row){ ?>
				<div class="col-sm-2 col-xs-4" align="center">
					<?php $img = explode(";",$row->gambar); ?>
					<a href="#" onclick="edit_barang('<?php echo $row->id; ?>')"  data-toggle="modal" data-target="#modal-edit-brg"><img src="<?php echo $img[0]; ?>" height="175px" width="100%">
					<h5><?php echo $row->nama; ?></h5></a>
					<button type="button" class="btn btn-xs" onclick="delete_barang(<?php echo $row->id; ?>)">Delete <span class="glyphicon glyphicon-trash"></span></button><br><br>
				</div>
				<?php $i++;} ?>
			</div>
		</div>
	</div>
</div>
<!-- Form Tambah Barang -->
<form class="form-horizontal" role="form" id="form-tambah-brg">
	<div class="modal fade" id="modal-add-brg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	  	<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title">Form Tambah Barang</h4>
	      		</div>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-7">
			        		<div class="form-group">
			        			<label for="new-nama-brg" class="col-sm-3 control-label">Nama Barang</label>
			        			<div class="col-sm-9">
			        				<input type="text" class="form-control" id="new-nama-brg" placeholder="Nama Barang">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-harga-brg" class="col-sm-3 control-label">Harga</label>
			        			<div class="col-sm-5">
			        				<div class="input-group">
				        				<span class="input-group-addon">IDR</span>
				        				<input type="text" class="form-control" id="new-harga-brg" placeholder="0">
			        				</div>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-ukuran-brg" class="col-sm-3 control-label">Ukuran</label>
			        			<div class="col-sm-5">
			        				<input type="text" class="form-control" id="new-ukuran-brg" placeholder="Ukuran">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-keterangan-brg" class="col-sm-3 control-label">Keterangan</label>
			        			<div class="col-sm-9">
			        				<textarea name="" class="tinymce-simple" id="new-keterangan-brg" rows="5"></textarea>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-bahan-brg" class="col-sm-3 control-label">Bahan</label>
			        			<div class="col-sm-9">
			        				<input type="text" class="form-control" id="new-bahan-brg" placeholder="Bahan">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-stock-brg" class="col-sm-3 control-label">Stock</label>
			        			<div class="col-sm-3">
			        				<input type="text" class="form-control" id="new-stock-brg" placeholder="Stock">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-berat-brg" class="col-sm-3 control-label">Berat</label>
			        			<div class="col-sm-4">
			        				<div class="input-group">
				        				<input type="text" class="form-control" id="new-berat-brg" placeholder="0.0">
				        				<span class="input-group-addon">kg</span>
			        				</div>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="new-kategori-brg" class="col-sm-3 control-label">Kategori</label>
			        			<div class="col-sm-6">
			        				<select id="new-kategori-brg" class="form-control">
			        					<option value="">- KATEGORI -</option>
			        					<?php foreach ($list_kategori as $row) { ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
			        					<?php } ?>
			        				</select>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="col-sm-5">
			        		<input type="hidden" id="jml_img" value="0">
			        		<div class="row" align="center">
			        			<label>Gambar</label>
			        			<br><br>
			        		</div>
			        		<div class="row">
			        			<div class="col-xs-4">
			        				<input type="hidden" id="img1">
			        				<div id="img1_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=img1'); ?>" class="iframe-btn" onclick="tampil(1)" id="add_img1">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        			<div class="col-xs-4" id="2" style="display:none;">
			        				<input type="hidden" id="img2">
			        				<div id="img2_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=img2'); ?>" class="iframe-btn" onclick="tampil(2)" id="add_img2">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        			<div class="col-xs-4" id="3" style="display:none;">
			        				<input type="hidden" id="img3">
			        				<div id="img3_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=img3'); ?>" class="iframe-btn" onclick="tampil(3)" id="add_img3">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        		</div>
			        		<div class="row" style="padding-top:40px;">
			        			<div class="col-xs-4" id="4" style="display:none;">
			        				<input type="hidden" id="img4">
			        				<div id="img4_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=img4'); ?>" class="iframe-btn" onclick="tampil(4)" id="add_img4">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        			<div class="col-xs-4" id="5" style="display:none;">
			        				<input type="hidden" id="img5">
			        				<div id="img5_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=img5'); ?>" class="iframe-btn" onclick="tampil(5)" id="add_img5">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        		</div>
			        	</div>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary" id="btn-new">Simpan</button>
	      		</div>
	    	</div>
		</div>
	</div>
</form>

<!-- Form Edit Barang -->
<form class="form-horizontal" role="form" id="form-edit-brg">
	<input type="hidden" id="edit-id-brg">
	<div class="modal fade" id="modal-edit-brg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	  	<div class="modal-dialog modal-lg">
	    	<div class="modal-content" id="content-edit-brg" style="display:none;">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title">Form Edit Barang</h4>
	      		</div>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-7">
			        		<div class="form-group">
			        			<label for="edit-nama-brg" class="col-sm-3 control-label">Nama Barang</label>
			        			<div class="col-sm-9">
			        				<input type="text" class="form-control" id="edit-nama-brg" placeholder="Nama Barang">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-harga-brg" class="col-sm-3 control-label">Harga</label>
			        			<div class="col-sm-5">
			        				<div class="input-group">
				        				<span class="input-group-addon">IDR</span>
				        				<input type="text" class="form-control" id="edit-harga-brg" placeholder="0">
			        				</div>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-ukuran-brg" class="col-sm-3 control-label">Ukuran</label>
			        			<div class="col-sm-5">
			        				<input type="text" class="form-control" id="edit-ukuran-brg" placeholder="Ukuran">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-keterangan-brg" class="col-sm-3 control-label">Keterangan</label>
			        			<div class="col-sm-9">
			        				<textarea name="" class="tinymce-simple" id="edit-keterangan-brg" rows="5"></textarea>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-bahan-brg" class="col-sm-3 control-label">Bahan</label>
			        			<div class="col-sm-9">
			        				<input type="text" class="form-control" id="edit-bahan-brg" placeholder="Bahan">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-stock-brg" class="col-sm-3 control-label">Stock</label>
			        			<div class="col-sm-3">
			        				<input type="text" class="form-control" id="edit-stock-brg" placeholder="Stock">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-berat-brg" class="col-sm-3 control-label">Berat</label>
			        			<div class="col-sm-4">
			        				<div class="input-group">
				        				<input type="text" class="form-control" id="edit-berat-brg" placeholder="0.0">
				        				<span class="input-group-addon">kg</span>
			        				</div>
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="edit-kategori-brg" class="col-sm-3 control-label">Kategori</label>
			        			<div class="col-sm-6">
			        				<select id="edit-kategori-brg" class="form-control">
			        					<option value="">- KATEGORI -</option>
			        					<?php foreach ($list_kategori as $row) { ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
			        					<?php } ?>
			        				</select>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="col-sm-5">
			        		<input type="hidden" id="edit_jml_img" value="0">
			        		<div class="row" align="center">
			        			<label>Gambar</label>
			        			<br><br>
			        		</div>
			        		<div class="row">
			        			<div class="col-xs-4">
			        				<input type="hidden" id="edit_img1">
			        				<div id="edit_img1_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=edit_img1'); ?>" class="iframe-btn" onclick="edit_tampil(1)" id="edit_add_img1">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        			<div class="col-xs-4" id="edit_2" style="display:none;">
			        				<input type="hidden" id="edit_img2">
			        				<div id="edit_img2_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=edit_img2'); ?>" class="iframe-btn" onclick="edit_tampil(2)" id="edit_add_img2">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        			<div class="col-xs-4" id="edit_3" style="display:none;">
			        				<input type="hidden" id="edit_img3">
			        				<div id="edit_img3_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=edit_img3'); ?>" class="iframe-btn" onclick="edit_tampil(3)" id="edit_add_img3">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        		</div>
			        		<div class="row" style="padding-top:40px;">
			        			<div class="col-xs-4" id="edit_4" style="display:none;">
			        				<input type="hidden" id="edit_img4">
			        				<div id="edit_img4_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=edit_img4'); ?>" class="iframe-btn" onclick="edit_tampil(4)" id="edit_add_img4">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        			<div class="col-xs-4" id="edit_5" style="display:none;">
			        				<input type="hidden" id="edit_img5">
			        				<div id="edit_img5_tampil" style="display:none;height:120px;" align="center">
			        					
			        				</div>
				        			<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=edit_img5'); ?>" class="iframe-btn" onclick="edit_tampil(5)" id="edit_add_img5">
					        			<div style="height:120px;border:dashed;padding-top:45px;" align="center">
					        				<span class="glyphicon glyphicon-plus"></span>
					        			</div>
				        			</a>
			        			</div>
			        		</div>
			        	</div>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary" id="btn-edit">Simpan</button>
	      		</div>
	    	</div>
		</div>
	</div>
</form>

<!-- Modal Edit Kategori -->
<form action="<?php echo base_url('admin/edit_kat') ?>" method="POST">
<div class="modal fade bs-modal-sm" id="edit-kategori" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
  	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
      		<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        	<h4 class="modal-title">Edit Kategori</h4>
	      	</div>
	      	<div class="modal-body">
	      		<?php foreach ($list_kategori as $row){ ?>
	      		<div class="input-group">
	      			<input type="hidden" name="id_kategori[]" value="<?php echo $row->id; ?>">
      				<input type="text" class="form-control" value="<?php echo $row->nama; ?>" name="nama_kategori[]">
      				<span class="input-group-btn">
        				<button class="btn btn-default" type="button" onclick="del_kat(<?php echo $row->id; ?>)"> <span class="glyphicon glyphicon-trash"></span></button>
      				</span>
    			</div>
    			<?php } ?>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="submit" class="btn btn-primary" id="btn-new">Simpan</button>
	      	</div>
    	</div>
  	</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tambah-kategori").click(function(){
			$("#tambah-kategori").hide();
			$("#tampil-form-kategori").show();
			$("#nama-kategori").focus();
		});
		$("#form-kategori").submit(function(){
			if ($("#nama-kategori").val() != ""){
				$.ajax({
					type	: "POST",
					url 	: "<?php echo base_url('ajax/add_kategori'); ?>",
					data	: {
						nama : $("#nama-kategori").val()
					},
					success	: function(html){
						if (html == 'true'){
							window.location = location.href;
						}else{
							$("#nama-kategori").focus();
						}
					},
					beforeSend : function(){
						
					}
				});
			}else{
				
			}
			return false;
		});
		$("#form-tambah-brg").submit(function(){
			var list_gambar = "";
			list_gambar += $("#img1").val()+";";
			list_gambar += $("#img2").val()+";";
			list_gambar += $("#img3").val()+";";
			list_gambar += $("#img4").val()+";";
			list_gambar += $("#img5").val()+";";
			if (($("#new-nama-brg").val() != "")&&
				($("#new-harga-brg").val() != "")&&
				($("#new-bahan-brg").val() != "")&&
				($("#new-stock-brg").val() != "")&&
				($("#new-berat-brg").val() != "")&&
				($("#new-kategori-brg").val() != "")&&
				($("#img1").val() != "")&&
				($("#new-ukuran-brg").val() != "")){
				$.ajax({
					type	: "POST",
					url 	: "<?php echo base_url('ajax/add_barang'); ?>",
					data	: {
						nama 		: $("#new-nama-brg").val(),
						harga 		: $("#new-harga-brg").val(),
						bahan 		: $("#new-bahan-brg").val(),
						stock 		: $("#new-stock-brg").val(),
						berat 		: $("#new-berat-brg").val(),
						kategori	: $("#new-kategori-brg").val(),
						ukuran 		: $("#new-ukuran-brg").val(),
						keterangan	: $("#new-keterangan-brg").val(),
						gambar 		: list_gambar
					},
					success	: function(html){
						if (html == 'true'){
							window.location = location.href;
						}else{
							alert("Perintah gagal dilakukan");
						}
					},
					beforeSend : function(){
						
					}
				});
			}else{
				alert("Data belum lengkap");
			}
			return false;
		});
		$("#form-edit-brg").submit(function(){
			var list_gambar = "";
			list_gambar += $("#edit_img1").val()+";";
			list_gambar += $("#edit_img2").val()+";";
			list_gambar += $("#edit_img3").val()+";";
			list_gambar += $("#edit_img4").val()+";";
			list_gambar += $("#edit_img5").val()+";";
			if (($("#edit-nama-brg").val() != "")&&
				($("#edit-harga-brg").val() != "")&&
				($("#edit-bahan-brg").val() != "")&&
				($("#edit-stock-brg").val() != "")&&
				($("#edit-berat-brg").val() != "")&&
				($("#edit-kategori-brg").val() != "")&&
				($("#edit_img1").val() != "")&&
				($("#edit-ukuran-brg").val() != "")){
				$.ajax({
					type	: "POST",
					url 	: "<?php echo base_url('ajax/edit_barang'); ?>",
					data	: {
						id 			: $("#edit-id-brg").val(),
						nama 		: $("#edit-nama-brg").val(),
						harga 		: $("#edit-harga-brg").val(),
						bahan 		: $("#edit-bahan-brg").val(),
						stock 		: $("#edit-stock-brg").val(),
						berat 		: $("#edit-berat-brg").val(),
						kategori	: $("#edit-kategori-brg").val(),
						ukuran		: $("#edit-ukuran-brg").val(),
						keterangan	: $("#edit-keterangan-brg").val(),
						gambar 		: list_gambar
					},
					success	: function(html){
						if (html == 'true'){
							window.location = location.href;
						}else{
							alert("Perintah gagal dilakukan");
						}
					},
					beforeSend : function(){
						
					}
				});
			}else{
				alert("Data belum lengkap");
			}
			return false;
		});
	});
	function edit_tampil(id){
		var field_id = "#edit_img"+id;
		var img_id = "#edit_img"+id+"_tampil";
		var add_button = "#edit_add_img" + id;
		var next = id + 1;
		var jml = $("#edit_jml_img").val();
		var loop = setInterval(function(){
			if ($(field_id).val() != ""){
				$(add_button).hide();
				$(img_id).show();
				$(img_id).html("<img src='"+$(field_id).val()+"' width='100%' height='100%'><button type='button' class='btn btn-xs' onclick='edit_del_img("+id+")'>Remove <span class='glyphicon glyphicon-trash'></span></button>");
				jml++;
				$("#edit_jml_img").val(jml);
				$("#edit_"+next).show();
				clearInterval(loop);
			}
		},100);
	}
	function tampil(id){
		var field_id = "#img"+id;
		var img_id = "#img"+id+"_tampil";
		var add_button = "#add_img" + id;
		var next = id + 1;
		var jml = $("#jml_img").val();
		var loop = setInterval(function(){
			if ($(field_id).val() != ""){
				$(add_button).hide();
				$(img_id).show();
				$(img_id).html("<img src='"+$(field_id).val()+"' width='100%' height='100%'><button type='button' class='btn btn-xs' onclick='del_img("+id+")'>Remove <span class='glyphicon glyphicon-trash'></span></button>");
				jml++;
				$("#jml_img").val(jml);
				$("#"+next).show();
				clearInterval(loop);
			}
		},100);
	}
	function del_img(id){
		var i = id;
		var jml = $("#jml_img").val();
		while (i < jml){
			$("#img"+i).val($("#img"+(i+1)).val());
			$("#img"+i+"_tampil").html("<img src='"+$("#img"+i).val()+"' width='100%' height='100%'><button type='button' class='btn btn-xs' onclick='del_img("+i+")'>Remove <span class='glyphicon glyphicon-trash'></span></button>");
			i++;
		}
		$("#img"+jml).val("");
		$("#img"+jml+"_tampil").hide();
		$("#add_img"+jml).show();
		var last = jml;
		last++;
		$("#"+last).hide();
		jml--;
		$("#jml_img").val(jml);
	}
	function edit_del_img(id){
		var i = id;
		var jml = $("#edit_jml_img").val();
		while (i < jml){
			$("#edit_img"+i).val($("#edit_img"+(i+1)).val());
			$("#edit_img"+i+"_tampil").html("<img src='"+$("#edit_img"+i).val()+"' width='100%' height='100%'><button type='button' class='btn btn-xs' onclick='edit_del_img("+i+")'>Remove <span class='glyphicon glyphicon-trash'></span></button>");
			i++;
		}
		$("#edit_img"+jml).val("");
		$("#edit_img"+jml+"_tampil").hide();
		$("#edit_add_img"+jml).show();
		var last = jml;
		last++;
		$("#edit_"+last).hide();
		jml--;
		$("#edit_jml_img").val(jml);
	}
	function delete_barang(id_barang){
		if (confirm("Yakin Untuk Menghapus?")){
			$.ajax({
				type	: "POST",
				url 	: "<?php echo base_url('ajax/delete_barang'); ?>",
				data	: {
					id : id_barang
				},
				success	: function(html){
					if (html == 'true'){
						window.location = location.href;
					}
				},
				beforeSend : function(){
					
				}
			});
		}
	}
	function edit_barang(id_barang){
		if ($("#edit_jml_img").val() > 0){
			for (var n=1;n<=$("#edit_jml_img").val();n++){
				edit_del_img(n);
			}
		}
		$.ajax({
            url: "<?php echo base_url('ajax/get_xml_barang'); ?>/"+id_barang,
            dataType: "json",
            success: function( data ){
				$("#edit-id-brg").val(data['id']);
				$("#edit-nama-brg").val(data['nama']);
				$("#edit-harga-brg").val(data['harga']);
				$("#edit-ukuran-brg").val(data['ukuran']);
				$("#edit-keterangan-brg").val(data['keterangan']);
				$("#edit-bahan-brg").val(data['bahan']);
				$("#edit-stock-brg").val(data['stock']);
				$("#edit-berat-brg").val(data['berat']);
				$("#edit-kategori-brg").val(data['kategori']);
				var img = data['gambar'].split(";");
				var jum = 0;
				for (var i=0;i<5;i++){
					if (img[i] != ""){
						var j = i+1;
						$("#edit_img"+j).val(img[i]);
						edit_tampil(i+1);
					}
				}
				$("#content-edit-brg").show();
			}
		});
	}
	function del_kat(id_kat){
		if (confirm("Yakin Untuk Menghapus?")){
			$.ajax({
				type	: "POST",
				url 	: "<?php echo base_url('ajax/delete_kategori'); ?>",
				data	: {
					id : id_kat
				},
				success	: function(html){
					if (html == 'true'){
						window.location = "<?php echo base_url('admin/barang'); ?>";
					}
				},
				beforeSend : function(){
					
				}
			});
		}
	}
</script>
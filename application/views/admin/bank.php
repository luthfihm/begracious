<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<table class="table table-hover">
				<thead>
					<tr>
						<th width="150px">Nama Bank</th>
						<th width="250px">Nomor Rekening</th>
						<th width="200px">Nama</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($bank as $row){ ?>
					<tr>
						<td><img src="<?php echo $row->img_bank; ?>" height="20px" alt=""></td>
						<td><?php echo $row->no_rek; ?></td>
						<td><?php echo $row->nama; ?></td>
						<td></td>
					</tr>
					<?php } ?>
				</tbody>
				<thead>	
					<tr>
						<td colspan="4">
							<div align="center">
								<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_tambah">Tambah Bank</button>
							</div>
						</td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<form class="form-horizontal" role="form" id="tambah">
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="TambahLabel">Tambah Bank</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
        			<label for="new-nama-bank" class="col-sm-3 control-label">Nama Bank</label>
        			<div class="col-sm-7">
        				<input type="text" class="form-control" id="new-nama-bank" placeholder="Nama Bank">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="new-rek-bank" class="col-sm-3 control-label">Rekening</label>
        			<div class="col-sm-9">
        				<input type="text" class="form-control" id="new-rek-bank" placeholder="Nomor Rekening Bank">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="new-an-bank" class="col-sm-3 control-label">Atas Nama</label>
        			<div class="col-sm-9">
        				<input type="text" class="form-control" id="new-an-bank" placeholder="Atas Nama">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="new-img-bank" class="col-sm-3 control-label">Gambar Bank</label>
        			<div class="col-sm-9">
						<div class="input-group">
							<input type="text" class="form-control" id="new-img-bank">
							<span class="input-group-btn">
								<a href="<?php echo base_url('filemanager/dialog.php?type=1&field_id=new-img-bank'); ?>" class="btn btn-default iframe-btn" type="button"><span class="glyphicon glyphicon-folder-open"></span></a>
							</span>
						</div>
        			</div>
        		</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Save">
			</div>
		</div>
	</div>
</div>
</form>

<script>
	$(document).ready(function(){
		$("#tambah").submit(function(){
			if (($("#new-nama-bank").val() != "")&&
				($("#new-rek-bank").val() != "")&&
				($("#new-an-bank").val() != "")&&
				($("#new-img-bank").val() != ""))
			{
				$.ajax({
					url 	: "<?php echo base_url('ajax/tambah_bank') ?>",
					type 	: "POST",
					data 	: {
						no_rek 		: $("#new-rek-bank").val(),
						nama_bank	: $("#new-nama-bank").val(),
						nama		: $("#new-an-bank").val(),
						img_bank	: $("#new-img-bank").val()
					},
					success	: function(html){
						if (html == "true")
						{
							window.location = location.href;
						}
						else
						{
							alert("Gagal!");
						}
					}
				});
			}	
			else
			{
				alert("Data Belum Lengkap!");
			}
		});
	});
</script>
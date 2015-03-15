<?xml version="1.0" encoding="utf-8"?>
<barangs>
	<barang>
		<id><?php echo $barang->id; ?></id>
		<nama><?php echo $barang->nama; ?></nama>
		<harga><?php echo $barang->harga; ?></harga>
		<ukuran><?php ecoh $barang->ukuran; ?></ukuran>
		<keterangan><?php echo $barang->keterangan; ?></keterangan>
		<bahan><?php echo $barang->bahan; ?></bahan>
		<stock><?php echo $barang->stock; ?></stock>
		<berat><?php echo $barang->berat; ?></berat>
		<kategori><?php echo $barang->kategori; ?></kategori>
		<?php 
		$img = explode(";",$barang->gambar); 
		for ($i=0;$i<5;$i++){
		?>
		<img<?php echo $i+1; ?>><?php echo $img[$i]; ?></img<?php echo $i+1; ?>>
		<?php } ?>
	</barang>
</barangs>
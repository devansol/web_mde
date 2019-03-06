<?php 
$length = count($result);
		// var_dump($result[0]->nama_barang);
		// exit();
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<div class="container">
	<?php for ($i=0;$i<$length;$i++) { ?>
<!-- 	<div class="detail-title">
		<h4><?php echo $result[$i]->nama_barang;?></h4>
	</div> -->

	<!-- <hr> -->


	
	<div class="detail">
		<div class="row" id="kotak">
			<div class="col-md-4">
				<img src="<?php echo base_url();?>gambar/produk/<?php echo $result[$i]->gambar;?>" >
			</div>

			<div class="col-md-8">
				<h4><span class="fa fa-info-circle"></span> Detail Produk</h4>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<h4>Nama Barang</h4>	
					</div>
					<div class="col-md-5">
						<h5><?php echo $result[$i]->nama_barang;?></h5>	
					</div>

					<div class="col-md-4">
						<h4>Harga Barang</h4>	
					</div>
					<div class="col-md-5">
						<h5><?php echo rupiah($result[$i]->harga_barang)?></h5>	
					</div>

					<div class="col-md-4">
						<h4>Keterangan Barang</h4>	
					</div>
					<div class="col-md-8" style="text-align: justify;">
						<h5><?php echo $result[$i]->keterangan?></h5>	
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>
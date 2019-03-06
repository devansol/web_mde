<?php 
$length = count($result);
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

$limit = 1;
$page = ceil($length / $limit);
// var_dump($page);
// exit();
?>
<div class="container content">
	<div class="row" id="kotak">
		<div class="section-title" style="font-family: monospace;width: 100%;margin: 10px;">
			<div class="row">
				<div class="col-md-4">
					<h4><span>PRODUK TERBARU</span></h4>
				</div>
			<!-- 	<div class="col-md-8 pull-right" style="text-align: right">
					<a href="#" id="btn-lihat-produk">Lihat Semua Produk <span class="fa fa-eye"></span></a>
				</div> -->
			</div>

		</div>

		<?php 
		for ($i=0; $i < $length; $i++) { 
			?>
			<div class="card no-radius" id="catalog">
				<img class="card-img-top produk" src="<?php echo base_url();?>gambar/produk/<?php echo $result[$i]->gambar;?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><b><?php echo $result[$i]->nama_barang?></b></h5>
					<p class="card-text"><?php echo rupiah($result[$i]->harga_barang)?></p>
					<div style="border-top: 1px solid #007bff">
						<a href="<?php echo base_url();?>home/detail_product/<?php echo $result[$i]->id_barang;?>" id='btn-detail-<?php echo $i ; ?>' class="btn btn-primary no-radius" style="float: right">Lihat Barang</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
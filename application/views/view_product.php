<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

?>
<div class="container content">
	<div class="row" id="kotak">
		<div class="section-title" style="font-family: monospace;width: 100%;margin: 10px;">
			<div class="row">
				<div class="col-md-4">
					<h4><span>List Barang</span></h4>
				</div>
			</div>
		</div>
		<div class="col-md-12" style="font-size: 12px">
			<table class="table" id="tbl-search-barang">
				<thead>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Action</th>
				</thead>
			</table>
		</div>
		
	</div>
</div>
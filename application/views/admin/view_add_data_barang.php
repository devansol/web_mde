<?php 

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

if($this->session->userdata('login')) { 
	?>

	<div class="container content">

		<div class="row" id="kotak">
			<div class="section-title" style="font-family: monospace;width: 100%;margin: 10px;">
				
				<div class="row">
					<div class="col-md-4">
						<h4><span>Tambah Data</span></h4>
					</div>
					<div class="col-md-8" style="text-align: right;">
						<button class="btn btn-danger no no-radius" style="color: white" id="btn-kembali"><span class="fa fa-angle-left"></span> Kembali</button>	
					</div>
					
				</div>
			</div>

			<div class="form-group" style="width: 100%">
				<form id="data" enctype="multipart/form-data" method="post">
					<input type="hidden" name="kode_barang" id="inp-kode-barang" class="form-control add" placeholder="Kode Barang">
					<div class="row" style="padding: 10px">
						<div class="col-md-2">
							<label>Nama Barang</label>
						</div>
						<div class="col-md-4">
							<input type="text" name="nama_barang" id="inp-nama-barang" class="form-control add" placeholder="Nama Barang">
						</div>

						<div class="col-md-2">
							<label>Harga Barang</label>
						</div>
						<div class="col-md-4">
							<input type="text" name="harga_barang" id="inp-harga-barang" class="form-control add" placeholder="Harga Barang">
						</div>		
					</div>

					<div class="row" style="padding: 10px">
						<div class="col-md-2">
							<label>Gambar</label>
						</div>
						<div class="col-md-4">
							<input type="file" name="gambar_barang" id="inp-gambar-barang" name ="gambar" class="form-control add" placeholder="Nama Barang">
						</div>

						<div class="col-md-2">
							<label>Keterangan</label>
						</div>
						<div class="col-md-4">
							<!-- <input type="text" id="inp-harga-barang" class="form-control " placeholder="Nama Barang"> -->
							<textarea id="txt-keterangan" name="keterangan" class="form-control no-radius add" style="font-size: 14px;"></textarea>
						</div>		
					</div>

					<div class="row"  style="padding: 10px">
						<div class="col-sm-12">
							<button class="btn btn-info no no-radius" id="btn-submit" type="submit"><span class="fa fa-save"> Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
		<?php 
	}else{
		redirect(site_url('admin'), 'refresh');
	}
	?>

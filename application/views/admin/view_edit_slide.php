<?php 

if($this->session->userdata('login')) { 
	?>

	<div class="container content">
		<div class="row" id="kotak">
			<div class="section-title" style="font-family: monospace;width: 100%;margin: 10px;">
				
				<div class="row">
					<div class="col-md-4">
						<h4><span>Edit Slide</span></h4>
					</div>
					<div class="col-md-8" style="text-align: right;">
						<button class="btn btn-danger no no-radius" style="color: white" id="btn-kembali-slide"><span class="fa fa-angle-left"></span> Kembali</button>	
					</div>
					
				</div>
			</div>

			<div class="form-group" style="width: 100%">
				<form id="slide" enctype="multipart/form-data" method="post">
				<!-- 	<input type="hidden" name="kode_barang" id="inp-id-barang" value="<?php echo $result[0]->id_barang;?>" class="form-control add" placeholder="Kode Barang"> -->
					<div class="row" style="padding: 10px">
						<div class="col-md-2">
							<label>Slide 1</label>
						</div>
						<div class="col-md-10">
							<input type="file" name="slide_1" id="inp-slide-1" class="form-control add" placeholder="Nama Barang" style="width: 30%">
						</div>
					</div>

					<div class="row" style="padding: 10px">
						<div class="col-md-2">
							<label>Slide 2</label>
						</div>
						<div class="col-md-10">
							<input type="file" name="slide_2" id="inp-slide-2" class="form-control add" placeholder="Harga Barang" style="width: 30%">
						</div>
					</div>

					<div class="row" style="padding: 10px">
						<div class="col-md-2">
							<label>Slide 3</label>
						</div>
						<div class="col-md-10">
							<input type="file" name="slide_3" id="inp-slide-3" class="form-control add" placeholder="Harga Barang" style="width: 30%">
						</div>			
					</div>

					<div class="row"  style="padding: 10px">
						<div class="col-sm-12">
							<button class="btn btn-info no no-radius" id="btn-simpan-slide" type="submit"><span class="fa fa-save"> Simpan</button>
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

<style type="text/css">
	.btn-default:hover{
		background-color: lightgrey;
	}
</style>

<?php  
	if($this->session->userdata('login')) { ?>
<div class="container content">
	<div class="row" id="kotak">
		<div class="page-title" style="font-size: 20px;font-family: monospace;font-weight: bold;width: 100%">
			SELAMAT DATANG DI HALAMAN ADMINISTRATOR
			<hr>
		</div>
		
		<div class="col-md-4" style="text-align: center;">
			<button class="btn btn-default" id="btn-tambah-data"><span style="font-size: 100px" class="fa fa-file"><p style="font-size: 20px"> TAMBAH DATA</p></span></button>
		</div>
		<div class="col-md-4" style="text-align: center;">
			<button class="btn btn-default"  id="btn-edit-data"><span style="font-size: 100px" class="fa fa-edit"><p style="font-size: 20px"> EDIT DATA</p></span></button>
		</div>
		<div class="col-md-4" style="text-align: center;">
			<button class="btn btn-default" id="btn-logout"><span style="font-size: 100px" class="fa fa-close"><p style="font-size: 20px"> LOGOUT</p></span></button>
		</div>
	</div>
</div>
<?php 
	}else{
		redirect(site_url('admin'), 'refresh');
	}

?>

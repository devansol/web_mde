<style type="text/css">
.btn-default:hover{
	background-color: lightgrey;
}
</style>

<?php  
if($this->session->userdata('login')) { ?>
	<div class="row">
		<div class="col-md-3" id="row" style="background-color: white;padding: 15px">
			<button class="dropdown-btn"><span class="fa fa-file"></span> Data Barang 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="#" id="btn-tambah-data"><span class="fa fa-angle-right"></span> Tambah Data</a>
				<a href="#" id="btn-edit-data"><span class="fa fa-angle-right"></span> Edit Data</a>
			</div>

			<button class="dropdown-btn"><span class="fa fa-desktop"></span> Aplikasi 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="#" id="btn-edit-slide"><span class="fa fa-angle-right"></span> Slide</a>
				<!-- <a href="#" id="btn-edit-data"><span class="fa fa-angle-right"></span> Edit Data</a> -->
			</div>
			<a href="#" id="btn-logout"><span class="fa fa-close"></span> Logout</a>
		</div>

		<div class="col-md-9 pull-right">
			<div class="container" id= "row" style="background-color: white;padding: 20px;text-align: center;height: 300px;max-height: 300px" >
				<h2>SELAMAT DATANG DI ADMINISTRATOR MITRA DUNIA ELEKTRONIKA</h2>	
			</div>
			
		</div>
	</div>
	
<!-- <div class="container content">
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
</div> -->
<?php 
}else{
	redirect(site_url('admin'), 'refresh');
}

?>
<script type="text/javascript">
	
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}
</script>
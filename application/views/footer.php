<div id="overlay-screen">
    <img style="width:auto" id="loading-screen" src="<?php echo base_url() ?>assets/img/loader.gif"/>
</div>

<div class="container">
	<hr>
	<div class="row">
<!-- 		<div class="col-md-6">
			<div class="title-footer">
				<h4 style="text-transform: uppercase;font-family: monospace;">Informasi</h4>	
			</div>
			
			
		</div>
		<div class="col-md-6">
			<div class="title-footer">
				<h4 style="text-transform: uppercase;font-family: monospace;">Kontak Kami</h4>	
			</div>
			<div class="content-footer"></div>
		</div> -->

		<div class="col-md-6">
			<p class="text-footer">&copy Mitra Dunia Elektronika 2019</p>
		</div>

		<div class="col-md-6">
			<p class="text-footer"><span class="fa fa-home"></span> Jl. Raya Kapin RT 003 / RW 004 No. 74 Jatibening baru, Pondok Gede, Bekasi, 17412</p>
			<p class="text-footer"><span class="fa fa-mobile-phone"></span> 0815-1459-5658 & 0821-2449-1090</p>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/accounting.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/mde.js"></script>

<script type="text/javascript">
	$(document).ajaxStart(function() {
        $('#overlay-screen').show();               
    });

    $(document).ajaxStop(function() {
        $('#overlay-screen').hide();        
    });
</script>
</body>
</html>
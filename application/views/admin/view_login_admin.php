<?php  
	if(!$this->session->userdata('login')) { ?>
<div class="container content" >
	<!-- <form action="<?php echo base_url();?>controller_admin/insert"  enctype="multipart/form-data" method="post"> -->
		<div class="col-md-4" style="margin-left: 350px">
			<div class="row" id="kotak">
				<div class="section-title" style="font-family: monospace;width: 100%;text-align: center;">
					<div class="row">
						<div class="col-md-12">
							<h4><span>Login</span></h4>
						</div>
					</div>
				</div>

				<div class="kotak-login"  id="div-inp-username" style="width: 100%;padding: 10px"> 
					<input type="text" name="username" id="inp-username" placeholder="Username" class="form-control">
					<label hidden id="err-username"></label>
				</div>

				<div class="kotak-login" style="width: 100%;padding: 10px"> 
					<input type="password" name="password" id="inp-password" placeholder="Password" class="form-control">
					<label hidden id="err-password"></label>
				</div>

				<div class="kotak-login" style="width: 100%;padding: 10px"> 
					<button id="btn-login" class="btn btn-info no-radius">Login <span class="fa fa-arrow-circle-o-right"> </span></button>
				</div>
				
			</div>
		</div>
	<!-- </form> -->
</div>
<?php 
	}else{
		redirect(site_url('admin/dashboard'), 'refresh');
	}
?>
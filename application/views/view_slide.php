<div class="container">
	<div class="row" style="margin-right: -29px;margin-left: 6px;">
		<div class="col-md-3" id="row" style="background-color: white">
			<div class="title-sidebar" style="border-bottom: 1px solid grey;">
				<h4><span class="fa fa-angle-double-right" style="color: #007bff"> </span> CATEGORY</h4>
			</div>

			<button class="dropdown-btn">Pemancar 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="#" ><span class="fa fa-angle-right"></span> Link 1</a>
				<a href="#"><span class="fa fa-angle-right"></span> Link 2</a>
				<a href="#"><span class="fa fa-angle-right"></span> Link 3</a>
			</div>

			<button class="dropdown-btn">Antena 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="#" ><span class="fa fa-angle-right"></span> Link 1</a>
				<a href="#"><span class="fa fa-angle-right"></span> Link 2</a>
				<a href="#"><span class="fa fa-angle-right"></span> Link 3</a>
			</div>

			<!-- </div> -->
		</div>

		<div class="col-md-9">
			<div id="demo" class="carousel slide" data-ride="carousel">

				<!-- Indicators -->
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>

				<!-- The slideshow -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?php echo base_url() ;?>gambar/slide/slide.png" alt="Los Angeles" width="1100" height="400">
					</div>
					<div class="carousel-item">
						<img src="<?php echo base_url() ;?>gambar/slide/slide2.jpg" alt="Chicago" width="1100" height="400">
					</div>
					<div class="carousel-item">
						<img src="<?php echo base_url() ;?>gambar/slide/slide3.png" alt="New York" width="1100" height="400">
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
		</div>
		
	</div>
</div>

<script>
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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
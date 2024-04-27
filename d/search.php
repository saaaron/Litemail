<?php  
	// page title
	$page_title = "Search";

	// header
	include "../assets/includes/d_header.php";
?>
	<div class="container">
		<div class="row" style="min-height: 100vh;">
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
			<div class="col-lg-3 col-xl-3 white-bg d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block" style="padding-top: 4.5rem">
				<?php  
					// sidebar	
					include "../assets/includes/d_sidebar.php";
				?>
			</div>
			<div class="col-md-10 col-lg-7 col-xl-7 white-bg" style="padding-top: 4.5rem">
				<div class="p-2">
					<div>
						<h5>Search</h5>
					</div>
					<div>
						<form id="search_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
							<input id="xs_sm_md_search" class="form-control clear_search_txt" type="text" name="search" placeholder="Type something...">
						</form>
						<div id="xs_sm_md_results" class="mt-2" style="margin-bottom: 4rem;"></div>
					</div>
				</div>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
<?php 
	// footer
	include "../assets/includes/d_footer.php"; 
?>
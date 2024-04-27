<?php  
	// page title
	$page_title = "Settings / Appearance / Change theme";

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
						<nav aria-label="breadcrumb">
				          	<ol class="breadcrumb">
				            	<li class="breadcrumb-item"><a href="#appearance">Appearance</a></li>
				            	<li class="breadcrumb-item active" aria-current="page">Change theme</li>
				          	</ol>
				        </nav>
						<div class="mb-1">
							Change your default theme to a new one below
						</div>
					</div>
					<form id="change_theme_form" method="POST" action="assets/includes/change_theme.php" enctype="multipart/form-data" accept-charset="utf-8">
						<div>
							<div class="form-check">
              					<input type="radio" name="theme" value="default" class="form-check-input" id="default_theme"<?php echo $default_selected; ?>>
              					<label class="form-check-label" for="default_theme">Default</label>
            				</div>
            				<div class="mb-3 form-check">
              					<input type="radio" name="theme" value="dark" class="form-check-input" id="dark_theme"<?php echo $dark_selected; ?>>
              					<label class="form-check-label" for="dark_theme">Dark</label>
            				</div>
	      				</div>
						<div class="d-grid">
							<button type="submit" class="btn btn-danger btn-block">Save</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
<?php 
	// footer
	include "../assets/includes/d_footer.php"; 
?>
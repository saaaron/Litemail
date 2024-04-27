<?php  
	// page title
	$page_title = "Settings / Account / Change password";

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
				            	<li class="breadcrumb-item"><a href="#account">Account</a></li>
				            	<li class="breadcrumb-item active" aria-current="page">Change password</li>
				          	</ol>
				        </nav>
						<div>Enter your old password and new password to change your current password.</div>
					</div>
				</div>
				<form id="settings_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="d-grid gap-2 p-2">
						<div>
							<input type="password" id="old_password" name="old_password" class="form-control password" placeholder="Old password" required>
							<div id="old_pass_val"></div>
						</div>
						<div>
							<input type="password" id="new_password" name="new_password" class="form-control password" placeholder="New password" required>
							<div id="new_pass_val"></div>
						</div>
						<div id="settings_msg"></div>
						<div class="d-grid mb-2">
							<button type="submit" id="save_but" class="btn btn-danger btn-block">Save</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
<?php 
	// footer
	include "../assets/includes/d_footer.php"; 
?>
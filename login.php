<?php  
	// page name
	$page_name = " - Login";
	
	// header
	include "assets/includes/index_header.php";

	// login
	include "assets/includes/login.php";
?>
	<div class="container">
		<div class="row" style="margin-top: 8rem">
			<div class="col-md-4 col-lg-4 col-xl-4"></div>
			<div class="col-md-4 col-lg-4 col-xl-4">
				<form id="login_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
					<h6 class="text-center text-muted p-3">:) Hello! You can login here</h6>
					<div class="card p-3">
						<div class="d-grid gap-2">
							<div class="input-group">
								<input id="email" name="email" type="text" class="form-control" placeholder="Email address" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" autocomplete="off" aria-describedby="email-addon" required>
								<span class="input-group-text" id="email-addon">@<?php echo $project_name; ?>.com</span>
							</div>
							<div>
								<input id="password" name="password" type="password" class="form-control password" placeholder="password" value="<?php if (isset($_POST['password'])) { echo $_POST['password']; } ?>" autocomplete="off" required>
							</div>
							<?php echo $msg; ?>
							<div class="d-grid mb-2">
								<button id="login_but" type="submit" class="btn btn-danger btn-block">Login</button>
							</div>
							<div class="text-center">
								Don't have an account yet? <a href="signup">Click here</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4 col-lg-4 col-xl-4"></div>
		</div>
	</div>
<?php 
	// footer
	include "assets/includes/index_footer.php";
?>
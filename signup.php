<?php  
	// page name
	$page_name = " - Signup";
	
	// header
	include "assets/includes/index_header.php";
?>
	<div class="container">
		<div class="row" style="margin-top: 5rem">
			<div class="col-md-4 col-lg-4 col-xl-4"></div>
			<div class="col-md-4 col-lg-4 col-xl-4">
				<form id="signup_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
					<h6 class="text-center text-muted p-3">Welcome to <?php echo ucwords($project_name); ?>!</h6>
					<div class="card p-3">
						<div class="d-grid gap-2">
							<div>
								<input id="fname" name="full_name" type="text" class="form-control" placeholder="Full name" autocomplete="off" required>
								<div id="fname_val"></div>
							</div>
							<div>
								<input id="email" name="email" type="text" class="form-control" placeholder="Email address" autocomplete="off" required>
								<div id="email_val"></div>
							</div>
							<div>
								<input name="dob" type="date" class="form-control" placeholder="Date of Birth" required>
							</div>
							<div>
								<select name="gender" class="form-select" required>
									<option value="">What's your gender?</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
							<div>
								<input name="password" id="password" type="password" class="form-control password" placeholder="Password" autocomplete="off" required>
								<div id="pass_val"></div>
							</div>
							<div id="signup_msg"></div>
							<div class="d-grid mb-2">
								<button id="signup_but" type="submit" class="btn btn-danger btn-block">Signup</button>
							</div>
							<div class="text-center">
								Already have an account? <a href="login">Click here</a>
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
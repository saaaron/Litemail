<?php  
	// page title
	$page_title = "My profile";

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
				<div class="d-flex justify-content-between mb-1 p-2">
					<div>
						<h5>My profile</h5>
					</div>
				</div>
				<div class="d-flex justify-content-center mb-1">
					<div class="user-profile-pic">
						<?php echo $user_profile_photo; ?>
					</div>
				</div>
				<div class="text-center mb-2">
					<a href="#" data-bs-toggle="modal" data-bs-target="#change_profile_photo">Change profile pic</a>

					<!-- modal -->
					<div class="modal fade" id="change_profile_photo">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- modal header -->
								<div class="modal-header p-1 pe-2 ps-2">
									<h6 class="modal-title">Change profile photo</h6>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<div id="error1" class="bg-danger text-white p-1 profile_photo_error">Your profile photo must be in .jpeg, .jpg or .png format</div>
                                <div id="error2" class="bg-danger text-white p-1 profile_photo_error">Your profile photo size must be less than 2MB</div>
								<!-- modal body -->
								<div class="modal-body">
									<div id="preview" style="color:transparent"></div>
									<div class="d-grid gap-2">
	                                    <div>
	                                        <input type="file" class="form-control" name="profile_photo" id="image" accept=".jpg, .jpeg, .png">
	                                    </div>
	                                    <div class="upload d-grid">
	                                    	<button class='upload btn btn-danger btn-block'>Done</button>
	                                    </div>
	                                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<form id="edit_profile_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="d-grid gap-2 p-2">
						<div>
							<input type="text" id="fname" name="full_name" class="form-control" placeholder="Full name" value="<?php echo $user_full_name; ?>" autocomplete="off" required>
							<div id="fname_val"></div>
						</div>
						<div>
							<input type="email" class="form-control" value="<?php echo $user_email_address; ?>" disabled>
						</div>
						<div>
							<input type="date" name="dob" class="form-control" value="<?php echo $user_dob; ?>" required>
						</div>
						<div>
							<select name="gender" class="form-select" required>
								<option value="">What's your gender?</option>
								<option value="male"<?php echo $male_selected; ?>>Male</option>
								<option value="female"<?php echo $female_selected; ?>>Female</option>
							</select>
						</div>
						<div id="edit_profile_msg"></div>
						<div class="d-grid mb-2">
							<button id="edit_profile_but" type="submit" class="btn btn-danger btn-block">Save</button>
						</div>
					</div>
				</form>
				<div class="d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none" style="margin-bottom: 4.3rem;"></div>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
<?php 
	// footer
	include "../assets/includes/d_footer.php"; 
?>
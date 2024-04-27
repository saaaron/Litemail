<?php  
	// page title
	$page_title = "Settings / Account / Delete Account";

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
				            	<li class="breadcrumb-item active" aria-current="page">Delete account</li>
				          	</ol>
				        </nav>
						<div class="mb-1">
							Once you delete your account, you will lose all your mails. Proceed by clicking on the button below.
						</div>
						<div class="alert alert-warning">
							<span class="bi-exclamation-triangle"></span> This changes can't be undone
						</div>
					</div>
					<!-- <form action="login_submit" method="get" accept-charset="utf-8"> -->
						<div class="d-grid">
							<button type="submit" class="btn btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#delete_acct_modal">Delete</button>

							<!-- modal -->
							<div class="modal fade" id="delete_acct_modal">
								<div class="modal-dialog" role="document">
							    	<div class="modal-content rounded-3 shadow">
							      		<div class="modal-body p-4 text-center">
							        		<h5 class="mb-0">Are you sure you want to proceed?</h5>
							       		 	<p class="mb-0">You will lose all your mails and account itself.</p>
							      		</div>
							      		<div class="modal-footer flex-nowrap p-0">
							        		<button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">
							        			<a href="assets/includes/delete_acct.php"><strong>Yes, proceed</strong></a>
							        		</button>
							        		<button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">No thanks</button>
							      		</div>
							    	</div>
							  	</div>
							</div>

						</div>
					<!-- </form> -->
				</div>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
<?php 
	// footer
	include "../assets/includes/d_footer.php"; 
?>
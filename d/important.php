<?php  
	// page title
	$page_title = "Important";

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
						<h5>Important <span class="badge bg-secondary total_important_count"><?php echo $total_num_of_important; ?></span></h5>
					</div>
					<?php 
						// compose mail
						include "../assets/includes/compose_mail_modal.php";
					?>
				</div>
				<div id="mails-cont" class="d-grid gap-2">
					<?php echo $important; ?>
				</div>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
<?php 
	// footer
	include "../assets/includes/d_footer.php"; 
?>
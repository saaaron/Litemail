<?php  
	// page name
	$page_name = "";
	
	// header
	include "assets/includes/index_header.php";
?>
	<div class="container">
		<div class="row" style="margin-top: 5rem">
			<div class="d-flex justify-content-center mb-3">
				<div id="preview_img">
					<img src="assets/img/preview.png" alt="<?php echo $project_name; ?>">
				</div>
			</div>
			<div class="text-center">
				<h1 class="text-muted desp_head">Simple, Lightweight, Fast</h1>
				<p>Introducing a simple, lightweight, and fast email system built in PHP. Seamlessly send emails to other users, ensuring efficiency and ease of use.</p>
			</div>
			<div class="d-flex justify-content-center">
				<div>
					<a href="login">
						<button class="btn btn-outline-danger">Get started</button>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php 
	// footer
	include "assets/includes/index_footer.php";
?>
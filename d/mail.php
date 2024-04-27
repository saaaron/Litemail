<?php  
	// start session
	session_start();

	// user's session
	if (isset($_SESSION["id"])) {
    	$id = $_SESSION['id'];
    }

	// db connection
	include "../assets/includes/db_connect.php";

	// page title
	$page_title = "Mail";

	// check mail id if null
	if (isset($_GET['mail_id'])) {
		if ($_GET['mail_id'] == null) {
			// redirect back to inbox
            header("location: ../inbox");
		} else {
			$vmail_id = $_GET['mail_id']; // mail id
		}
	} else {
		// redirect back to inbox
        header("location: ../inbox");
	}

	// mail
	include "../assets/includes/mail.php";

	// view mail
	include "../assets/includes/view_mail.php";

	// header
	include "../assets/includes/m_header.php";
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
				<div class="p-2" id="mail_body_cont">
					<div class="d-flex justify-content-between mb-2">
						<div>
							<h5>
								<?php echo $vfrom_user_full_name.': '.$vmail_subject; ?>
							</h5>
						</div>
						<div>
							<?php 
								if ($vfrom_user_id == $id) {
									// no reply button
								} else {
								echo '
							<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reply-mail-modal">
								<span class="bi-reply"></span> Reply
							</button>
							<!-- reply mail modal -->
							<div class="modal fade" id="reply-mail-modal">
								<div class="modal-dialog modal-fullscreen-sm-down">
									<div class="modal-content">
										<div class="modal-header p-1 pe-2 ps-2">
											<h6 class="modal-title">Reply</h6>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<form id="reply_form" method="POST" action="../assets/includes/compose_reply.php?mail_id='.$vmail_id.'" enctype="multipart/form-data" accept-charset="utf-8">
												<div class="d-grid gap-2">
													<div class="input-group">
														<span class="input-group-text" id="from-addon">From</span>
														<input name="mail_from" type="email" class="form-control" value="'.$vfrom_user_email_address.'@'.$project_name.'.com" aria-describedby="from-addon" disabled>
													</div>
													<div class="input-group">
														<span class="input-group-text" id="to-addon">To</span>
														<input id="mail_to" name="mail_to" type="email" class="form-control" value="'.$vfor_user_email_address.'@'.$project_name.'.com" aria-describedby="to-addon" disabled>
													</div>
													<div class="input-group">
														<span class="input-group-text" id="subject-addon">Subject</span>
														<input name="mail_subject" type="text" class="form-control" value="Re: '.$vmail_subject.'" aria-describedby="subject-addon" disabled>
													</div>
													<div>
														<textarea class="summernote" name="mail_body" required></textarea>
													</div>
													<div>
														<div class="text-muted">
															<font size="2">
																Tag this mail as an important mail
															</font>
														</div>
														<input name="mail_important" class="form-check-input" type="checkbox" value="yes" id="tag-important">
	      												<label class="form-check-label" for="tag-important">
	        												Important
	      												</label>
													</div>
													<div class="d-grid mb-2">
														<button type="submit" class="btn btn-danger btn-block">Done</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>';
								}
							?>
						</div>
					</div>
					<div class="card border-0 p-2 mb-2 mail-info">
						<div class="d-flex justify-content-between">
							<div>
								<b>From:</b> <?php echo $vfrom_user_full_name; ?> <<a href="#<?php echo $vfrom_user_email_address; ?>"><?php echo $vfrom_user_email_address.'@'.$project_name; ?>.com</a>>
							</div>
							<div class="d-flex justify-content-end">
								<?php echo $vstar_button; ?>
								<div>
									<button id="mailID_<?php echo $vmail_id; ?>" class="btn p-0 mail_delete_button" type="button" title="recycle"><span class="bi-trash3 text-muted"></span></button>
								</div>
							</div>
						</div>
						<div>
							<b>To:</b> <?php echo $vfor_user_full_name; ?> <<a href="#<?php echo $vfor_user_email_address; ?>"><?php echo $vfor_user_email_address.'@'.$project_name; ?>.com</a>>
						</div>
						<div>
							<b>Date:</b> <?php echo date("d M, Y h:i a", strtotime($vdate_n_time)); ?> (<?php echo format_time($vdate_n_time); ?>)
						</div>	
					</div>
					<div class="mail-body mb-2">
						<p class="text-justify">
							<?php echo $vmail_body; ?>
						</p>
					</div>
					<?php echo $reply_mail_cont; ?>
				</div>
			</div>
			<div class="col-md-1 col-lg-1 col-xl-1 d-none d-sm-block d-sm-none d-md-block"></div>
		</div>
	</div>
	<div class="white-bg fixed-bottom sm-bottom-menu d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none">
		<div class="d-flex justify-content-between">
			<?php 
				echo $sm_inbox_active;
				echo $sm_starred_active;
				echo $sm_important_active;
				echo $sm_search_active;
			?>
		</div>
	</div>
	<script src="../assets/js/jquery-3.7.0.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/go-to-top.js"></script>
	<script src="../assets/js/compose_validations.js"></script>
	<script src="../assets/js/summernote-bs5.min.js"></script>
	<script src="../assets/js/m_notifications.js"></script>
	<script src="../assets/js/jquery.livequery.js"></script>
	<script src="../assets/js/m_lg_xl_search.js"></script>
	<script src="../assets/js/clear_search_txt.js"></script>
	<script type="text/javascript">
	   	$(document).ready(function() {
	        $(".summernote").summernote({
	         	height: 150,
	          	tabsize: 2,
	          	toolbar: [
	          		["font", ["bold","underline","clear"]],
	          		["para", ["ul","ol"]],
	          	]
	        });
	    });

		// star button 
	   	$(".star > button").livequery("click",function(e){
			var parent  = $(this).parent();

			// get mail id from id="mail_id_[id]" 
			var getID   =  parent.attr("id").replace("mail_id_","");
				
			// star mail
			$.post("../assets/includes/star_mail.php?mail_id="+getID, {
					
			}, function(response) {
				$("#mail_id_"+getID).html($(response).fadeIn("fast"));
			});
		});

		// recycle button
		$(".mail_delete_button").click(function(){
		    var el = this;
		    var id = this.id;
		    var splitid = id.split("_");

		    // id
		    var deleteid = splitid[1];
		        
		    $.ajax({
		        url: "../assets/includes/recycle_all_mails.php",
		        type: "POST",
		        data: { mail_id:deleteid },
		        success: function(response) {
		            if (response == 1) {
		                $("#mail_body_cont").html("<div class='card border-0 p-5 text-muted text-center'><div class='bi-trash3' style='font-size: 20pt;'></div><p>Mail deleted!</p></div>");
		                $(location).attr("href", "../inbox?log_msg=mail_deleted");
		            } else {
		                alert("Ops! Something went wrong, please try again");
		            }
		        }
		    });
		});

		// alert fade
		$(".alert").fadeIn("slow");
		setTimeout(function() {
			$(".alert").fadeOut(3000);
		}, 3000);
	</script>
</body>
</html>
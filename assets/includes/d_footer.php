<?php  
	echo $log_msg.'
	<div class="white-bg fixed-bottom sm-bottom-menu d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none">
		<div class="d-flex justify-content-between">
			'.$sm_inbox_active.
			$sm_starred_active.
			$sm_important_active.
			$sm_search_active.'
		</div>
	</div>';

	if ($page_title == "Inbox" || $page_title == "Starred" || $page_title == "Important" || $page_title == "All mails") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/compose_validations.js"></script>
		<script src="assets/js/summernote-bs5.min.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/jquery.livequery.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
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
				$.post("assets/includes/star_inbox_starred_important_mails.php?mail_id="+getID, {
					
				}, function(response){
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
		            url: "assets/includes/recycle_inbox_starred_important_spam_mails.php",
		            type: "POST",
		            data: { mail_id:deleteid },
		            success: function(response) {
		                if (response == 1) {
		                    $(el).closest(".mail_to_delete").fadeOut(500, function(){
		                        $(this).remove();
		                    });
		                } else {
		                    alert("Ops! Something went wrong, please try again");
		                }
		            }
		        });
		    });
	    </script>';
	} elseif ($page_title == "Sent") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/compose_validations.js"></script>
		<script src="assets/js/summernote-bs5.min.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/jquery.livequery.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
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
				$.post("assets/includes/star_sent_mails.php?mail_id="+getID, {
					
				}, function(response){
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
		            url: "assets/includes/recycle_sent_mails.php",
		            type: "POST",
		            data: { mail_id:deleteid },
		            success: function(response) {
		                if (response == 1) {
		                    $(el).closest(".mail_to_delete").fadeOut(500, function(){
		                        $(this).remove();
		                    });
		                } else {
		                    alert("Ops! Something went wrong, please try again");
		                }
		            }
		        });
		    });
	    </script>';
	} elseif ($page_title == "All mails") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/compose_validations.js"></script>
		<script src="assets/js/summernote-bs5.min.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/jquery.livequery.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
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
				$.post("assets/includes/star_all_mails.php?mail_id="+getID, {
					
				}, function(response){
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
		            url: "assets/includes/recycle_all_mails.php",
		            type: "POST",
		            data: { mail_id:deleteid },
		            success: function(response) {
		                if (response == 1) {
		                    $(el).closest(".mail_to_delete").fadeOut(500, function(){
		                        $(this).remove();
		                    });
		                } else {
		                    alert("Ops! Something went wrong, please try again");
		                }
		            }
		        });
		    });
	    </script>';
	} elseif ($page_title == "Spam") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/compose_validations.js"></script>
		<script src="assets/js/summernote-bs5.min.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/jquery.livequery.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
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

			// recycle button
			$(".mail_delete_button").click(function(){
		        var el = this;
		        var id = this.id;
		        var splitid = id.split("_");

		        // id
		        var deleteid = splitid[1];
		        
		        $.ajax({
		            url: "assets/includes/recycle_inbox_starred_important_spam_mails.php",
		            type: "POST",
		            data: { mail_id:deleteid },
		            success: function(response) {
		                if (response == 1) {
		                    $(el).closest(".mail_to_delete").fadeOut(500, function(){
		                        $(this).remove();
		                    });
		                } else {
		                    alert("Ops! Something went wrong, please try again");
		                }
		            }
		        });
		    });
	    </script>';
	} elseif ($page_title == "Bin") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/compose_validations.js"></script>
		<script src="assets/js/summernote-bs5.min.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/jquery.livequery.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
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

			// restore button
			$(".mail_restore_button").click(function(){
		        var el = this;
		        var id = this.id;
		        var splitid = id.split("_");

		        // id
		        var restoreid = splitid[1];
		        
		        $.ajax({
		            url: "assets/includes/restore_bin_mails.php",
		            type: "POST",
		            data: { mail_id:restoreid },
		            success: function(response) {
		                if (response == 1) {
		                    $(el).closest(".mail_to_restore").fadeOut(500, function(){
		                        $(this).remove();
		                    });
		                } else {
		                    alert("Ops! Something went wrong, please try again");
		                }
		            }
		        });
		    });

		    // empty bin button
			$("#empty_bin_button").click(function(){
			    $.ajax({
			        url: "assets/includes/empty_bin.php",
			        type: "POST",
			        success: function(response) {
			            if (response == 1) {
			                $("#mails-cont").html("");
			                $(location).attr("href", "bin");
			            } else {
			                alert("Ops! Something went wrong, please try again");
			            }
			        }
			    });
			});
	    </script>';
	} elseif ($page_title == "Search") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/xs_sm_md_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>';
	} elseif ($page_title == "My profile") {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
		<script src="assets/js/signup_validations.js"></script>
		<script src="assets/js/edit_profile.js"></script>
		<script src="assets/js/croppie.js"></script>
		<script src="assets/js/validate_profile_photo.js"></script>
		<script src="assets/js/upload_profile_photo.js"></script>';
	} else {
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/go-to-top.js"></script>
		<script src="assets/js/notifications.js"></script>
		<script src="assets/js/lg_xl_search.js"></script>
		<script src="assets/js/clear_search_txt.js"></script>
		<script src="assets/js/HideShowPassword.min.js"></script>
		<script src="assets/js/show_hide_password.js"></script>
		<script src="assets/js/change_password_validations.js"></script>
		<script src="assets/js/change_password.js"></script>';
	}

	echo '
	<script text="text/javascript">
		$(".alert_fade").fadeIn("slow");
		setTimeout(function() {
			$(".alert_fade").fadeOut(2000);
		}, 2000);
	</script>
</body>
</html>';
?>
$(document).ready(function(){
	$("#edit_profile_form").submit(function(e){
		e.preventDefault();					
		$.ajax({
			url: 'assets/includes/edit_profile.php',
			type: 'POST',
			data: $(this).serialize(),
			dataType: "json",
			beforeSend: function() {
				$("#edit_profile_but").attr('disabled', true);
				$("#edit_profile_but").html('<span class="spinner-border text-light" role="status"></span>');
			},
			success: function(d) {
				$("#edit_profile_but").attr('disabled', false);
				$("#edit_profile_but").html('Save');
				if (d.msg == 0) {
					$("#lg_xl_user_full_name").html(d.full_name);
	                $("#edit_profile_msg").html('<div class="text-success">Profile updated successfully!</div>');
	            } else if (d.msg == 1) {
	            	$("#edit_profile_msg").html('<div class="text-warning">No changes made</div>');
	            } else {
	            	$("#edit_profile_msg").html('<div class="text-danger"><strong>Ops!</strong> Profile update failed</div>');
	            }
	        },
            error: function(xhr, status, error) {
	            // console.error(xhr.responseText);
	            $("#edit_profile_but").attr('disabled', false);
	            $("#edit_profile_but").html('Save');
	        }
		});
	});
});
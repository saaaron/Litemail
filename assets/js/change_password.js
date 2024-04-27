$(document).ready(function(){
	$("#settings_form").submit(function(e) {
		e.preventDefault();					
		$.ajax({
			url: 'assets/includes/change_password.php',
			type: 'POST',
			data: $(this).serialize(),
			dataType: "json",
			beforeSend: function() {
				$("#save_but").attr('disabled', true);
				$("#save_but").html('<span class="spinner-border text-light" role="status"></span>');
			},
			success: function(d) {
				$("#save_but").attr('disabled', false);
				$("#save_but").html('Save');
				if (d.msg == 0) {
					$("#settings_form")[0].reset();
	                $("#settings_msg").html('<div class="text-success">Password changed successfully!</div>');
	            } else if (d.msg == 1) {
	            	$("#settings_msg").html('<div class="text-warning">No changes made</div>');
	            } else {
	            	$("#settings_msg").html('<div class="text-danger"><strong>Ops!</strong> Password change failed</div>');
	            }
	        },
            error: function(xhr, status, error) {
	            // console.error(xhr.responseText);
	            $("#save_but").attr('disabled', false);
	            $("#save_but").html('Save');
	        }
		});
	});
});
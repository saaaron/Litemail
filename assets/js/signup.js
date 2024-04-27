$(document).ready(function(){
	$("#signup_form").submit(function(e){
		e.preventDefault();					
		$.ajax({
			url: 'assets/includes/signup.php',
			type: 'POST',
			data: $(this).serialize(),
			dataType: "json",
			beforeSend: function() {
				$("#signup_but").attr('disabled', true);
				$("#signup_but").html('<span class="spinner-border text-light" role="status"></span>');
			},
			success: function(d) {
				$("#signup_but").attr('disabled', false);
				$("#signup_but").html('Signup');
				if (d.error == false && d.msg == 0) {
	                $("#signup_form")[0].reset();
	               	$('#email_val').html('');
	                $("#signup_msg").html('<div class="text-success">Signup was successful, click <a href="login">here</a> to login</div>');
	            } else {
	            	$("#signup_msg").html('<div class="text-danger"><strong>Ops!</strong> Signup failed</div>');
	            }
	        },
            error: function(xhr, status, error) {
	            // console.error(xhr.responseText);
	            $("#signup_but").attr('disabled', false);
	            $("#signup_but").html('Signup');
	        }
		});
	});
});
$(document).ready(function() {
	// signup validations
	// full name
 	$('#fname').keyup(function() {
 		var fname_val = $(this).val();
 		$.post("assets/includes/full_name_val.php", {full_name: fname_val} , function(data) {
 			$('#fname_val').html(data.msg);
 		},'json');
 	});

 	// email
 	$('#email').keyup(function() {
 		var email_val = $(this).val();
 		$.post("assets/includes/email_val.php", {email: email_val} , function(data) {
 			$('#email_val').html(data.msg);
 		},'json');
 	});

 	// password
 	$('#password').keyup(function() {
 		var pass_val = $(this).val();
 		$.post("assets/includes/pass_val.php", {pass: pass_val} , function(data) {
 			$('#pass_val').html(data.msg);
 		},'json');
 	});
});
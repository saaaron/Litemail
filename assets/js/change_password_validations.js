$(document).ready(function() {
	// old password
 	$('#old_password').keyup(function() {
 		var old_pass_val = $(this).val();
 		$.post("assets/includes/old_pass_val.php", {old_pass: old_pass_val} , function(data) {
 			$('#old_pass_val').html(data.msg);
 		},'json');
 	});

 	// new password
 	$('#new_password').keyup(function() {
 		var new_pass_val = $(this).val();
 		$.post("assets/includes/pass_val.php", {pass: new_pass_val} , function(data) {
 			$('#new_pass_val').html(data.msg);
 		},'json');
 	});
});
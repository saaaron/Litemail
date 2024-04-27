$(document).ready(function() {
	// compose validations
	// mail to
 	$('#mail_to').keyup(function() {
 		var mail_to_val = $(this).val();
 		$.post("assets/includes/mail_to_val.php", {mail_to: mail_to_val} , function(data) {
 			$('#mail_to_val').html(data.msg);
 		},'json');
 	});

 	// mail subject
 	$('#mail_subject').keyup(function() {
 		var mail_subject_val = $(this).val();
 		$.post("assets/includes/mail_subject_val.php", {subject: mail_subject_val} , function(data) {
 			$('#mail_subject_val').html(data.msg);
 		},'json');
 	});
});
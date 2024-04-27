<?php 
	// view mail
	$view_mail = "UPDATE mails SET viewed = 'yes' WHERE user_id = ? AND mail_id = ?";
	$stmt = mysqli_prepare($db, $view_mail);
	mysqli_stmt_bind_param($stmt, "is", $id, $vmail_id);
	mysqli_stmt_execute($stmt);
?>
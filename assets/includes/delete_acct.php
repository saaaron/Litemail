<?php  
	// start session
  	session_start();

	// db connection
	include "db_connect.php";

	$id = $_SESSION['id']; // user's id

	// `users`
	$delete = "DELETE FROM users WHERE id = ?";
	if ($stmt = mysqli_prepare($db, $delete)) {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);

		// `mails`
		$delete = "DELETE FROM mails WHERE user_id = ?";
		$stmt = mysqli_prepare($db, $delete);
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
				
		// 	Account and all mails deleted successfully!
		header("location: ../../logout");

		// close statement
		mysqli_stmt_close($stmt);				
	}
  	// close db connection
  	mysqli_close($db);
?>
<?php 
	// start session
    session_start();

	// db connection
	include 'db_connect.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = $_SESSION["id"]; // user's id

		// mail
		$mail = "SELECT * FROM mails WHERE user_id = ? AND recycled = 'yes'";
	    if($stmt = mysqli_prepare($db, $mail)) {
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			// if mail exist
			if (mysqli_stmt_num_rows($stmt) > 0) {
				// delete mail
				$delete = "DELETE FROM mails WHERE user_id = ? AND recycled = 'yes'";
			    $stmt = mysqli_prepare($db, $delete);
				mysqli_stmt_bind_param($stmt, "i", $id);
				mysqli_stmt_execute($stmt);

				echo 1; // Deleted
			} else {
				echo 0; // Ops! A problem occurred
			}
		}
		// close statement
		mysqli_stmt_close($stmt);
	}
	// close db connection
  	mysqli_close($db);
?>
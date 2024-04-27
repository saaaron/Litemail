<?php  
	// start session
  	session_start();

	// db connection
	include "db_connect.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = $_SESSION['id']; // user's id

		// select theme
		$select_th = "SELECT theme FROM users WHERE id = ?";
    	if ($stmt = mysqli_prepare($db, $select_th)) {
		    mysqli_stmt_bind_param($stmt, "i", $id);
		    mysqli_stmt_execute($stmt);
		    mysqli_stmt_bind_result($stmt, $r_theme);
		    while (mysqli_stmt_fetch($stmt)) {
		  		// fetch results
		    }
		}

		// select theme
		if ($_POST['theme'] == "default") {
			$theme = "default"; // default theme
		} else {
			$theme = "dark"; // dark theme
		}

		// if no changes made
		if ($theme == $r_theme) {
			// no changes made
			header("location: theme_no_change.php");
		} else {
			// `users`
			$update = "UPDATE users SET theme = ? WHERE id = ?";

			if ($stmt = mysqli_prepare($db, $update)) {
				// SET PARAMETERS
				$param_theme = $theme; // user's theme

				// `users`
				$update = "UPDATE users SET theme = ? WHERE id = ?";
				$stmt = mysqli_prepare($db, $update);
				mysqli_stmt_bind_param($stmt, "si", $param_theme, $id);
				mysqli_stmt_execute($stmt);

				// 	Theme changed successfully!
				header("location: theme_success.php");
			} else {
				// 	Theme change failed
				header("location: theme_failed.php");
			}	
		}
		// close statement
		mysqli_stmt_close($stmt);	
  	}
  	// close db connection
  	mysqli_close($db);
?>
<?php  
	// header
	header('Content-Type: application/json');

	// start session
  	session_start();

	// db connection
	include "db_connect.php";

	// var
	$msg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = $_SESSION['id']; // user's id

		// select password
		$select_pass = "SELECT password FROM users WHERE id = ?";
    	if ($stmt = mysqli_prepare($db, $select_pass)) {
		    mysqli_stmt_bind_param($stmt, "i", $id);
		    mysqli_stmt_execute($stmt);
		    mysqli_stmt_bind_result($stmt, $r_pass);
		    while (mysqli_stmt_fetch($stmt)) {
		  		// fetch results
		    }
		}

        if (empty(trim($_POST['old_password']))) {
        	$old_pass_error = true; // old password is empty
        } elseif (!password_verify(trim($_POST['old_password']), $r_pass)) {
			$old_pass_error = true; // Old password is incorrect
		} else {
			$old_pass = $_POST['old_password']; // old password
 			$old_pass_error = false;
 		}

		// password validations
		if (empty($_POST['new_password'])) {
			$new_pass_error = true; // new password is empty
		} elseif (strlen($_POST['new_password']) < 6) {
			$new_pass_error = true; // password must be at least 6 characters
		} elseif (strlen($_POST['new_password']) > 150) {
			$new_pass_error = true; // password is too long
		} else {
			$new_pass = $_POST['new_password']; // password
			$new_pass_error = false;
		}

		// if no errors
		if ($old_pass == $new_pass) {
			// no update made
			$msg = 1;
		} elseif ($old_pass_error == false && $new_pass_error == false) {
			// PREPARE INSERT STATEMENT
			// `users`
			$update = "UPDATE users SET password = ? WHERE id = ?";

			if ($stmt = mysqli_prepare($db, $update)) {
				// SET PARAMETERS
				$param_new_pass = password_hash($new_pass, PASSWORD_DEFAULT); // user's new password

				// `users`
				$update = "UPDATE users SET password = ? WHERE id = ?";
				$stmt = mysqli_prepare($db, $update);
				mysqli_stmt_bind_param($stmt, "si", $param_new_pass, $id);
				mysqli_stmt_execute($stmt);

				// echo '
				// <div class="text-success">
				// 	Password changed successfully!
				// </div>';
				$msg = 0;
			} else {
				// echo '
				// <div class="text-danger">
				// 	Password change failed
				// </div>';
				$msg = 2;
			}		
		}	
			
		// output
		$output = array(
			'msg' => $msg
		);

		// encode output in json
		echo json_encode($output);

		// close statement
		mysqli_stmt_close($stmt);	
  	}
  	// close db connection
  	mysqli_close($db);
?>
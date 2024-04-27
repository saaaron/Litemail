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

		// select user
		$select_user = "SELECT full_name, dob, gender FROM users WHERE id = ?";
		if ($stmt = mysqli_prepare($db, $select_user)) {
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $user_full_name, $user_dob, $user_gender);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}	    
		}

		// full name validations
		if (empty(trim($_POST["full_name"]))) {
    		$full_name_error = true; // full name is empty
    	} elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $_POST["full_name"])) < 3) {
            $full_name_error = true; // full name must be greater than 3
        } elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $_POST["full_name"])) > 20) {
            $full_name_error = true; // full name must be less than 20
        } elseif (!preg_match("/^[a-zA-Z\s]{3,30}+$/ ", $_POST["full_name"])) {
			$full_name_error = true; // full name must be in letters, with either a space
		} else {
            $full_name = $_POST['full_name'];
            $full_name_error = false;
        }

		// date of birth validations
		if (empty($_POST['dob'])) {
			$dob_error = true; // date of birth is empty
		} else {
			$dob = $_POST['dob']; // date of birth
			$dob_error = false;
		}

		// gender validations
		if (empty($_POST['gender'])) {
			$gender_error = true; // gender is empty
		} else {
			$gender = $_POST['gender']; // gender
			$gender_error = false;
		}

		// if no errors
		if ($user_full_name == $full_name && $user_dob == $dob && $user_gender == $gender) {
			// no update made
			$msg = 1;
		} elseif ($full_name_error == false && $dob_error == false && $gender_error == false) {
			// PREPARE INSERT STATEMENT
			// `users`
			$update = "UPDATE users SET full_name = ?, dob = ?, gender = ? WHERE id = ?";

			if ($stmt = mysqli_prepare($db, $update)) {
				// SET PARAMETERS
				$param_full_name = ucwords($full_name); // user's full name
				$param_dob = $dob; // user's date of birth
				$param_gender = $gender; // user's gender

				// `users`
				$update = "UPDATE users SET full_name = ?, dob = ?, gender = ? WHERE id = ?";
				$stmt = mysqli_prepare($db, $update);
				mysqli_stmt_bind_param($stmt, "sssi", $param_full_name, $param_dob, $param_gender, $id);
				mysqli_stmt_execute($stmt);

				// echo '
				// <div class="text-success">
				// 	Profile updated successfully!
				// </div>';
				$msg = 0;
			} else {
				// echo '
				// <div class="text-danger">
				// 	Profile update failed
				// </div>';
				$msg = 2;
			}	
		}

		// output
		$output = array(
			'full_name' => $param_full_name,
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
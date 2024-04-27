<?php  
	// header
	header('Content-Type: application/json');

	// db connection
	include "db_connect.php";

	// var
	$msg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    	// email validations
    	if (empty(trim($_POST['email']))) {
    		$email_error = true; // email address is empty
    	} elseif (strlen($_POST["email"]) < 3) {
			$email_error = true; // email address must be greater than 3 characters
		} elseif (strlen($_POST["email"]) > 15) {
			$email_error = true; // email address must be less than 15 characters
		} elseif (!preg_match("/^[a-zA-Z0-9]{3,15}+$/ ", $_POST["email"])) {
    		$email_error = true; // email address must be in letters, with either a number
    	} else {
			// prepare select statement
			$check_email_addr = "SELECT * FROM users WHERE email_address = ?";
			if ($stmt = mysqli_prepare($db, $check_email_addr)) {

				// bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email_addr);

                // set parameters
                $param_email_addr = $_POST["email"];

                // attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {

                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                      	$email_error = true; // email address is already taken
                    } else {
                        $email = $_POST["email"]; // email addresss
                        $email_error = false;
                    }
                } else {
                    $email_error = true; // Ops! something went wrong, pls try again later
                }
			}

			// close statement
            mysqli_stmt_close($stmt);
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

		// password validations
		if (empty($_POST['password'])) {
			$password_error = true; // password is empty
		} elseif (strlen($_POST['password']) < 6) {
			$password_error = true; // password must be at least 6 characters
		} elseif (strlen($_POST['password']) > 150) {
			$password_error = true; // password is too long
		} else {
			$password = $_POST['password']; // password
			$password_error = false;
		}

		// if no errors
		if ($full_name_error == false && $email_error == false && $dob_error == false && $gender_error == false && $password_error == false) {
			// PREPARE INSERT STATEMENT
			// `users`
			$insert = "INSERT INTO users(full_name, email_address, dob, gender, password) VALUES(?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($db, $insert)) {
				// SET PARAMETERS
				$param_full_name = ucwords($full_name); // user's full name
				$param_email = $email; // user's email address
				$param_dob = $dob; // user's date of birth
				$param_gender = $gender; // user's gender
				$param_password = password_hash($password, PASSWORD_DEFAULT); // user's password

				// `users`
				$insert = "INSERT INTO users(full_name, email_address, dob, gender, password) VALUES(?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($db, $insert);
				mysqli_stmt_bind_param($stmt, "sssss", $param_full_name, $param_email, $param_dob, $param_gender, $param_password);
				mysqli_stmt_execute($stmt);

				// echo '
				// <div class="text-success">
				// 	Signup was successful, click <a href="#">here</a> to login
				// </div>';
				$msg = 0;
			} else {
				// echo '
				// <div class="text-danger">
				// 	<strong>Ops!</strong> Signup failed
				// </div>';
				$msg = 1;
			}	

			// output
			$output = array(
				'msg' => $msg,
    			'error' => ($msg == 1) // indicating if there was an error
			);

			// encode output in json
			echo json_encode($output);

			// close statement
			mysqli_stmt_close($stmt);		
		}		
  	}
  	// close db connection
  	mysqli_close($db);
?>
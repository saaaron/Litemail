<?php  
	// start session
	session_start();

	// db connection
	include "db_connect.php";

	// generate random characters function
	include "generate_random_char_function.php";

	// var
	$msg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// user's id
		$id = $_SESSION['id'];

		// select user's email address
		$select_fe = "SELECT email_address FROM users WHERE id = ?";
	    if ($stmt = mysqli_prepare($db, $select_fe)) {
		    mysqli_stmt_bind_param($stmt, "i", $id);
		    mysqli_stmt_execute($stmt);
		    mysqli_stmt_bind_result($stmt, $from_email);
		    while (mysqli_stmt_fetch($stmt)) {
		  		// fetch results
		    }	    
		}

		// mail to (recipient's email address) validations
		// filter email address
        $email_part = explode("@", $_POST['mail_to']);
        $email = $email_part[0];

    	if (empty(trim($_POST['mail_to']))) {
    		// $mail_to_error = true; // email address is empty
    		// redirect back to sent mails
			header("location: compose_failed.php");
    	} elseif (!filter_var($_POST["mail_to"], FILTER_VALIDATE_EMAIL)) {
    		// $mail_to_error = true; // email address is invalid
    		// redirect back to sent mails
			header("location: compose_failed.php");
    	// } elseif ($from_email == $email) {
    		// $mail_to_error = true; // mail can't be sent oneself
    		// redirect back to sent mails
			// header("location: compose_failed.php");
    	} else {
			// prepare select statement
			$check_email_addr = "SELECT id FROM users WHERE email_address = ?";
			if ($stmt = mysqli_prepare($db, $check_email_addr)) {

				// bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email_addr);

                // set parameters
                $param_email_addr = $email;

                // attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {

                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                    	$email = $email; // email addresss
                      	$mail_to_error = false; // email address exist
                    } else {
                       	// $mail_to_error = true; // email address does not exist
                    	// redirect back to sent mails
						header("location: compose_failed.php");
                    }
                } else {
                    // $mail_to_error = true; // Ops! something went wrong, pls try again later
                    // redirect back to sent mails
					header("location: compose_failed.php");
                }
			}

			// close statement
            mysqli_stmt_close($stmt);
		}

		// mail subject validations
		if (empty(trim($_POST["mail_subject"]))) {
    		$mail_subject_error = false; // mail subject is empty but proceed
    		$mail_subject = $_POST['mail_subject'];
    	} elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $_POST["mail_subject"])) < 1) {
            // $mail_subject_error = true; // mail subject must be greater than 1
            // redirect back to sent mails
			header("location: compose_failed.php");
        } elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $_POST["mail_subject"])) > 50) {
            // $mail_subject_error = true; // mail subject must be less than 50
            // redirect back to sent mails
			header("location: compose_failed.php");
        } elseif (!preg_match("/^[a-zA-Z0-9!?\s]{1,50}+$/ ", $_POST["mail_subject"])) {
			// $mail_subject_error = true; // Only letters(a-z), numbers(0-9), exclamation mark (!), question mark (?) and spaces are allowed
			// redirect back to sent mails
			header("location: compose_failed.php");
		} else {
            $mail_subject = $_POST['mail_subject'];
            $mail_subject_error = false;
        }

    	// mail body validations
    	if (empty($_POST['mail_body'])) {
			// $mail_body_error = true; // mail body is empty
			// redirect back to sent mails
			header("location: compose_failed.php");
		} else {
			$mail_body = $_POST['mail_body']; // mail body
			$mail_body_error = false;
		}

		// mail important
		if (empty($_POST['mail_important'])) {
			$mail_important = "no"; // no
		} else {
			$mail_important = "yes"; // yes
		}

		if ($from_email == $email) { // if from user email address is same with to user email address

			// redirect back to sent mails
			header("location: compose_failed.php");
			
		} elseif ($mail_to_error == false && $mail_subject_error == false && $mail_body_error == false) {
			// PREPARE INSERT STATEMENT
			// `mails`
			// for from user
			$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important, viewed) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

			// for to user
			$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important) VALUES(?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($db, $insert)) {
				// SET PARAMETERS
				$mail_id = random_alphanumeric_string(8);
				$param_mail_to = $email; // mail to
				$param_mail_subject = $mail_subject; // mail subject
				$param_mail_body = $mail_body; // mail body
				$param_mail_important = $mail_important; // mail important
				$yes = 'yes'; // for viewed (from_user_id)

				// check mail id already exist
                $check = "SELECT * FROM mails WHERE mail_id = ?";
                if ($stmt = mysqli_prepare($db, $check)) {
                    mysqli_stmt_bind_param($stmt, "s", $mail_id);
                    mysqli_stmt_execute($stmt);
                    while (mysqli_stmt_fetch($stmt)) {
                        // fetch results
                    }

                    // if mail id already exist
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $mail_id = $mail_id.random_alphanumeric_string(3); // add random 8 char to mail id
                    } else {
                        $mail_id = $mail_id; // mail id
                    }
                }

                // select mail to user's id
				$select_mtuid = "SELECT id FROM users WHERE email_address = ?";
			    if ($stmt = mysqli_prepare($db, $select_mtuid)) {
				    mysqli_stmt_bind_param($stmt, "s", $email);
				    mysqli_stmt_execute($stmt);
				    mysqli_stmt_bind_result($stmt, $mail_to_id);
				    while (mysqli_stmt_fetch($stmt)) {
				  		// fetch results
				    }	    
				}

				// `mails`
				// for from user
				$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important, viewed) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($db, $insert);
				mysqli_stmt_bind_param($stmt, "isiissss", $id, $mail_id, $id, $mail_to_id, $param_mail_subject, $param_mail_body, $param_mail_important, $yes);
				mysqli_stmt_execute($stmt);

				// for to user
				$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important) VALUES(?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($db, $insert);
				mysqli_stmt_bind_param($stmt, "isiisss", $mail_to_id, $mail_id, $id, $mail_to_id, $param_mail_subject, $param_mail_body, $param_mail_important);
				mysqli_stmt_execute($stmt);

				// redirect back to sent mails
				header("location: compose_success.php");
			} else {
				// redirect back to sent mails
				header("location: compose_failed.php");
			}	
			// close statement
			mysqli_stmt_close($stmt);		
		}		
  	}
  	// close db connection
  	mysqli_close($db);
?>
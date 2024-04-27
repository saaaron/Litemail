<?php  
	// start session
	session_start();

	// db connection
	include "db_connect.php";

	// generate random characters function
	include "generate_random_char_function.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// user's id
		$id = $_SESSION['id'];

		// reply mail id
		$reply_mail_id = $_GET['mail_id'];

		// select mail's from id and subject
		$select_fuids = "SELECT from_user_id, subject FROM mails WHERE mail_id = ?";
		if ($stmt = mysqli_prepare($db, $select_fuids)) {
			mysqli_stmt_bind_param($stmt, "s", $reply_mail_id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $p_mail_to_id, $mail_subject);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}	    

			// check $mail_to_id if exist (user still exist, incase acct has been deleted to fail compose reply)
			$check = "SELECT id FROM users WHERE id = ?";
	        if ($stmt = mysqli_prepare($db, $check)) {
		        mysqli_stmt_bind_param($stmt, "i", $p_mail_to_id);
		        mysqli_stmt_execute($stmt);
		        mysqli_stmt_bind_result($stmt, $mail_to_id);
		        while (mysqli_stmt_fetch($stmt)) {
		            // fetch results
		        }

		        if (mysqli_stmt_num_rows($stmt) == 0) {
					// redirect back to sent
					header("location: compose_reply_failed.php");
				}	 
		    }       
		}

		// mail body
    	if (empty($_POST['mail_body'])) {
			// $mail_body_error = true; // mail body is empty
			// redirect back to sent mails
			header("location: compose_reply_failed.php");
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

		if ($mail_body_error == false) {

			// PREPARE INSERT STATEMENT
			// `mails`
			// for from user
			$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important, reply, reply_mail_id, viewed) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			// for to user
			$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important, reply, reply_mail_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($db, $insert)) {
				// SET PARAMETERS
				$mail_id = random_alphanumeric_string(8);
				// $param_mail_to = $email; // mail to
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
				// $select_mtuid = "SELECT id FROM users WHERE email_address = ?";
				// if ($stmt = mysqli_prepare($db, $select_mtuid)) {
				// 	mysqli_stmt_bind_param($stmt, "s", $param_mail_to);
				// 	mysqli_stmt_execute($stmt);
				// 	mysqli_stmt_bind_result($stmt, $mail_to_id);
				// 	while (mysqli_stmt_fetch($stmt)) {
				// 	  	// fetch results
				// 	}	    
				// }

				// `mails`
				// for from user
				$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important, reply, reply_mail_id, viewed) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($db, $insert);
				mysqli_stmt_bind_param($stmt, "isiissssss", $id, $mail_id, $id, $mail_to_id, $param_mail_subject, $param_mail_body, $param_mail_important, $yes, $reply_mail_id, $yes);
				mysqli_stmt_execute($stmt);

				// for to user
				$insert = "INSERT INTO mails(user_id, mail_id, from_user_id, for_user_id, subject, body, important, reply, reply_mail_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($db, $insert);
				mysqli_stmt_bind_param($stmt, "isiisssss", $mail_to_id, $mail_id, $id, $mail_to_id, $param_mail_subject, $param_mail_body, $param_mail_important, $yes, $reply_mail_id);
				mysqli_stmt_execute($stmt);

				// redirect back to sent mails
				header("location: compose_reply_success.php");
			} else {
				// redirect back to sent mails
				header("location: compose_reply_failed.php");
			}	
			// close statement
			mysqli_stmt_close($stmt);	
		}		
  	}
  	// close db connection
  	mysqli_close($db);
?>
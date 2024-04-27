<?php
    // header
    header('Content-Type: application/json');
    
    // start session
    session_start();

    // db connection
    include "db_connect.php";

	if (isset($_POST['mail_to'])) {
 		$response = array();

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

 		// $email = $_POST['mail_to']; // user's email address

        // filter email address
        $email_part = explode("@", $_POST['mail_to']);
        $email = $email_part[0];

        if (empty(trim($_POST['mail_to']))) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Email address is needed</font>';
        } elseif (!filter_var($_POST["mail_to"], FILTER_VALIDATE_EMAIL)) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Email address does not exist</font>';
        } elseif ($from_email == $email) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Operation not allowed</font>';
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
                        $response['status'] = true;
                        $response['msg'] = '<font class="text-success" size="2">Mail will be sent to <b>'.$email.'@'.$project_name.'.com</b></font>';
                    } else {
                        // $email = $email; // email addresss
                        $response['status'] = false;
                        $response['msg'] = '<font class="text-danger" size="2">Email address does not exist</font>';
                    }
                } else {
                    $response['status'] = false;
                    $response['msg'] = '<font class="text-danger" size="2"><b>Ops!</b> Something went wrong, pls try again</font>';
                }
            }
            // close statement
            mysqli_stmt_close($stmt);
        }
        
 		echo json_encode($response);
    }
?>
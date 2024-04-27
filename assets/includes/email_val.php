<?php
    // header
    header('Content-Type: application/json');
    
    // db connection
    include "db_connect.php";

	if (isset($_POST['email'])) {
 		$response = array();

 		$email = $_POST['email']; // user's email address

        if (empty(trim($email))) {
            $response['status'] = true;
            $response['msg'] = '';
        } elseif (strlen($email) < 3) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Email address is too short</font>';
        } elseif (strlen($email) > 15) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Email address is too long</font>';
        } elseif (!preg_match("/^[a-zA-Z0-9]{3,15}+$/ ", $email)) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Email address is must be in letters, with either a number e.g. johndoe1</font>';
        } else {
            // prepare select statement
            $check_email_addr = "SELECT * FROM users WHERE email_address = ?";
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
                        $response['status'] = false;
                        $response['msg'] = '<font class="text-danger" size="2"><b>'.$email.'@'.$project_name.'.com</b> is already taken</font>';
                    } else {
                        $response['status'] = true;
                        $response['msg'] = '<font class="text-success" size="2"><b>'.$email.'@'.$project_name.'.com</b> is ready for use</font>';
                    }
                } else {
                    $response['status'] = false;
                    $response['msg'] = '<font class="text-danger" size="2"><b>Ops!</b> Something went wrong, pls try again later</font>';
                }
            }
            // close statement
            mysqli_stmt_close($stmt);
        }
        
 		echo json_encode($response);
    }
?>
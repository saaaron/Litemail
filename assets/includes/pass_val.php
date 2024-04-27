<?php
    // header
    header('Content-Type: application/json');
    
	if (isset($_POST['pass'])) {
 		$response = array();

 		$password = $_POST['pass']; // user's full name

        if (empty($password)) {
            $response['status'] = true;
            $response['msg'] = '';
        } elseif (strlen($password) < 6) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Password is too short</font>';
        } elseif (strlen($password) > 150) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Password is too long</font>';
        } else {
            $response['status'] = true;
            $response['msg'] = '';
        }
        
 		echo json_encode($response);
    }
?>
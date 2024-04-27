<?php
    // header
    header('Content-Type: application/json');
    
	if (isset($_POST['full_name'])) {
 		$response = array();

 		$full_name = $_POST['full_name']; // user's full name

        if (empty(trim($full_name))) {
        	$response['status'] = true;
        	$response['msg'] = '';
        } elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $full_name)) < 3) {
			$response['status'] = false;
 			$response['msg'] = '<font class="text-danger" size="2">Full name is too short</font>';
 		} elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $full_name)) > 20) {
 			$response['status'] = false;
 			$response['msg'] = '<font class="text-danger" size="2">Full name is too long</font>';
 		} elseif (!preg_match("/^[a-zA-Z\s]{3,30}+$/ ", $full_name)) {
 			$response['status'] = false;
 			$response['msg'] = '<font class="text-danger" size="2">Full name must be in letters with either a space</font>';
 		} else {
 			$response['status'] = true;
 			$response['msg'] = '';
 		}
        
 		echo json_encode($response);
    }
?>
<?php
    // header
    header('Content-Type: application/json');
    
    if (isset($_POST['subject'])) {
 		$response = array();

 		$subject = $_POST['subject']; // mail's subject

        if (empty(trim($subject))) {
            $response['status'] = false;
            $response['msg'] = "<font class='text-danger' size='2'>Emails without a subject are tagged as spam mails. They can't be starred nor sent as important mails</font>";
        } elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $subject)) < 1) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Subject is too short</font>';
        } elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $subject)) > 50) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Subject is too long</font>';
        } elseif (!preg_match("/^[a-zA-Z0-9!?\s]{1,50}+$/ ", $subject)) {
            $response['status'] = false;
            $response['msg'] = '<font class="text-danger" size="2">Only a-z, 0-9, !, ? and spaces are allowed</font>';
        } else {
            $response['status'] = true;
            $response['msg'] = '';
        }
        
 		echo json_encode($response);
    }
?>
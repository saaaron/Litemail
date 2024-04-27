<?php  
	// header
	header('Content-Type: application/json');
	
	// start session
	session_start();
	
	// connect to db
	include 'db_connect.php';

	if (isset($_SESSION)) {
		// user's id
		$id = $_SESSION['id'];

		// inbox
		$inbox = "SELECT * FROM mails WHERE user_id = ? AND for_user_id = ? AND subject != '' AND recycled = 'no'";
		if ($stmt = mysqli_prepare($db, $inbox)) {
			mysqli_stmt_bind_param($stmt, "ii", $id, $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_inbox = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_inbox_sidebar = '';
			} else {
				$total_num_of_inbox_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// inbox (new)
		$inbox_new = "SELECT * FROM mails WHERE user_id = ? AND for_user_id = ? AND subject != '' AND recycled = 'no' AND viewed = 'no'";
		if ($stmt = mysqli_prepare($db, $inbox_new)) {
			mysqli_stmt_bind_param($stmt, "ii", $id, $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$new_total_inbox = '';
				$sm_new_total_inbox = '';
			} else {
				$new_total_inbox = number_format(mysqli_stmt_num_rows($stmt)).' new';
				$sm_new_total_inbox = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// starred
		$starred = "SELECT * FROM mails WHERE user_id = ? AND subject != '' AND starred = 'yes' AND recycled = 'no'";
		if ($stmt = mysqli_prepare($db, $starred)) {
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_starred = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_starred_sidebar = '';
			} else {
				$total_num_of_starred_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// important
		$important = "SELECT * FROM mails WHERE user_id = ? AND for_user_id = ? AND subject != '' AND important = 'yes' AND recycled = 'no'";
		if ($stmt = mysqli_prepare($db, $important)) {
			mysqli_stmt_bind_param($stmt, "ii", $id, $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_important = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_important_sidebar = '';
			} else {
				$total_num_of_important_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// sent
		$sent = "SELECT * FROM mails WHERE user_id = ? AND from_user_id = ? AND recycled = 'no'";
		if ($stmt = mysqli_prepare($db, $sent)) {
			mysqli_stmt_bind_param($stmt, "ii", $id, $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_sent = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_sent_sidebar = '';
			} else {
				$total_num_of_sent_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// all mails
		$all_mails = "SELECT * FROM mails WHERE user_id = ? AND subject != '' AND recycled = 'no'";
		if ($stmt = mysqli_prepare($db, $all_mails)) {
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_all_mails = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_all_mails_sidebar = '';
			} else {
				$total_num_of_all_mails_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// spam
		$spam = "SELECT * FROM mails WHERE user_id = ? AND for_user_id = ? AND subject = '' AND recycled = 'no'";
		if ($stmt = mysqli_prepare($db, $spam)) {
			mysqli_stmt_bind_param($stmt, "ii", $id, $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_spam = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_spam_sidebar = '';
			} else {
				$total_num_of_spam_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// bin
		$bin = "SELECT * FROM mails WHERE (from_user_id = ? OR for_user_id = ?) AND user_id = ? AND recycled = 'yes'";
		if ($stmt = mysqli_prepare($db, $bin)) {
			mysqli_stmt_bind_param($stmt, "iii", $id, $id, $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}

			$total_num_of_bin = number_format(mysqli_stmt_num_rows($stmt));

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$total_num_of_bin_sidebar = '';
			} else {
				$total_num_of_bin_sidebar = number_format(mysqli_stmt_num_rows($stmt));
			}
		}

		// data 
		$data = array(
	        'total_num_of_inbox'  => $total_num_of_inbox,
	        'total_num_of_inbox_sidebar' => $total_num_of_inbox_sidebar,
	        'new_total_inbox' => $new_total_inbox,
	        'sm_new_total_inbox' => $sm_new_total_inbox,
	        'total_num_of_starred' => $total_num_of_starred,
	        'total_num_of_starred_sidebar' => $total_num_of_starred_sidebar,
	        'total_num_of_important' => $total_num_of_important,
	        'total_num_of_important_sidebar' => $total_num_of_important_sidebar,
	        'total_num_of_sent' => $total_num_of_sent,
	        'total_num_of_sent_sidebar' => $total_num_of_sent_sidebar,
	        'total_num_of_all_mails' => $total_num_of_all_mails,
	        'total_num_of_all_mails_sidebar' => $total_num_of_all_mails_sidebar,
	        'total_num_of_spam' => $total_num_of_spam,
	        'total_num_of_spam_sidebar' => $total_num_of_spam_sidebar,
	        'total_num_of_bin' => $total_num_of_bin,
	        'total_num_of_bin_sidebar' => $total_num_of_bin_sidebar
	    );

		// data (encoded with json)
    	echo json_encode($data);

	    // close statement
		mysqli_stmt_close($stmt);
	}
	// close db connection
  	mysqli_close($db);
?>
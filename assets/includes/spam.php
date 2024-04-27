<?php 
	// varaible
	$spam = "";

	// select posts 
	$select_spam = "SELECT * FROM mails WHERE user_id = ? AND for_user_id = ? AND subject = '' AND recycled = 'no' ORDER BY date_n_time DESC";
	$stmt = mysqli_prepare($db, $select_spam);
	mysqli_stmt_bind_param($stmt, "ii", $id, $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$mail_id = $row["mail_id"];
		$from_user_id = $row["from_user_id"];
		$mail_subject = $row["subject"];
		$mail_body = strip_tags($row["body"]);
		$date_n_time = $row["date_n_time"];

		// select from user's full name query
		$select_fufn = "SELECT full_name FROM users WHERE id = ?";
		if ($stmt = mysqli_prepare($db, $select_fufn)) {
			mysqli_stmt_bind_param($stmt, "i", $from_user_id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $from_user_full_name);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}	    

			if (mysqli_stmt_num_rows($stmt) == 0) {
				$from_user_full_name = "User";
			}
		}

		// highlight email as new if not viewed
		if ($row["viewed"] == "no") {
			$new = '<span class="badge bg-danger">new</span>';
			$text_muted = '';
		} else {
			$new = '';
			$text_muted = ' text-muted';
		}

		// filter mail body
		if (strlen($mail_body) > 41) {
			$mail_body = mb_substr($mail_body, 0, 41).'...';
		} else {
			$mail_body = $mail_body;
		}

		$spam .= '
			<div class="card d-flex justify-content-start border-0 p-2 mail-cont mail_to_delete">
				<div class="d-flex justify-content-between">
					<a href="mail/'.$mail_id.'">
						<div class="me-2 mail-title-prev'.$text_muted.'">
							<b>'.$from_user_full_name.': '.$mail_subject.'</b>
							'.$new.'
						</div>
					</a>
					<div class="d-flex justify-content-end">
						<div>
							<button id="mailID_'.$mail_id.'" class="btn p-0 mail_delete_button" type="button" title="recycle"><span class="bi-trash3 text-muted"></span></button>
						</div>
					</div>
				</div>
				<a href="mail/'.$mail_id.'">
					<div class="d-flex justify-content-between mail-body-prev'.$text_muted.'">
						<div>'.$mail_body.'</div>
						<div>
							'.format_time($date_n_time).'
						</div>
					</div>
				</a>
			</div>';
	}

	// check if mails exist
	$query = "SELECT * FROM mails WHERE user_id = ? AND for_user_id = ? AND subject = '' AND recycled = 'no'";
	if ($stmt = mysqli_prepare($db, $query)) {
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

		if (mysqli_stmt_num_rows($stmt) == 0) {
			$spam = '
				<div class="card border-0 p-5 text-muted text-center">
					<div class="bi-exclamation-circle" style="font-size: 20pt;"></div>
					<p>No mails yet</p>
				</div>';
		}
	}
?>
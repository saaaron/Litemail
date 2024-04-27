<?php 
	// varaible
	$sent = "";

	// select posts 
	$select_sent = "SELECT * FROM mails WHERE user_id = ? AND from_user_id = ? AND recycled = 'no' ORDER BY date_n_time DESC";
	$stmt = mysqli_prepare($db, $select_sent);
	mysqli_stmt_bind_param($stmt, "ii", $id, $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$mail_id = $row["mail_id"];
		$from_user_id = $row["from_user_id"];
		$mail_subject = $row["subject"];
		$mail_body = strip_tags($row["body"]);
		$mail_starred = $row["starred"];
		$date_n_time = $row["date_n_time"];

		// filter mail body
		if (strlen($mail_body) > 41) {
			$mail_body = mb_substr($mail_body, 0, 41).'...';
		} else {
			$mail_body = $mail_body;
		}

		// star button
		if ($mail_starred == "no") {
			$star_button = '
			<div class="me-2 star" id="mail_id_'.$mail_id.'">
				<button type="button" action="javascript: void(0)" class="btn p-0" title="star"><span class="bi-star text-muted"></span></button>
			</div>';
		} else {
			$star_button = '
			<div class="me-2 star" id="mail_id_'.$mail_id.'">
				<button type="button" action="javascript: void(0)" class="btn p-0" title="star"><span class="bi-star-fill text-warning"></span></button>
			</div>';
		}

		$sent .= '
			<div class="card d-flex justify-content-start border-0 p-2 mail-cont mail_to_delete">
				<div class="d-flex justify-content-between">
					<a href="mail/'.$mail_id.'">
						<div class="me-2 mail-title-prev text-muted">
							<b>You: '.$mail_subject.'</b>
						</div>
					</a>
					<div class="d-flex justify-content-end">
						'.$star_button.'
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
	$query = "SELECT * FROM mails WHERE user_id = ? AND from_user_id = ? AND recycled = 'no'";
	if ($stmt = mysqli_prepare($db, $query)) {
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

		if (mysqli_stmt_num_rows($stmt) == 0) {
			$sent = '
				<div class="card border-0 p-5 text-muted text-center">
					<div class="bi-exclamation-circle" style="font-size: 20pt;"></div>
					<p>No mails yet</p>
				</div>';
		}
	}
?>
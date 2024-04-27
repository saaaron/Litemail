<?php 
	// select mail 
	$select_mail_q = "SELECT * FROM mails WHERE user_id = ? AND mail_id = ? AND recycled = 'no'";
	$stmt = mysqli_prepare($db, $select_mail_q);
	mysqli_stmt_bind_param($stmt, "is", $id, $vmail_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$vfrom_user_id = $row["from_user_id"];
		$vfor_user_id = $row["for_user_id"];
		$vmail_subject = $row["subject"];
		$vmail_body = $row["body"];
		$vmail_starred = $row["starred"];
		$reply = $row["reply"];
		$reply_mail_id = $row["reply_mail_id"];
		$vdate_n_time = $row["date_n_time"];

		if ($vfrom_user_id == $id) {
			$vfrom_user_full_name = "You";

			// select email address query
			$select_fufn = "SELECT email_address FROM users WHERE id = ?";
			if ($stmt = mysqli_prepare($db, $select_fufn)) {
				mysqli_stmt_bind_param($stmt, "i", $vfrom_user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $vfrom_user_email_address);
				while (mysqli_stmt_fetch($stmt)) {
					// fetch results
				}	    
			}
		} else {
			// select from user's full name & email address query
			$select_fufn = "SELECT full_name, email_address FROM users WHERE id = ?";
			if ($stmt = mysqli_prepare($db, $select_fufn)) {
				mysqli_stmt_bind_param($stmt, "i", $vfrom_user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $vfrom_user_full_name, $vfrom_user_email_address);
				while (mysqli_stmt_fetch($stmt)) {
					// fetch results
				}	    

				if (mysqli_stmt_num_rows($stmt) == 0) {
					$vfrom_user_full_name = "User";
					$vfrom_user_email_address = "user";
				}
			}
		}

		if ($vfor_user_id == $id) {
			$vfor_user_full_name = "You";

			// select to (recipient's) email address
			$select_fufn = "SELECT email_address FROM users WHERE id = ?";
			if ($stmt = mysqli_prepare($db, $select_fufn)) {
				mysqli_stmt_bind_param($stmt, "i", $vfor_user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $vfor_user_email_address);
				while (mysqli_stmt_fetch($stmt)) {
					// fetch results
				}
			}	
		} else {
			// select to (recipient's) full name & email address
			$select_fufn = "SELECT full_name, email_address FROM users WHERE id = ?";
			if ($stmt = mysqli_prepare($db, $select_fufn)) {
				mysqli_stmt_bind_param($stmt, "i", $vfor_user_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $vfor_user_full_name, $vfor_user_email_address);
				while (mysqli_stmt_fetch($stmt)) {
					// fetch results
				}

				if (mysqli_stmt_num_rows($stmt) == 0) {
					$vfor_user_full_name = "User";
					$vfor_user_email_address = "user";
				}
			}
		}

		// star button
		if ($vmail_starred == "no" && $vmail_subject !== "") {
			// star button
			$vstar_button = '
			<div class="me-2 star" id="mail_id_'.$vmail_id.'">
				<button type="button" action="javascript: void(0)" class="btn p-0" title="star"><span class="bi-star text-muted"></span></button>
			</div>';
		} elseif ($vmail_starred == "yes" && $vmail_subject !== "") {
			// unstar button
			$vstar_button = '
			<div class="me-2 star" id="mail_id_'.$vmail_id.'">
				<button type="button" action="javascript: void(0)" class="btn p-0" title="star"><span class="bi-star-fill text-warning"></span></button>
			</div>';
		} else {
			$vstar_button = '';
		}

		// reply
		if ($reply == "yes") {
			// select reply mail's subject
			$select_rm = "SELECT subject FROM mails WHERE mail_id = ?";
			if ($stmt = mysqli_prepare($db, $select_rm)) {
				mysqli_stmt_bind_param($stmt, "s", $row['reply_mail_id']);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $reply_mail_subject);
				while (mysqli_stmt_fetch($stmt)) {
					// fetch results
				}
			}

			$reply_mail_cont = '
			<div class="card border-0 p-2 mb-2 mail-info">
				<div>
					<span class="bi-reply"></span>
					<b>Reply for:</b>
				</div>
				<div>
					<a href="../mail/'.$reply_mail_id.'">'.$reply_mail_subject.'</a>
				</div>
			</div>';
		} else {
			$reply_mail_cont = "";
		}
	}

	// check if mail id exist
	$check_mail_id = "SELECT * FROM mails WHERE user_id = ? AND mail_id = ? AND recycled = 'no'";
    if ($stmt = mysqli_prepare($db, $check_mail_id)) {
        mysqli_stmt_bind_param($stmt, "is", $id, $vmail_id);
        mysqli_stmt_execute($stmt);
        while (mysqli_stmt_fetch($stmt)) {
            // fetch results
        }

        // if mail id already exist
        if (mysqli_stmt_num_rows($stmt) == 0) {
            // redirect back to inbox
            header("location: ../inbox");
        } 
    }
?>
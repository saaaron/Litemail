<?php
	// start session
    session_start();

	// db connection
	include 'db_connect.php';

	if (isset($_GET["mail_id"])) {

		$id = $_SESSION['id']; // user's id

	    $mail_id = $_GET["mail_id"]; // mail's id
 
	    // PREPARE INSERT STATEMENT
	    // mail
	    $query = "SELECT starred FROM mails WHERE user_id = ? AND mail_id = ?";

	    // star mail
	    $query = "UPDATE mails SET starred = ? WHERE user_id = ? AND mail_id = ?";

	    if ($stmt = mysqli_prepare($db, $query)) {

	    	// mail
	    	$query = "SELECT starred FROM mails WHERE user_id = ? AND mail_id = ?";
			if ($stmt = mysqli_prepare($db, $query)) {
				mysqli_stmt_bind_param($stmt, "is", $id, $mail_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $starred);
				while (mysqli_stmt_fetch($stmt)) {
				  	// fetch results
				}

				$yes = "yes";
				$no = "no";

				// if starred
				if ($starred == "no") {
				  	// star mail
	    			$query = "UPDATE mails SET starred = ? WHERE user_id = ? AND mail_id = ?";
					$stmt = mysqli_prepare($db, $query);
					mysqli_stmt_bind_param($stmt, "sis", $yes, $id, $mail_id);
					mysqli_stmt_execute($stmt);

					// star button (starred)
					echo '
					<button type="button" action="javascript: void(0)" class="btn p-0" title="star"><span class="bi-star-fill text-warning"></span></button>';
				} else {
					// unstar mail
					$query = "UPDATE mails SET starred = ? WHERE user_id = ? AND mail_id = ?";
					$stmt = mysqli_prepare($db, $query);
					mysqli_stmt_bind_param($stmt, "sis", $no, $id, $mail_id);
					mysqli_stmt_execute($stmt);

					// star button (not starred)
					echo '
					<button type="button" action="javascript: void(0)" class="btn p-0" title="star"><span class="bi-star text-muted"></span></button>';
				}
			}
			// close statement
			mysqli_stmt_close($stmt);
	    }
		// close db connection
	    mysqli_close($db);
	}
?>
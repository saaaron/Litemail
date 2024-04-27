<?php 
	// select user
	$select_user = "SELECT * FROM users WHERE id = ?";
	$stmt = mysqli_prepare($db, $select_user);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$user_full_name = $row["full_name"];
		$user_email_address = $row["email_address"];
		$user_dob = $row["dob"];
		$user_gender = $row["gender"];

		$user_email_address = $user_email_address.'@'.$project_name.'.com';

		// gender
		if ($user_gender == "male") {
			$male_selected = " selected";
			$female_selected = "";
		} else {
			$male_selected = "";
			$female_selected = " selected";
		}

		// user profile photo
		if ($row["profile_photo"] == null) {
			$user_profile_photo = '<img src="'.$locator.'assets/img/users/default.png" alt="user">';
		} else {
			$user_profile_photo = '<img src="'.$locator.'assets/img/users/'.$row["profile_photo"].'" alt="user">';
		}

		// theme
		if ($row["theme"] == "default") {
			$default_selected = " checked";
			$dark_selected = "";
			$user_theme = '<link rel="stylesheet" type="text/css" href="'.$locator.'assets/css/style.css">';
		} else {
			$default_selected = "";
			$dark_selected = " checked";
			$user_theme = '<link rel="stylesheet" type="text/css" href="'.$locator.'assets/css/dark.css">';
		}
	}

?>
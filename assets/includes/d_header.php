<?php
	// start session
	session_start();

	// user's session
	if (isset($_SESSION["id"])) {
    	$id = $_SESSION['id'];
    }

    // db connection
	include "../assets/includes/db_connect.php";

	// keep user logged in function
	include "../assets/includes/keep_user_logged_in_function.php";

	// if user's ID session or cookie email is null redirect user back to login page
	if (!loggedin()) {
		header("location: login");
		exit();
	}

	// path locator
	$locator = "";

	// select user's profile
	include "../assets/includes/select_user_profile.php";

	// format time function
	include "../assets/includes/format_time_function.php";

	// inbox
	include "../assets/includes/inbox.php";

	// starred
	include "../assets/includes/starred.php";

	// important
	include "../assets/includes/important.php";

	// all mails
	include "../assets/includes/all_mails.php";

	// sent
	include "../assets/includes/sent.php";

	// spam
	include "../assets/includes/spam.php";

	// bin
	include "../assets/includes/bin.php";

	// log msg
	if (isset($_GET['log_msg'])) {
		if ($_GET['log_msg'] == "compose_success") {
			$log_msg = '
			<div class="fixed-bottom alert_fade">
				<div class="bg-success text-center text-white p-1 adj_alert_sm">
					<span class="bi-envelope-check"></span> Mail sent successfully!
				</div>
			</div>';
		} elseif ($_GET['log_msg'] == "compose_failed") {
			$log_msg = '
			<div class="fixed-bottom alert_fade">
				<div class="bg-danger text-center text-white p-1 adj_alert_sm">
					<span class="bi-envelope-exclamation"></span> Mail failed!
				</div>
			</div>';
		} elseif ($_GET['log_msg'] == "mail_deleted") { 
			$log_msg = '
			<div class="fixed-bottom alert_fade">
				<div class="bg-success text-center text-white p-1 adj_alert_sm">
					<span class="bi-envelope-x"></span> Mail deleted successfully!
				</div>
			</div>';
		} elseif ($_GET['log_msg'] == "reply_success") {
			$log_msg = '
			<div class="fixed-bottom alert_fade">
				<div class="bg-success text-center text-white p-1 adj_alert_sm">
					<span class="bi-envelope-check"></span> Mail replied successfully!
				</div>
			</div>';
		} elseif ($_GET['log_msg'] == "reply_failed") {
			$log_msg = '
			<div class="fixed-bottom alert_fade">
				<div class="bg-danger text-center text-white p-1 adj_alert_sm">
					<span class="bi-envelope-exclamation"></span> Mail reply failed!
				</div>
			</div>';
		} else {
			$log_msg = '';
		}
	} else {
		$log_msg = '';
	}
	
	echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="'.$author.'">
	<title>'.$page_title.'</title>
	<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
	'.$user_theme.'
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/summernote-bs5.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/croppie.css">
</head>
<body>
	<header class="d-flex justify-content-between fixed-top">
		<div class="img-thumbnail border-0">
		   	<a href="inbox">
		    	<img src="assets/img/logo.png" alt="logo">
		   	</a>
		</div>
		<div class="d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block">
			<form id="search_form" method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" enctype="multipart/form-data" accept-charset="utf-8">
				<input id="res" class="form-control adj-search-width clear_search_txt" type="text" name="search" placeholder="Type something..." onKeyUp="fx(this.value)" autocomplete="off">
			</form>
			<div id="lg_xl_results"></div>
		</div>
		<div class="mr-0">
		    <div class="dropdown profile-prev-head">
		    	<a href="#" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expended="false">	
		    		<div class="d-flex align-items-center">
					    <div class="sm-profile-pic-prev me-2">
					    	'.$user_profile_photo.'
					    </div>
					    <div class="d-flex justify-content-start">
					    	<div class="d-none d-sm-block d-sm-none d-md-block me-1"><b id="lg_xl_user_full_name">'.$user_full_name.'</b></div>
					    	<div class="bi-caret-down-fill"></div>
					    </div>
					   </div>
				</a>
			    <ul class="dropdown-menu p-2 shadow" style="width: 200px;">
			    	<li><a class="dropdown-item rounded-2 mb-1" href="profile"><span class="bi-person"></span> My Profile</a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="inbox"><span class="bi-inbox"></span> Inbox <span class="text-danger sidebar_total_inbox_count">'.$total_num_of_inbox_sidebar.'</span> <span class="badge bg-danger new_total_inbox_count"></span></a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="starred"><span class="bi-star"></span> Starred <span class="text-danger sidebar_total_starred_count">'.$total_num_of_starred_sidebar.'</span></a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="important"><span class="bi-bookmark-star"></span> Important <span class="text-danger sidebar_total_important_count">'.$total_num_of_important_sidebar.'</span></a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="sent"><span class="bi-send"></span> Sent <span class="text-danger sidebar_total_sent_count">'.$total_num_of_sent_sidebar.'</span></a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="all_mails"><span class="bi-mailbox"></span> All mails <span class="text-danger sidebar_total_all_mails_count">'.$total_num_of_all_mails_sidebar.'</span></a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="spam"><span class="bi-shield-exclamation"></span> Spam <span class="text-danger sidebar_total_spam_count">'.$total_num_of_spam_sidebar.'</span></a></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="bin"><span class="bi-trash3"></span> Bin <span class="text-danger sidebar_total_bin_count">'.$total_num_of_bin_sidebar.'</span></a></li>
					<li><hr class="dropdown-divider"></li>
					<li class="d-md-none d-lg-block d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none"><a class="dropdown-item rounded-2 mb-1" href="#" data-bs-toggle="modal" data-bs-target="#settings"><span class="bi-gear"></span> Settings</a></li>
					<li><a class="dropdown-item rounded-2 text-danger" href="logout"><span class="bi-door-open"></span> Logout</a></li>
			    </ul>
			</div>
		</div>
	</header>
	<!-- compose mail modal -->
	<div class="modal fade" id="settings">
		<div class="modal-dialog modal-fullscreen-sm-down">
			<div class="modal-content">
				<div class="modal-header p-1 pe-2 ps-2">
					<h6 class="modal-title">Settings</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="d-grid gap-2">
						<div>
							<h6>Account</h6>
							<div><a href="change_password">Change password</a></div>
							<div><a href="delete_acct">Delete account</a></div>
						</div>
						<div>
							<h6>Appearance</h6>
							<a href="change_theme">Change theme</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-center">
		'.$log_msg.'
	</div>';

	// highlight active page
	include "../assets/includes/highlight_active_page.php";
?>
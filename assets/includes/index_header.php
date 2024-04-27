<?php  
	// start session
	session_start();

	// db connection
	include "assets/includes/db_connect.php";

	// keep user logged in function
	include "assets/includes/keep_user_logged_in_function.php";

	// if user's ID session or cookie email is not null direct user to dashboard's homepage
	if (loggedin()) {
		header("location: all_mails");
		exit();
	}

	echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="'.$description.'">
		<meta name="author" content="'.$author.'">
		<title>'.ucwords($project_name).$page_name.'</title>
		<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/montserrat.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	</head>
	<body>
		<header class="d-flex justify-content-between bg-white fixed-top">
			<div class="img-thumbnail border-0">
				<a href="home">
				   	<img src="assets/img/logo.png" alt="logo">
				</a>
			</div>
			<div class="mr-0">
				<a href="login">
					<button class="btn btn-outline-danger">Get started</button>
				</a>
			</div>
		</header>';
?>
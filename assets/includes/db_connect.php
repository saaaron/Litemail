<?php
	$db = mysqli_connect('localhost', 'root', '', 'litemail');

	// Evaluate connection
	if(mysqli_connect_errno()) {
		echo 'Ops! A problem occured while trying to connect to database';
		exit();
	}

	// project info
	$project_name = "litemail"; // project's name
	$description = "Simple, lightweight, and fast email system built in PHP"; // project's description
	$author = "Aaron Saleh"; // project's author
?>
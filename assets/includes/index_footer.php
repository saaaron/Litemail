<?php
	echo '	
	<footer class="fixed-bottom p-4">
		<div class="text-center">
			&copy; 2024 Built by <a href="https://saaaron.github.io/" target="_blank">Sa Aaron</a>
		</div>
	</footer>
	<script src="assets/js/jquery-3.7.0.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>';

	if ($page_name == " - Login") {
		echo '<script src="assets/js/HideShowPassword.min.js"></script>
		<script src="assets/js/show_hide_password.js"></script>';
	} elseif ($page_name == " - Signup") {
		echo '<script src="assets/js/HideShowPassword.min.js"></script>
		<script src="assets/js/show_hide_password.js"></script>
		<script src="assets/js/signup.js"></script>
		<script src="assets/js/signup_validations.js"></script>';
	} 
	
	echo '	
</body>
</html>';
?>
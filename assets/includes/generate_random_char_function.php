<?php  
	function random_alphanumeric_string($length) {
    	$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	return substr(str_shuffle(str_repeat($chars, ceil($length/strlen($chars)))), 0, $length);
	}
?>
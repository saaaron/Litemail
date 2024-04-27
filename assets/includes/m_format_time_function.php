<?php  
	function format_time($timestamp) {  
      	date_default_timezone_set("Africa/Lagos"); 
    	$time_ago = strtotime($timestamp);  
      	$current_time = time();  
      	$time_difference = $current_time - $time_ago;  
      	$seconds = $time_difference;  
      	$minutes = round($seconds / 60 ); // value 60 is seconds  
      	$hours = round($seconds / 3600);  // value 3600 is 60 minutes * 60 sec  
      	$days = round($seconds / 86400);  // 86400 = 24 * 60 * 60;  
     	  $weeks = round($seconds / 604800); // 7*24*60*60;  
      	$months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
      	$years = round($seconds / 31553280); // (365+365+365+365+366)/5 * 24 * 60 * 60  

      	// if seconds is less than equal to 60
      	if ($seconds <= 60) {  
     		return "<span class='text-muted'>Just now</span>";  
   		} elseif ($minutes <= 60) { // if seconds is less than equal to 60  
     		if($minutes == 1) {  
       			return "<span class='text-muted'>1 minute ago</span>";  
     		} else {  
       			return "<span class='text-muted'>".$minutes." minutes ago</span>";  
     		}  
   		} elseif ($hours <= 24) { // if hour  
     		if($hours == 1) {  
       			return "<span class='text-muted'>1 hour ago</span>";  
     		} else {  
       			return "<span class='text-muted'>".$hours." hours ago</span>";  
     		}  
   		} elseif ($days <= 7) {  // if week 
     		if($days==1) {  
       			return "<span class='text-muted'>yesterday</span>";  
     		} else {  
       			return "<span class='text-muted'>".$days." days ago</span>";  
     		}  
   		} elseif($weeks <= 4.3) { // 4.3 == 52/12  
        	if($weeks == 1) {  
       			return "<span class='text-muted'>1 week ago</span>";  
     		} else {  
       			return "<span class='text-muted'>".$weeks." weeks ago</span>";  
     		}  
   		} elseif ($months <= 12) { // if months   
     		if($months==1) {  
       			return "<span class='text-muted'>1 month ago</span>";  
     		} else {  
       			return "<span class='text-muted'>".$months." months ago</span>";  
     		}  
   		} else {  
     		if($years == 1) { // if year  
       			return "<span class='text-muted'>1 year ago</span>";  
     		} else {  
       			return "<span class='text-muted'>".$years." years ago</span>";  
     		}  
   		}  
 	}  
?>
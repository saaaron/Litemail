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
       			return "<span class='text-muted' title='1 minute ago'>1 min ago</span>";  
     		} else {  
       			return "<span class='text-muted' title='".$minutes." minutes ago'>".$minutes." min ago</span>";  
     		}  
   		} elseif ($hours <= 24) { // if hour  
     		if($hours == 1) {  
       			return "<span class='text-muted' title='1 hour ago'>1h ago</span>";  
     		} else {  
       			return "<span class='text-muted' title='".$hours." hours ago'>".$hours."h ago</span>";  
     		}  
   		} elseif ($days <= 7) {  // if week 
     		if($days==1) {  
       			return "<span class='text-muted'>yesterday</span>";  
     		} else {  
       			return "<span class='text-muted' title='".$days." days ago'>".$days."d ago</span>";  
     		}  
   		} elseif($weeks <= 4.3) { // 4.3 == 52/12  
        	if($weeks == 1) {  
       			return "<span class='text-muted' title='1 week ago'>1w ago</span>";  
     		} else {  
       			return "<span class='text-muted' title='".$weeks." weeks ago'>".$weeks."w ago</span>";  
     		}  
   		} elseif ($months <= 12) { // if months   
     		if($months==1) {  
       			return "<span class='text-muted' title='1 month ago'>1m ago</span>";  
     		} else {  
       			return "<span class='text-muted' title='".$months." months ago'>".$months."m ago</span>";  
     		}  
   		} else {  
     		if($years == 1) { // if year  
       			return "<span class='text-muted' title='1 year ago'>1y ago</span>";  
     		} else {  
       			return "<span class='text-muted' title='".$years." years ago'>".$years."y ago</span>";  
     		}  
   		}  
 	}  
?>
<?php  
	echo '
	<div class="d-flex flex-column flex-shrink-0 p-2 sticky-sidebar">
				    <ul class="nav nav-pills flex-column mb-auto d-grid gap-1">
				      	<li>
				        	<a href="'.$locator.'inbox" class="nav-link'.$inbox_active.'">
				          		<span class="bi-inbox"></span> Inbox <span class="text-danger sidebar_total_inbox_count">'.$total_num_of_inbox_sidebar.'</span> <span class="badge bg-danger new_total_inbox_count"></span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="'.$locator.'starred" class="nav-link'.$starred_active.'">
				          		<span class="bi-star"></span> Starred <span class="text-danger sidebar_total_starred_count">'.$total_num_of_starred_sidebar.'</span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="'.$locator.'important" class="nav-link'.$important_active.'">
				          		<span class="bi-bookmark-star"></span> Important <span class="text-danger sidebar_total_important_count">'.$total_num_of_important_sidebar.'</span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="'.$locator.'sent" class="nav-link'.$sent_active.'">
				          		<span class="bi-send"></span> Sent <span class="text-danger sidebar_total_sent_count">'.$total_num_of_sent_sidebar.'</span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="'.$locator.'all_mails" class="nav-link'.$all_mails_active.'">
				          		<span class="bi-mailbox"></span> All mails <span class="text-danger sidebar_total_all_mails_count">'.$total_num_of_all_mails_sidebar.'</span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="'.$locator.'spam" class="nav-link'.$spam_active.'">
				          		<span class="bi-shield-exclamation"></span> Spam <span class="text-danger sidebar_total_spam_count">'.$total_num_of_spam_sidebar.'</span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="'.$locator.'bin" class="nav-link'.$bin_active.'">
				          		<span class="bi-trash3"></span> Bin <span class="text-danger sidebar_total_bin_count">'.$total_num_of_bin_sidebar.'</span>
				        	</a>
				      	</li>
				      	<li>
				        	<a href="#settings" class="nav-link'.$settings_active.'" data-bs-toggle="modal" data-bs-target="#settings">
				          		<span class="bi-gear"></span> Settings
				        	</a>
				      	</li>
				    </ul>
				</div>';
?>
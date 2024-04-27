<?php
	// var
	$inbox_active = $sm_inbox_active = $starred_active = $sm_starred_active = $important_active = $sm_important_active = $sm_search_active = $sent_active = $all_mails_active = $spam_active = $bin_active = $settings_active = "";

	if ($page_title == "My profile" || $page_title == "Mail") {
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Inbox") {
		$inbox_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon0 text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox-fill"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Starred") {
		$starred_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon0 text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star-fill"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Important") {
		$important_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon0 text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star-fill"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Search") {
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon0 text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search-heart-fill"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Sent") {
		$sent_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "All mails") {
		$all_mails_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Spam") {
		$spam_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Bin") {
		$bin_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	} elseif ($page_title == "Settings / Account / Change password" || $page_title == "Settings / Account / Delete Account" || $page_title = "Settings / Appearance / Change theme") {
		$settings_active = " active";
		$sm_inbox_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'inbox">
				<div class="bi-inbox"><span class="badge bg-danger sm_new_total_inbox_count"></span></div>
				<b><font size="1">Inbox</font></b>
			</a>
		</div>';
		$sm_starred_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'starred">
				<div class="bi-star"></div>
				<font size="1">Starred</font></b>
			</a>
		</div>';
		$sm_important_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'important">
				<div class="bi-bookmark-star"></div>
				<font size="1">Important</font>
			</a>
		</div>';
		$sm_search_active = '
		<div class="quick-menu-icon text-center" style="line-height: 90%;">
			<a href="'.$locator.'search">
				<div class="bi-search"></div>
				<font size="1">Search</font>
			</a>
		</div>';
	}
?>
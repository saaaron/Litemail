$('body').prepend('<a href="#" class="go-to-top" title="Go to top"><span class="bi-arrow-up-short"></span></a>');

var amountScrolled = 200;

$(window).scroll(function(){ 
	if ($(window).scrollTop()>amountScrolled) {
		$('a.go-to-top').fadeIn('slow');
	} else { 
		$('a.go-to-top').fadeOut('slow');
	}
});

$('a.go-to-top').click(function() {
	$('html, body').animate({
		scrollTop:0
	}, 200);
	return false;
});
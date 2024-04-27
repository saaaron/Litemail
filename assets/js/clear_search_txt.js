function tog(v) {
	return v?'addClass':'removeClass';
} 
$(document).on('input', '.clear_search_txt', function() {
    $(this)[tog(this.value)]('x');
}).on('mousemove', '.x', function(e) {
    $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
}).on('touchstart click', '.onX', function(ev) {
    ev.preventDefault();
    $(this).removeClass('x onX').val('').change();
    $("#xs_sm_md_results").html('<div class="text-center p-5 text-muted"><div class="bi-search-heart-fill" style="font-size: 20pt;"></div><p>Search for emails using mail subject</p></div>');
    $("#lg_xl_results").html('');
});
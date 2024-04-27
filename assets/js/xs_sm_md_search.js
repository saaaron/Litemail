load_data();
		
function load_data(query) {
	$.ajax({
		url: "assets/includes/xs_sm_md_search.php",
		cache: false,
		method: "POST",
		data: {
			query:query
		},
		success:function(data) {
			$("#xs_sm_md_results").html(data);
		}
	});
} 

$("#xs_sm_md_search").keyup(function() {
	var search = $(this).val();

	if (search != "") {
		load_data(search);
	} else {
		load_data();
	}
});
function fx(str) {
	var sr = document.getElementById("res").value;
	var xmlhttp;

	if (str.length == 0) {
    	document.getElementById("lg_xl_results").innerHTML = "";
  		return;
	}

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} 

	xmlhttp.onreadystatechange = function() {
  		document.getElementById("lg_xl_results").innerHTML = '<div class="text-center p-5"><span class="spinner-border text-secondary" role="status"></span></div>';
  		
  		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		document.getElementById("lg_xl_results").innerHTML = xmlhttp.responseText;
			document.getElementById("lg_xl_results").style.display = "block";
    	}
	}

	xmlhttp.open("GET","../assets/includes/m_lg_xl_search.php?q="+sr,true);
	xmlhttp.send();	
}
// croppie.js change profile phto
var $uploadCrop;

$uploadCrop = $("#preview").croppie({
	viewport: {
		width: 200,
		height: 200,
		type: "circle"
	},
	boundary: {
		width: 200,
		height: 200
	}
});

$("#image").on("change", function() {
	var reader = new FileReader();
	reader.onload = function (event) {
		$uploadCrop.croppie("bind", {
		    url: event.target.result
		}).then(function() {
		    console.log("jQuery bind complete");
		});
	}
	reader.readAsDataURL(this.files[0]);
});

$(".upload").on("click", function (ev) {
	$uploadCrop.croppie("result", {
		type: "canvas",
		size: "viewport"
	}).then(function (response) {
		$.ajax({
		    url:"assets/includes/change_profile_photo.php",
		    type: "POST",
		    data: {"image": response},
		    success:function(d) {
		        $("#change_profile_photo").modal("hide");
		        $(".user-profile-pic").html(d);
		        $(".sm-profile-pic-prev").html(d);
		        $("#image").val("");
		        $(".upload").hide();		    
		    }
		});
	});
});
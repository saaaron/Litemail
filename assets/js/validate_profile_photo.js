// Initially hide the upload button
$('.upload').hide();

$('#image').bind('change', function() {
    var ext = $('#image').val().split('.').pop().toLowerCase();

    // accepted formats (png, jpg, jpeg)
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $('#error1').slideDown("fast");
        $('#error2').slideUp("fast");
        $('.upload').hide(); // Hide the upload button
    } else {
        var picsize = (this.files[0].size);

        // max. upload size (2MB)
        if (picsize > 2097152) {
            $('#error1').slideUp("fast");
            $('#error2').slideDown("fast");
            $('.upload').hide(); // Hide the upload button
        } else {
            $('#error1').slideUp("fast");
            $('#error2').slideUp("fast");
            $('.upload').show(); // Show the upload button
        }
    }
});

// Prevent default behavior of upload button when disabled
$('.upload').on('click', 'button[disabled]', function(event) {
    event.preventDefault();
});
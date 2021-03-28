$('.fileUploadForm').submit(function(e){
    e.preventDefault();
    var fd = new FormData();
    var files = $('#fileToUpload')[0].files;

    fd.append('file',files[0]);

    $.ajax({
		url: 'scripts/create/uploadFileScript.php',
		method: 'POST',
		data: fd,
        contentType: false,
        processData: false,
		dataType: 'json'
	}).done(function(response) {
	    console.log(response.message);
	    // if(response.error) {
	    //     $('.alert').css('background: red');
	    //     $('.alert').innerText(response.message);
	    //     $('.alert').fadeIn(200);
        // }

        // if(response.success) {
        //
        // }
    });
});


$('.overlay-form').click(function(e){
	e.preventDefault();
	
});

$('.close').click(function(e){
	const form = $('.overlay-form');
	const overlay = $(this).closest(form);
    overlay.fadeOut(200);
});
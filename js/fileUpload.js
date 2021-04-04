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
	    if(response.error) {
			alert(response.message);
	        // $('.alert').css('background: red');
	        // $('.alert').innerText(response.message);
	        // $('.alert').fadeIn(200);
        }

        if(response.success) {
			$(".fileUploadForm")[0].reset();
			alert(response.message);
			// $('.alert').css('background: red');
	        // $('.alert').fadeIn(200);
        }
    });
});





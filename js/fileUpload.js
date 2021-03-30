function uploadFile(){
	e.preventDefault();
	var file = document.getElementById('fileToUpload').files[0];
	var formData = new FormData();
	formData.append("fileToUpload", file);
	$.ajax({
		url: 'scripts/fileUploadScript.php',
		method: 'FILES',
		data: formData,
		dataType: 'json',
		success: function(response){
			alert(response);
		}
	});
	
});



$('.fileUploadForm').submit(function(e){
    e.preventDefault();
    alert("test");
	// var id = $(this).data('id');
	// var formData = $(this).serialize();
	// $.ajax({
	// 	url: 'scripts/update/fuckUpdateScript.php',
	// 	method: 'POST',
	// 	data: formData,
	// 	dataType: 'json',
	// 	success: function(response){
	// 		$('.fuck_item[data-id="'+id+'"] .fuck_tj').html(response.fuck);
	// 		$('.fuck_item[data-id="'+id+'"] .hiddentextarea').html(response.fuck);
	// 		$('.edit_fuck').fadeOut(200);
	// 		$('.overlay-form').fadeOut(200);
			
	// 	}
	// });
});


$('.overlay-form').click(function(e){
	e.preventDefault();
	
});
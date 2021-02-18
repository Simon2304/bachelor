$('.editIceForm').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var formData = $(this).serialize();
	console.log(formData);
	$.ajax({
		url: 'scripts/update/iceUpdateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(response){
			$('.data-ice[data-id="'+id+'"] .ice-cp').html(response.cp);
			$('.data-ice[data-id="'+id+'"] .ice-tel').html(response.tel);
			$('.wrapper2').fadeOut(200);
			console.log("test");
		}
	});
});

$('.deleteIceView').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var formData = $(this).serialize();
	console.log(formData);
	$.ajax({
		url: 'scripts/update/iceDeleteScript.php',
		type: 'DELETE',
		data: formData,
		dataType: 'json',
		success: function(response){
			$('.wrapper2').fadeOut(200);
			console.log(response);
		}
	});
});

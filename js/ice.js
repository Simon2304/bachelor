$('.editIceForm').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var formData = $(this).serialize();
	$.ajax({
		url: 'scripts/update/iceUpdateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(response){
			const id = response.id;
			$('.ice-person[data-id="'+id+'"] .ice_cp').html("Contactpersoon: " + response.cp);
			$('.ice-person[data-id="'+id+'"] .ice_tel').html("Telefoonnummer: " + response.tel);
			$('.wrapper2').fadeOut(200);
			$('.overlay-form').fadeOut(200);
		}
	});
});

$('.deleteIceForm').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	$.ajax({
		url: 'scripts/delete/iceDeleteScript.php',
		method: 'POST',
		data: {
			id: id
		},
		dataType: 'json',
		success: function(response){
			$('.ice-person[data-id='+id+']').fadeOut(200);
			$('.wrapper2').fadeOut(200);
			$('.overlay-form').fadeOut(200);
		}
	});
});

$('.no').click(function(e){
	e.preventDefault();
	$('.wrapper2').fadeOut(200);
	$('.overlay-form').fadeOut(200);
});


$('.createIceForm').submit(function(e){
	e.preventDefault();
	var formData = $(this).serialize();
	$.ajax({
		url:'scripts/create/iceCreateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json'
	}).done(function(data) {
		$(".ice_items").prepend(data);
		$('.to_do').fadeOut(200);
		$('.data-create-ice').fadeOut(200);
		$('.overlay-form').fadeOut(200);
	});
});

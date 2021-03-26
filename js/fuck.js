
$('.editFuckForm').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var formData = $(this).serialize();
	$.ajax({
		url: 'scripts/update/fuckUpdateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(response){
			$('.fuck_item[data-id="'+id+'"] .fuck_tj').html(response.fuck);
			$('.fuck_item[data-id="'+id+'"] .hiddentextarea').html(response.fuck);
			$('.edit_fuck').fadeOut(200);
			$('.overlay-form').fadeOut(200);
			
		}
	});
});


$("body").delegate(".createFuckForm", "submit", function(e){
	e.preventDefault();
	const formData = $(this).serialize();
	$.ajax({
		url:'scripts/create/fuckCreateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(data) {
			$('.add_fuck').append(data);
			$('.wrapper2').fadeOut(200);
			$('.overlay-form').fadeOut(200);
		}
	}).fail(function(response) {
		console.log(response);
	});
});

$('.deleteStoryForm').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var formData = $(this).serialize();
	$.ajax({
		url: 'scripts/delete/storyDeleteScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(response){
			$('.fuck_item[data-id='+id+']').fadeOut(200);
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

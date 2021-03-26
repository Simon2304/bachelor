$('.editStoryForm').submit(function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var formData = $(this).serialize();
	$.ajax({
		url: 'scripts/update/storyUpdateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(response){
			$('.story_item[data-id="'+id+'"] .story_tj').html(response.story);
			$('.story_item[data-id="'+id+'"] .hiddentextarea').html(response.story);
			$('.edit_story').fadeOut(200);
			$('.overlay-form').fadeOut(200);
		}
	});
});

$("body").delegate(".createStoryForm", "submit", function(e){
	e.preventDefault();
	const formData = $(this).serialize();
	$.ajax({
		url:'scripts/create/storyCreateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(data) {
			$('.add_story').append(data);
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
			$('.story_item[data-id='+id+']').fadeOut(200);
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

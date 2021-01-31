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
			console.log(response);
		}
	});
});

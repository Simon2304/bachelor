$('.create_story').click(function(e){
	e.preventDefault();
	$.ajax({
		url:'scripts/viewsScript.php?createStory=1',
		success: function (data){
			$(data).insertAfter('.overlay-form .overlay');
			$('.default-modal').fadeIn(200);
		}
	});
});

$('.create_fuck').click(function(e){
	e.preventDefault();
	$.ajax({
		url:'scripts/viewsScript.php?createFuck=1',
		success: function (data){
			$(data).insertAfter('.fuck');
		}
	});
});

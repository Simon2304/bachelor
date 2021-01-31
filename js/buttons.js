$('.horizontal').click(function(e){
	e.preventDefault();
	$.ajax({
		url:'scripts/viewsScript.php?createStory=1',
		success: function (data){
			console.log(data);
		}
	});
});

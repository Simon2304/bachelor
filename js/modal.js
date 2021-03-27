$('.overlay').click(function(e) {
    const overlay = $(this).parent();
    overlay.fadeOut(200);
});

$('.close').click(function(e){
	const form = $('.overlay-form');
	const overlay = $(this).closest(form);
    overlay.fadeOut(200);
});
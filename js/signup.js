$(document).ready(function(){
	$(".signUpForm").submit(function(e){
		e.preventDefault();
		var form = $(this);
		$.ajax({
			url: 'scripts/signupScript.php',
			type: 'POST',
			data: form.serialize()
		}).done(function(response){
			console.log(response);
			if(response != 1){
				$('.errorSignup').text(response);
				$('.errorSignup').fadeIn(200);
			}else{
				$('.wrapper').remove();
				$('body').html('<div class="fout"><img src="images/gaatfout.jpg"></div>');
				setTimeout(function(){
					window.location.href = 'http://localhost/tj/aanmeldpagina/topsecretintel';
				}, 2000);
			}
		});
	});
});

function toggleForm() {
	document.body.classList.toggle('activeForm');
}

function redirect() {
	window.location.replace("http://localhost/tj/aanmeldpagina/topsecretintel");
}


$('.signUpForm').submit(function(e){
	e.preventDefault();
	var formData = $(this).serialize();
	$.ajax({
		url: 'scripts/update/credUpdateScript.php',
		method: 'POST',
		data: formData,
		dataType: 'json',
		success: function(response){
			$('.credentials .editCredForm .fname').html("Voornaam: "+response.firstname);
			$('.credentials .editCredForm .lname').html("Achternaam: "+response.lastname);
			$('.credentials .editCredForm .mail').html("email: "+response.email);
			$('.credentials .editCredForm .tel').html("06-nummer: "+response.phone);
			if (response.imin == 1) {
				$('.credentials .editCredForm .in_out').html("in/out: Ik ga mee");
			} else {
				$('.credentials .editCredForm .in_out').html("in/out: Watje");
			}
			$('.wrapper2').fadeOut(200);
			$('.overlay-form').fadeOut(200);
		}
	});
});

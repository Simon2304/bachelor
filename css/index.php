<?php include('includes/page-top.php'); ?>
	<audio controls autoplay loop="loop" id="my_audio">
 		<source src="audio/Eagles.mp3" type="audio/mpeg">
  		Your browser does not support the audio element.
	</audio>
    <div class="wrapper">
    	<div class="title">Signup form</div>
		<form action="" method="POST" class="signUpForm">
    		<div class="field">
      			<input type="text" name="email" required>
      			<label>E-mailadres</label>
    		</div>
			<div class="field">
      			<input type="text" name="firstname" required>
      			<label>Voornaam</label>
   			</div>
			<div class="field">
      			<input type="text" name="lastname" required>
      			<label>Achternaam</label>
   			</div>
			<div class="field">
      			<input type="text" name="phone" required>
      			<label>Telefoonnummer</label>
   			</div>
			<div class="field">
      			<input type="password" name="password" required>
      			<label>Wachtwoord</label>
   			</div>
			<div class="content">
	          	<div class="checkbox">
	            	<input type="radio" id="in" name="check-in" value="1" checked>
	            	<label for="in" class="mr-10">I'm in!</label>
					<input type="radio" id="out" name="check-in" value="0">
	            	<label for="out">I'm out!</label>
	          	</div>
			</div>
			<div class="field">
				<input type="submit" name='submit' value="Signup">
			</div>
			<div class="field">
				Already signed up? <a href="<?php echo $genurl; ?>info" class="login">Login</a>
			</div>
		</form>
	</div>

<script src="<?php echo $genurl; ?>js/signup.js"></script>

</body>
</html>

<?php include('includes/page-top.php'); ?>
	<audio controls autoplay loop="loop" id="my_audio">
 		<source src="audio/Eagles.mp3" type="audio/mpeg">
  		Your browser does not support the audio element.
	</audio>
    <div class="wrapper">
    	<div class="title">Login</div>
		<form action="info.php" method="POST">
			<div class="field">
      			<input type="text" name="firstname" required>
      			<label>Voornaam</label>
   			</div>
			<div class="field">
      			<input type="password" name="password" required>
      			<label>Wachtwoord</label>
   			</div>

			<div class="field">
				<input type="submit" name='submit' value="Login">
			</div>
		</form>
	</div>

	<?php
	session_start();

	include_once("classes/DBConnect.php");
	include_once("classes/Person.php");
	include_once("classes/User.php");
	include_once("classes/Sessions.php");

	$db_handle = DBConnect::getInstance();
	$user = new User($db_handle);
	$person = new Person($db_handle);
	$session = new Sessions();

	if(isset($_POST['submit'])) {
		$userfname = $_POST['firstname'];
		$password = md5(md5('tjisgay123'.$_POST['password'].'321yagsijt'));
		$checked_user = $user->getUser($userfname, $password);

		if (!empty($checked_user)) {
			$session->setSession($checked_user);
			header('location: topsecretintel');
		}

	}
	?>

</body>
</html>

<?php
/**
* TODO: Add javascript to fill table from DB data.
*/
class Intel {

	public function fuckTJ(){
		echo "
		<div class='wrapper'>
			<div class='title'>Extra info</div>
			<form action='Intel.php' method='POST'>
			<div class='field'>
				<input type='textarea' name='fuck' required>
				<label>Hoe wil jij TJ naaien?</label>
			</div>
			<div class='field'>
				<input type='textarea' name='story' required>
				<label>Heb jij nog een leuk verhaal over TJ?</label>
			</div>
			<div class='field'>
				<input type='submit' name='submit' value='story'>
			</div>
		</div>";

		if(isset($_POST['story']) && !empty($_POST['story'])) {
			$person->insertStory($_POST['fuck'], $_POST['story'], $_SESSION['firstname']);
		}

	}

	public function extraInfo(){
		/**
		* TODO: CP voor nood + Tel voor nood. (upload paspoort)
		*/
		echo "
		<div class='wrapper'>
			<div class='title'>ICE info</div>
			<form action='Intel.php' method='POST'>
			<div class='field'>
				<input type='text' name='contact' required>
				<label>Naam contactpersoon in geval van nood?</label>
			</div>
			<div class='field'>
				<input type='text' name='tel' required>
				<label>Telefoonnummer contactpersoon?</label>
			</div>
			<div class='field'>
				<input type='submit' name='submit' value='ice'>
			</div>
		</div>";

		if(isset($_POST['ice']) && !empty($_POST['ice'])) {
			$person->insertIce($_POST['contact'], $_POST['tel'], $_SESSION['firstname']);
		}
	}

}
 ?>

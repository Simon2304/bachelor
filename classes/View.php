<?php

class View {

	public function createIceView(){
		echo "<div class='data'>";
			//echo "<div class='close-btn'>&times;</div>";
			echo "<h2> Enter credentials</h2>";
			echo "<p> Contactpersoon en telefoonnummer van de persoon die wij moeten bellen in geval van nood </p>";
			echo "<form action='' method='POST' >";
				//echo "<div class='form-element'>";
					echo "<input type='text' name='tel' required>";
					echo "<label for='tel'>Telefoonnummer</label>";
				//echo "</div>";
				//echo "<div class='form-element'>";
					echo "<input type='text' name='name' required>";
					echo "<label for='name'>Naam</label>";
				//echo "</div>";
					//echo "<div class='form-element'>";
					echo "<input type='submit' name='new-ice' value='submit'>";
				//echo "</div>";
			echo "</form>";
		echo "</div>";
	}

	public function readIceView($ice_info){

		if($ice_info == false) {
			echo "<div class='data'>
				<div class='ice'>
					<h2> In Case off Emergency (ICE) </h2>";
			echo "TODO: Insert emergency contact";
			echo "<table>";
			echo "<form action='' method='POST' onclick='toggleForm()'>";
			echo "<tr><td><input type='submit' name='new' value='new'></tr>";
			echo "</form></table>";
			echo "	</div>
			</div>";
		} else {
			for ($i = 0; $i < sizeof($ice_info); $i++) {
				echo "<div class='data'>
					<div class='ice'>
						<h2> In Case off Emergency (ICE) </h2>";
				echo "<table>";
				echo "<form action='' method='POST'>";
				echo "<tr><td><input type='hidden' name='cp' value='".$ice_info[$i]['cp']."'> Contactpersoon: " . $ice_info[$i]['cp'] . "</td></tr>";
				echo "<tr><td><input type='hidden' name='tel' value='".$ice_info[$i]['tel']."'>  Telefoonnummer: " . $ice_info[$i]['tel'] . "</td></tr>";
				echo "<tr><td><input type='hidden' name='id' value='". $ice_info[$i]['id'] ."'>
				<input type='submit' name='delete' value='delete'>&nbsp&nbsp
				<input type='submit' name='edit' value='edit'></tr>";
				echo "</br>";
				echo "</form>";
			}
			echo "<form action='' method='POST'>";
			echo "<tr><td><input type='submit' name='new' value='new'></tr>";
			echo "</form></table>";
			echo "	</div></div>";
		}
	}

	public function deleteIceView(){
		echo "<div class='wrapper2'>";
		echo "<form action='' method='POST'>";
		echo "<tr><td><input type='submit' name='yes' value='yes'></td>
		<td><input type='submit' name='no' value='no'></td></tr>";
		echo "</form>";
		echo "</div>";
	}

	public function updateIceView($edit_form) {
		echo "<div class='wrapper2'>";
		echo "<form action='' method='POST'>";
		echo "<input type='text' name='cp' value='".$edit_form['cp']."'>";
		echo "<input type='text' name='tel' value='".$edit_form['tel']."'>";
		echo "<input type='submit' name='edit_ice' value='edit'>";
		echo "</form>";
		echo "</div>";

	}

	public function updateUserView($edit_form) {
		echo "<div class='wrapper2'>
	    	<div class='title'>Signup form</div>
			<form action='' method='POST' class='signUpForm'>
	    		<div class='field'>
	      			<input type='text' name='email' value='".$edit_form['email']."'required>
	      			<label>E-mailadres</label>
	    		</div>
				<div class='field'>
	      			<input type='text' name='firstname' value='".$edit_form['firstname']."' required>
	      			<label>Voornaam</label>
	   			</div>
				<div class='field'>
	      			<input type='text' name='lastname' value='".$edit_form['lastname']."' required>
	      			<label>Achternaam</label>
	   			</div>
				<div class='field'>
	      			<input type='text' name='phone' value='".$edit_form['phone']."' required>
	      			<label>Telefoonnummer</label>
	   			</div>
				<div class='content'>";
				if ($edit_form['imin'] == 1) {
					echo "<div class='checkbox'><input type='radio' id='in' name='check-in' value='1' checked>
						<label for='in' class='mr-10'>I'm in!</label>
						<input type='radio' id='out' name='check-in' value='0'>
						<label for='out'>I'm out!</label>
					</div>";
				} else {
					echo "<div class='checkbox'><input type='radio' id='in' name='check-in' value='1'>
						<label for='in' class='mr-10'>I'm in!</label>
						<input type='radio' id='out' name='check-in' value='0' checked>
						<label for='out'>I'm out!</label>
					</div>";
				}
				echo "
				</div>
				<div class='field'>
					<input type='submit' name='update_cred' value='update'>
				</div>
			</form>
		</div>";

	}

	public function fuckTjView($fuck_tj) {
		//shuffle($fuck_tj);

		echo "<div class='fuck'>";
		echo "<h2>Ways to fuck with TJ during his bachelorparty</h2>";
		for ($i = 0; $i < sizeof($fuck_tj); $i++) {
			echo "<div class='fuck_item' data-id='".$fuck_tj[$i]['id']."'>";
			echo "<form action='' method='POST'>";
			echo "<div class='user_info'>";
			echo "<img src='images/avatar".$fuck_tj[$i]['id'].".png' class='avatar'>";
			echo "<h3>".$fuck_tj[$i]['name']."</h3>";
			echo "</div>";
			echo "<div class='fuck_tj'>".nl2br($fuck_tj[$i]['fuck'])."</div>";
			echo "<textarea class='hiddentextarea' name='fuck_tj'>".nl2br($fuck_tj[$i]['fuck'])."</textarea>";
			echo "<input type='hidden' name='id' value='".$fuck_tj[$i]['id']."'>";
			if ($fuck_tj[$i]['user_id'] == $_SESSION['id']) {
				echo "<input type='submit' name='edit_f' value='edit'>";
				echo "<input type='submit' name='delete_f' value='delete'>";
				echo "</form>";
			} else {
				echo "</form>";
			}
			echo "</div>";
		}
		echo "<a class='horizontal'><span class='text'>Add</span></a>";
		echo "</div>";
	}

	public function storyTjView($fuck_tj) {
		//shuffle($fuck_tj);

		// Kleine 'profielfoto' voor de naam. (zelf toegevoegd en gekoppeld aan id, niet vooraf bepaald)
		// foto's van gitaristen gebruiken? Of spongebob figuren?
		// Titel boven feed?
		echo "<div class='story'>";
		echo "<h2>Stories about TJ</h2>";
		for ($i = 0; $i < sizeof($fuck_tj); $i++) {
			echo "<div class='story_item' data-id='".$fuck_tj[$i]['id']."'>";
			echo "<form action='' method='POST'>";
			echo "<div class='user_info'>";
			echo "<img src='images/avatar".$fuck_tj[$i]['id'].".png' class='avatar'>";
			echo "<h3>".$fuck_tj[$i]['name']."</h3>";
			echo "</div>";
			echo "<div class='story_tj'>".nl2br($fuck_tj[$i]['story'])."</div>";
			echo "<textarea class='hiddentextarea' name='story_tj'>".nl2br($fuck_tj[$i]['story'])."</textarea>";
			echo "<input type='hidden' name='id' value='".$fuck_tj[$i]['id']."'>";
			if ($fuck_tj[$i]['user_id'] == $_SESSION['id']) {
				echo "<input type='submit' name='edit_s' value='edit'>";
				echo "<input type='submit' name='delete_s' value='delete'>";
				echo "</form>";
			} else {
				echo "</form>";
			}
			echo "</div>";
		}
		echo "<a class='horizontal'><span class='text'>Add</span></a>";
		echo "</div>";
	}

	public function editFuckTjView($edit_form) {
		echo "<div class='edit_fuck'>";
		echo "<form action='' class='editFuckForm' data-id='".$edit_form['id']."' method='POST'>";
		echo "<textarea name='fuck'>".$edit_form['fuck']."</textarea>";
		echo "<input type='hidden' name='id' value='".$edit_form['id']."'>";
		echo "<input type='submit' name='update_fuck' value='edit'>";
		echo "</form>";
		echo "</div>";
	}

	public function editStoryTjView($edit_form) {
		echo "<div class='edit_story'>";
		echo "<form action='' class='editStoryForm' data-id='".$edit_form['id']."' method='POST'>";
		echo "<textarea name='story'>".$edit_form['story']."</textarea> <br />";
		echo "<input type='hidden' name='id' value='".$edit_form['id']."'>";
		echo "<input type='submit' name='update_story' value='edit'>";
		echo "</form>";
		echo "</div>";
	}


}

 ?>

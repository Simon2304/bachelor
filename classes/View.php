<?php

class View {

	public function createIceView(){
		echo "<div class='overlay-form'>";
			echo "<div class='overlay'></div>";
			echo "<div class='data-create-ice'>";
				echo "<div class='wrapper2'>";
					echo "<div class='title'> Enter ICE credentials <span class='close color_white'>x</span></div>";
					echo "<form action='' method='POST' class='createIceForm'>";
					echo "<div class='field'><p> Contactpersoon en telefoonnummer van de persoon die wij moeten bellen in geval van nood </p></div>";
							echo "<div class='field'><input type='text' name='name' required>";
							echo "<label for='name'>Naam</label></div>";
							echo "<div class='field'><input type='text' name='tel' required>";
							echo "<label for='tel'>Telefoonnummer</label></div>";
							echo "<div class='field'><input type='submit' name='new-ice' value='submit'></div>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}

	public function readIceView($ice_info){

		if($ice_info == false) {
			echo "<div class='ice-data'>
					<h2> In Case off Emergency (ICE) </h2>";
			echo "<div class='to_do'> TODO: Insert emergency contact </div>";
			echo "<div class='ice_items'></div>";
			echo "<div class='ice-person'>";
			/**
			 * Added below content to give div enough body. 
			 * Otherwise the div Body-content start acting like a little cry baby. 
			 */
					echo "<table>";
						echo "<form action='' method='POST'>";
							echo "</br>";
						echo "</table>";
					echo "</form>";
				echo "</div>";
			echo "<table>";
			echo "<form action='' method='POST' class='empty_ice'>";
			echo "<tr><td><input type='submit' name='new_ice' value='new' class='new-ice'></tr>";
			echo "</form></table>";
			echo "</div></div></div>";
		} else {
			echo "<div class='ice-data'><h2> In Case off Emergency (ICE) </h2>
				  <div class='ice_items'>";
			for ($i = 0; $i < sizeof($ice_info); $i++) {
				echo "<div class='ice-person' data-id='".$ice_info[$i]['id']."'>";
					echo "<table>";
						echo "<form action='' method='POST'>";
							echo "<tr><td><input type='hidden' name='cp' value='".$ice_info[$i]['cp']."'><div class='ice_cp'> Contactpersoon: " . $ice_info[$i]['cp'] . "</div></td></tr>";
							echo "<tr><td><input type='hidden'  name='tel' value='".$ice_info[$i]['tel']."'> <div class='ice_tel'> Telefoonnummer: " . $ice_info[$i]['tel'] . "</div></td></tr>";
							echo "<tr><td><input type='hidden' name='id' value='". $ice_info[$i]['id'] ."'>";
							echo "<input type='submit' name='delete_ice' value='delete'>";
							echo "<input type='submit' name='edit_ice' value='edit'></tr>";
							echo "</br>";
						echo "</table>";
					echo "</form>";
				echo "</div>";
			}
			echo "<form action='' method='POST'>";
			echo "<tr><td><input type='submit' name='new_ice' value='new' class='new-ice'></tr>";
			echo "</form>";
			echo "	</div></div></div>";
		}
	}

	public function deleteIceView($ice_id){
		echo "<div class='overlay-form'>";
			echo "<div class='overlay'></div>";
			echo "<div class='wrapper2 data-create-ice'>";
			echo "<div class='title'>Are you sure?</div>";
				echo "<form action='' method='POST' class='deleteIceForm' data-id='".$ice_id."'>";
					echo "<input type='hidden' name='id' value='".$ice_id."'>";
					echo "<tr><td><div class='field'><button role='submit' name='yes' class='yes'>yes</button></div></td>
					<td><button role='button' name='no' class='no'>no</button></td></tr>";
				echo "</form>";
			echo "</div>";
		echo "</div>";
	}

	public function updateIceView($edit_form) {
		echo "<div class='overlay-form'>";
			echo "<div class='overlay'></div>";
			echo "<div class='wrapper2 data-create-ice'>";
			echo "<div class='title'> Edit ICE credentials <span class='close'>x</span></div>";
				echo "<form action='' method='POST' class='editIceForm'>";
					echo "<div class='field'><input type='text' name='cp' value='".$edit_form['cp']."' required>";
					echo "<label for='cp'>Naam</label></div>";
					echo "<div class='field'><input type='text' name='tel' value='".$edit_form['tel']."' required>";
					echo "<label for='tel'>Naam</label></div>";
					echo "<input type='hidden' name='id' value='".$edit_form['id']."'>";
					echo "<div class='field'><input type='submit' name='edit_ice' value='edit'></div>";
				echo "</form>";
			echo "</div>";
		echo "</div>";

	}

	public function updateUserView($edit_form) {
		echo "<div class='overlay-form'>
			<div class='overlay'></div>
			<div class='wrapper2'>
		    	<div class='title'>Signup form<span class='close'>x</span></div>
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
		   			</div>";
					if ($edit_form['imin'] == 1) {
						echo "<div class='checkbox'><input type='radio' id='in' name='imin' value='1' checked>
							<label for='in' class='mr-10'>I'm in!</label>
							<input type='radio' id='out' name='imin' value='0'>
							<label for='out'>I'm out!</label>
						</div>";
					} else {
						echo "<div class='checkbox'><input type='radio' id='in' name='imin' value='1'>
							<label for='in' class='mr-10'>I'm in!</label>
							<input type='radio' id='out' name='imin' value='0' checked>
							<label for='out'>I'm out!</label>
						</div>";
					}
					echo "
					<div class='field'>
						<input type='submit' name='update_cred' value='update'>
					</div>
				</form>
			</div>
		</div>";
	}

	public function fuckTjView($fuck_tj) {
		shuffle($fuck_tj);

		echo "<div class='fuck'>";
		echo "<h2>Ways to fuck with TJ during his bachelorparty </h2>";
		echo "<div class='add_fuck'></div>";
		for ($i = 0; $i < sizeof($fuck_tj); $i++) {
			if ($fuck_tj[$i]['fuck'] == null) {
				continue;
			} else {
				echo "<div class='fuck_item' data-id='".$fuck_tj[$i]['id']."'>";
				echo "<form action='' method='POST'>";
				echo "<div class='user_info'>";
				echo "<img src='images/avatar".$fuck_tj[$i]['user_id'].".png' class='avatar'>";
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
		}
		echo "<a class='horizontal create_fuck'><span class='text'>Add</span></a>";
		echo "</div>";
	}

	public function storyTjView($fuck_tj) {
		shuffle($fuck_tj);

		echo "<div class='story'>";
		echo "<h2>Stories about TJ</h2>";
		echo "<div class='add_story'></div>";
		for ($i = 0; $i < sizeof($fuck_tj); $i++) {
			if ($fuck_tj[$i]['story'] == null) {
				continue;
			} else {
				echo "<div class='story_item' data-id='".$fuck_tj[$i]['id']."'>";
				echo "<form action='' method='POST'>";
				echo "<div class='user_info'>";
				echo "<img src='images/avatar".$fuck_tj[$i]['user_id'].".png' class='avatar'>";
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
		}
		echo "<a class='horizontal create_story'><span class='text'>Add</span></a>";
		echo "</div>";
	}

	public function editFuckTjView($edit_form) {
		echo "<div class='overlay-form'>";
		echo "<div class='overlay'></div>";
		echo "<div class='edit_fuck'><span class='close'>x</span>";
		echo "<form action='' class='editFuckForm' data-id='".$edit_form['id']."' method='POST'>";
		echo "<textarea name='fuck'>".strip_tags($edit_form['fuck'])."</textarea>";
		echo "<input type='hidden' name='id' value='".$edit_form['id']."'>";
		echo "<input type='submit' name='update_fuck' value='edit'>";
		echo "<input type='submit' name='close' value='close'>";
		echo "</form>";
		echo "</div></div>";
	}

	public function editStoryTjView($edit_form) {
		echo "<div class='overlay-form'>";
		echo "<div class='overlay'></div>";
		echo "<div class='edit_story'><span class='close'>x</span>";
		echo "<form action='' class='editStoryForm' data-id='".$edit_form['id']."' method='POST'>";
		echo "<textarea name='story'>".strip_tags($edit_form['story'])."</textarea> <br />";
		echo "<input type='hidden' name='id' value='".$edit_form['id']."'>";
		echo "<input type='submit' name='update_story' value='edit'>";
		echo "<input type='submit' name='close' value='close'>";
		echo "</form>";
		echo "</div></div>";
	}

	public function createStoryTjView() {
		echo "<div class='overlay-form'>";
		echo "<div class='overlay'></div>";
		echo "<div class='wrapper2 edit_story'>";
		echo "<form action='' class='createStoryForm' method='POST'>";
		echo "<span class='close'>x</span>";
		echo "<textarea name='story'></textarea> <br />";
		echo "<div class='checkbox'>";
		echo "<input type='radio' id='in' name='check-in' value='1'>";
		echo "<label for='in' class='color_black'>Fuck</label>";
		echo "<input type='radio' id='out' name='check-in' value='0' checked>";
		echo "<label for='out'>Story</label>";
		echo "</div>";
		echo "<button role='button' class='werk_gewoon' name='create_story'>Add</button>";
		echo "</form>";
		echo "</div></div>";
	}

	public function createFuckTjView() {
		echo "<div class='overlay-form'>";
		echo "<div class='overlay'></div>";
		echo "<div class='wrapper2 edit_story'>";
		echo "<form action='' class='createFuckForm' method='POST'>";
		echo "<span class='close'>x</span>";
		echo "<textarea name='fuck'></textarea> <br />";
		echo "<div class='checkbox'>";
		echo "<input type='radio' id='in' name='check-in' value='1' checked>";
		echo "<label for='in' class='color_black'>Fuck</label>";
		echo "<input type='radio' id='out' name='check-in' value='0'>";
		echo "<label for='out'>Story</label>";
		echo "</div>";
		echo "<button role='button' class='werk_gewoon' name='create_story'>Add</button>";
		echo "</form>";
		echo "</div></div>";
	}

	public function deleteStoryView($id){
		echo "<div class='overlay-form'>";
			echo "<div class='overlay'></div>";
			echo "<div class='wrapper2'>";
				echo "<form action='' method='POST' class='deleteStoryForm' data-id='".$id."'>";
					echo "<input type='hidden' name='id' value='".$id."'>";
					echo "<tr><td><button role='submit' name='yes' class='yes'>yes</button></td>
					<td><button role='button' name='no' class='no'>no</button></td></tr>";
				echo "</form>";
			echo "</div>";
		echo "</div>";
	}
}

 ?>

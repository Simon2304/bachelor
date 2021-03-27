<?php
session_start();
if(!isset($_SESSION['userfname'])){
	header('location: fout.php');
}

include_once("classes/DBConnect.php");
include_once("classes/Person.php");
include_once("classes/User.php");
include_once("classes/Sessions.php");
include_once("classes/Ice.php");
include_once("classes/View.php");
include_once("classes/Story.php");

$db_handle = DBConnect::getInstance();
$user = new User($db_handle);
$person = new Person($db_handle);
$session = new Sessions();
$ice = new Ice($db_handle);
$story = new Story($db_handle);
$view = new View();

$userfname = $_SESSION['userfname'];
$user_data = $user->getUserData($userfname);

include('includes/page-top.php');
?>
<audio controls autoplay loop="loop" id="my_audio">
		<source src="audio/Eagles.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
</audio>
<div class="body-content">
	<div class="data">
		<div class="credentials">
			<form action="" method="POST" name="editCredForm" class="editCredForm" enctype="multipart/form-data">
				<table>
					<h2>Credentials</h2>
					<tr>
						<td class="fname">Voornaam: <?php echo $user_data['firstname']; ?></td>
					</tr>
					<tr>
						<td class="lname">Achternaam: <?php echo $user_data['lastname']; ?></td>
					</tr>
					<tr>
						<td class="mail">email: <?php echo $user_data['email']; ?></td>
					</tr>
					<tr>
						<td class="tel">06-nummer: <?php echo $user_data['phone']; ?></td>
					</tr>
					<tr>
						<td class="in_out">
							in/out:
							<?php
								if($user_data['imin'] == 1) {
									echo "Ik ga mee";
								} else {
									echo "Watje";
								}
							?>
						</td>
					</tr>
					<tr>
						<td>Upload kopie paspoort:</td>
							<form method='POST' action='' name='fileUploadForm' class='fileUploadForm' enctype="multipart/form-data"><tr><td>
								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Upload paspoort" name="submit">
								<tr><td><input type="submit" name="edit_cred" class="edit_cred" value="edit"/></td></tr>
							</form>	
						</td>
					</tr>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php
		$ice_info = $ice->getIce();
		$jetzt_gehts_los = $story->readStories();
		$view->readIceView($ice_info);
		$view->storyTjView($jetzt_gehts_los);
		$view->fuckTjView($jetzt_gehts_los);


		if (isset($_POST['edit_cred'])) {
			$view->updateUserView($user_data);
		}

		if (isset($_POST['new_ice'])) {
			$view->createIceView();
		}

		if (isset($_POST['delete_ice'])) {
			$view->deleteIceView($_POST['id']);
		}

		if (isset($_POST['edit_ice'])) {
			$edit_form = array('cp' => $_POST['cp'], 'tel' => $_POST['tel'], 'id' => $_POST['id']);
			$view->updateIceView($edit_form);
		}

		if (isset($_POST['submit'])) {
			$user->uploadPassportUser();
		}

		if (isset($_POST['edit_f'])) {
			$edit_form = array('fuck' => $_POST['fuck_tj'], 'id' => $_POST['id']);
			$view->editFuckTjView($edit_form);
		}

		if (isset($_POST['update_fuck'])) {
			$updated_fuck_tj = array('fuck' => $_POST['fuck'], 'id' => $_POST['id']);
			$story->updateFucks($updated_fuck_tj);
			header('location: '.$genurl.'topsecretintel');

		}

		if (isset($_POST['delete_f'])) {
			$id = $_POST['id'];
			$view->deleteStoryView($id);
		}

		if (isset($_POST['edit_s'])) {
			$edit_form = array('story' => $_POST['story_tj'], 'id' => $_POST['id']);
			$view->editStoryTjView($edit_form);
		}

		if (isset($_POST['update_story'])) {
			$updated_fuck_tj = array('story' => $_POST['story'], 'id' => $_POST['id']);
			$story->updateStories($updated_fuck_tj);
			header('location: '.$genurl.'topsecretintel');
		}

		if (isset($_POST['delete_s'])) {
			$id = $_POST['id'];
			$view->deleteStoryView($id);
		}
		 ?>
    <div class="overlay-form default-modal">
        <div class="overlay"></div>
    </div>
</div>
<script src="<?php echo $genurl; ?>js/autoplayMusic.js"></script>
<script src="<?php echo $genurl; ?>js/buttons.js"></script>
<script src="<?php echo $genurl; ?>js/story.js"></script>
<script src="<?php echo $genurl; ?>js/fuck.js"></script>
<script src="<?php echo $genurl; ?>js/ice.js"></script>
<script src="<?php echo $genurl; ?>js/cred.js"></script>
<script src="<?php echo $genurl; ?>js/fileUpload.js"></script>
<script src="<?php echo $genurl; ?>js/modal.js"></script>

</body>
</html>

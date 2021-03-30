<?php
include_once('Person.php');
class User extends Person{

	public function showUsers() {

		$conn = Person::showPersons();
		$result = $conn->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function checkUsers($form_user) {
		try {
			$sql = "SELECT * FROM users WHERE firstname = ? AND lastname = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $firstname);
			$stmt->bindParam(2, $lastname);
			$firstname = $form_user['firstname'];
			$lastname = $form_user['lastname'];
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if (empty($result)) {
				return true;
			} else {
				echo "<div class='error'><br> Je hebt je al aangemeld.<br></div>";
				exit();
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function getUser($firstname, $password) {
		try {
			$sql = "SELECT * FROM users WHERE firstname = ? AND password = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $firstname);
			$stmt->bindParam(2, $password);
			$stmt->execute();

			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if (!empty($result)) {
				return $result;
			} else {
				echo "<div class='error'><br> Eerst aanmelden! <br></div>";
				exit();
			}
		} catch(PDOException $e) {
			echo $e->getMessage();
		}

	}

	public function getUserData($userfname) {
		try {
			$sql = "SELECT * FROM users WHERE firstname = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $userfname);
			$stmt->execute();

			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if (!empty($result)) {
				$_SESSION['id'] = $result['id'];
				return $result;
			} else {
				echo "<div class='error'><br> Eerst aanmelden! <br></div>";
				exit();
			}
		} catch(PDOException $e) {
			echo $e->getMessage();
		}

	}

	public function updateUserData($form_user) {
		try {
			$sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, phone = ?, imin = ?  WHERE id = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $firstname);
			$stmt->bindParam(2, $lastname);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $phone);
			$stmt->bindParam(5, $imin);
			$stmt->bindParam(6, $id);
			$firstname = $form_user['firstname'];
			$lastname = $form_user['lastname'];
			$email = $form_user['email'];
			$phone = $form_user['phone'];
			$imin = $form_user['imin'];
			$id = $_SESSION['id'];
			$stmt->execute();

			$_SESSION['userfname'] = $form_user['firstname'];
			$last_id = $this->dbh->lastInsertId();

			return true;

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function uploadPassportUser() {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$target_file = $target_dir . $_SESSION['userfname'] . "-" . rand(10,100) . "." . $imageFileType;

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
				return "File is not an image.";
			}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 0;
			return "Sorry, file already exists.";
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			$uploadOk = 0;
			return "Sorry, your file is too large.";
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$uploadOk = 0;
			return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			return "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				return "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				return "Sorry, there was an error uploading your file.";
			}
		}
	}
}

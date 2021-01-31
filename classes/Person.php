<?php

class Person {
	public $dbh;

	public function __construct($db_handle) {
		$this->dbh = $db_handle;
	}

	public function showPersons($userfname) {

		$sql = "SELECT * FROM users WHERE firstname = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $userfname);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

	}

	public function createPerson($form_user) {
		try {
			$sql = "INSERT INTO users (firstname, lastname, email, phone, password, imin) VALUES (?,?,?,?,?,?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $firstname);
			$stmt->bindParam(2, $lastname);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $phone);
			$stmt->bindParam(5, $password);
			$stmt->bindParam(6, $imin);
			$firstname = $form_user['firstname'];
			$lastname = $form_user['lastname'];
			$email = $form_user['email'];
			$phone = $form_user['phone'];
			$password = $form_user['password']; // is al beveiligd
			$imin = $form_user['imin'];
			$stmt->execute();

			$_SESSION['userfname'] = $form_user['firstname'];
			$last_id = $this->dbh->lastInsertId();

			return true;

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function checkPost($form_user) {

		if(empty($form_user['firstname']) || is_numeric($form_user['firstname'])) {
			echo "<div class='error'><br>Firstname can't be empty or numeric.<br></div>";
			exit();
		} elseif(empty($form_user['lastname']) || is_numeric($form_user['lastname'])) {
			echo "<div class='error'><br>Lastname can't be empty or numeric.<br></div>";
			exit();
		} elseif(empty($form_user['email']) || is_numeric($form_user['email'])) {
			echo "<div class='error'><br> Email can't be empty or numeric. <br></div>";
			exit();
		} elseif(empty($form_user['phone']) || !is_numeric($form_user['phone'])) {
			echo "<div class='error'><br> Phone can't be empty or not numeric. <br></div>";
			exit();
		} else {
			return $form_user;
		}
	}
}

?>

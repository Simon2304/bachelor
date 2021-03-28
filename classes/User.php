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

            $firstname = $form_user['firstname'];
            $lastname = $form_user['lastname'];
            $email = $form_user['email'];
            $phone = $form_user['phone'];
            $imin = $form_user['imin'];
            $id = $_SESSION['id'];

			$stmt->bindParam(1, $firstname);
			$stmt->bindParam(2, $lastname);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $phone);
			$stmt->bindParam(5, $imin);
			$stmt->bindParam(6, $id);

			$stmt->execute();

			$_SESSION['userfname'] = $form_user['firstname'];
			$last_id = $this->dbh->lastInsertId();

			return true;

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}

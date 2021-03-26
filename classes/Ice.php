<?php
class Ice {

	public $dbh;
	

	public function __construct($db_handle) {
		$this->dbh = $db_handle;
	}

	public function createIce($cp, $tel) {
		try {
			$sql = "INSERT INTO ice (cp, tel, name) VALUES (?,?,?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $cp);
			$stmt->bindParam(2, $tel);
			$stmt->bindParam(3, $name);
			$name = $_SESSION['userfname'];
			$stmt->execute();



		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function getIce() {
		try {
			$sql = "SELECT*FROM ice WHERE name = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $name);
			$name = $_SESSION['userfname'];
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if (empty($result)) {
				return false;
				exit();
			} else {
				return $result;
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function updateIce($form_user) {
		try {
			$sql = "UPDATE ice SET cp = ?, tel = ? WHERE id = ? AND name = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $cp);
			$stmt->bindParam(2, $tel);
			$stmt->bindParam(3, $id);
			$stmt->bindParam(4, $name);
			$cp = $form_user['cp'];
			$tel = $form_user['tel'];
			$id = $form_user['id'];
			$name = $_SESSION['userfname'];
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if (empty($result)) {
				return false;

			} else {
				return $result;
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function deleteIce($id) {
		try {
			$sql = "DELETE FROM ice WHERE id = ? AND name = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $id);
			$stmt->bindParam(2, $name);
			$name = $_SESSION['userfname'];
			$stmt->execute();

			if ($stmt) {
				return true;
			} else {
				return false;
			}

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

}



?>

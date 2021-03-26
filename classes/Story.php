<?php


class Story {
	public $dbh;

	public function __construct($db_handle) {
		$this->dbh = $db_handle;
	}

	// Stories about TJ
	public function createStories($story_tj, $story_or_fuck) {
		try {
			if ($story_or_fuck == 0) {
				$sql = "INSERT INTO stories (fuck, story, name, user_id) VALUES (null,?,?,?)";
			} else {
				$sql = "INSERT INTO stories (fuck, story, name, user_id) VALUES (?,null,?,?)";
			}
			
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $story_tj);
			$stmt->bindParam(2, $name);
			$stmt->bindParam(3, $user_id);
			$name = $_SESSION['userfname'];
			$user_id = $_SESSION['id'];

			$stmt->execute();
			$last_id = $this->dbh->lastInsertId();

			try {
				$sql = "SELECT * FROM stories WHERE id = $last_id";
				$stmt = $this->dbh->prepare($sql);
				$stmt->execute();
			
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
				return $result;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}

		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	public function readStories() {
		try {
			$sql = "SELECT * FROM stories";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute();
		
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $result;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function updateStories($story_time) {
		try {
			$sql = "UPDATE stories SET story = ? WHERE id = ? AND user_id = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $story);
			$stmt->bindParam(2, $id);
			$stmt->bindParam(3, $_SESSION['id']);
			$story = $story_time['story'];
			$id = $story_time['id'];

			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;

		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function deleteStories($id) {
		try {
			$sql = "DELETE FROM stories WHERE id = ? AND user_id = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $id);
			$stmt->bindParam(2, $_SESSION['id']);

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

	// Ways to fuck with TJ
	public function createFucks($fuck_tj) {
		try {
			$sql = "INSERT INTO stories (fuck, name, user_id) VALUES (?,?,?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $fuck_tj);
			$stmt->bindParam(2, $name);
			$stmt->bindParam(3, $user_id);
			$name = $_SESSION['userfname'];
			$user_id = $_SESSION['id'];

			$stmt->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function updateFucks($fuck_tj) {
		try {
			$sql = "UPDATE stories SET fuck = ? WHERE id = ? AND user_id = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $fuck);
			$stmt->bindParam(2, $id);
			$stmt->bindParam(3, $_SESSION['id']);
			$fuck = $fuck_tj['fuck'];
			$id = $fuck_tj['id'];

			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}


}

 ?>

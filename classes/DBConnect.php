<?php

class DBConnect {
	static $db;
	private $dbh;
	private function __construct() {
		try {
			$this->dbh = new PDO('mysql:host=localhost;dbname=par-tj', 'root', 'root');
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	public static function getInstance() {
		if (!isset(DBConnect::$db)) {
			DBConnect::$db = new DBConnect() ;
		}
		return DBConnect::$db->dbh;
	}

}
?>

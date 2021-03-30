<?php

class DBConnect {
	static $db;
	private $dbh;
	private function __construct() {
		try {
			$this->dbh = new PDO('mysql:host=localhost;dbname=onbelet_partj', 'onbelet_bambino', 'So+934Pp#');
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

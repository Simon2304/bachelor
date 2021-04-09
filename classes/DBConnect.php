<?php
require_once realpath('./vendor/autoload.php');

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
echo realpath('./vendor/autoload.php') . "</br>";
echo __DIR__;
//var_dump($_ENV);

class DBConnect {
	
	static $db;
	private $dbh;

	private function __construct() {
		try {
			$db_dns = $_ENV["DATABASE_DNS"];
			$db_username = $_ENV["DATABASE_USER"];
			$db_password = $_ENV["DATABASE_PASSWORD"];
			$this->dbh = new PDO($db_dns, $db_username, $db_password);
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

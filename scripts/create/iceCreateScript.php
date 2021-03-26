<?php
session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Ice.php');

$db_handle = DBConnect::getInstance();
$ice = new Ice($db_handle);


	$cp = $_POST['name'];
	$tel = $_POST['tel'];
	$ice->createIce($cp,$tel);


$element = "<div class='ice-person' data-id='0'>"; // TODO: Data ID from last DB insert
	$element .= "<table>";
		$element .= "<form action='' method='POST'>";
			$element .= "<tr><td><input type='hidden' name='cp' value='".$cp."'><div class='ice-cp'> Contactpersoon: " . $cp . "</div></td></tr>";
			$element .= "<tr><td><input type='hidden' name='tel' value='".$tel."'> <div class='ice-tel'> Telefoonnummer: " . $tel . "</div></td></tr>";
			$element .= "<tr><td><input type='hidden' name='id' value='0'>"; // TODO: Data ID from last DB insert
			$element .= "<input type='submit' name='delete_ice' value='delete'>";
			$element .= "<input type='submit' name='edit_ice' value='edit'></tr>";
			$element .= "</br>";
		$element .= "</table>";
	$element .= "</form>";
$element .= "</div>";

echo json_encode($element);
?>

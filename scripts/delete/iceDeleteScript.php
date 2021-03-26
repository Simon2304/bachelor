<?php
session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Ice.php');

$db_handle = DBConnect::getInstance();
$ice = new Ice($db_handle);

$ice_id = $_POST['id'];

$ice->deleteIce($ice_id);

echo json_encode($ice_id);
?>

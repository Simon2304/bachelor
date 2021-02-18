<?php
session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Ice.php');

$db_handle = DBConnect::getInstance();
$ice = new Ice($db_handle);


$ice->deleteIce($ice_id);


echo json_encode($edit_form);
?>

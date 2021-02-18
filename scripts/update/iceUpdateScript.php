<?php
session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Ice.php');

$db_handle = DBConnect::getInstance();
$ice = new Ice($db_handle);

$edit_form = array('cp' => $_POST['cp'], 'tel' => $_POST['tel'], 'id' => $_POST['id']);
$ice->updateIce($edit_form);

echo json_encode($edit_form);
?>

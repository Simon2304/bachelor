<?php

session_start();

include_once("../classes/DBConnect.php");
include_once('../classes/Person.php');
include_once('../classes/User.php');


$db_handle = DBConnect::getInstance();
$user = new User($db_handle);
$person = new Person($db_handle);

$response = $user->uploadPassportUser();

echo json_encode($response);

?>
<?php

session_start();

include_once("../../classes/DBConnect.php");
include_once('../../classes/Person.php');
include_once('../../classes/User.php');


$db_handle = DBConnect::getInstance();
$user = new User($db_handle);
$person = new Person($db_handle);


	// Update password, if !empty($_POST['password']). Array 2 opties.
	// $password = md5(md5('tjisgay123'.$_POST['password'].'321yagsijt'));
	$request = $_POST;
	$email = $request['email'];
	$firstname = $request['firstname'];
	$lastname = $request['lastname'];
	$phone = $request['phone'];
	$imin = $request['imin'];
	$form_user = array('email'=>$email, 'firstname'=>$firstname, 'lastname' => $lastname, 'phone' => $phone, 'imin' => $imin);
	$user->updateUserData($form_user);


echo json_encode($form_user);
?>

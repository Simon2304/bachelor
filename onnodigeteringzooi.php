<?php
// DIT KOMT VAN info.php
session_start();

include_once("classes/DBConnect.php");
include_once("classes/Person.php");
include_once("classes/Sessions.php");

$db_handle = DBConnect::getInstance();
$user = new User($db_handle);
$person = new Person($db_handle);

if(isset($_POST['submit'])) {
	$firstname = $form_login['firstname'];
	$password = md5($form_login['password']);
	$checked_user = $user->getUser($firstname, $password);

	if (!empty($checked_user) && $checked_user != FALSE) {
		$_SESSION['username'] = $checked_user['username'];
	}

}

if(isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_POST['submit'])) {
	$logout = $form->logoutForm();
	$info = $form->showPerson($checked_user);
}

if(isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_POST['submit'])) {
	$id = $_SESSION['pers_id'];
	$checked_user = $user->showPersons($id);
	$logout = $form->logoutForm();
	$info = $form->showPerson($checked_user);
}

if(isset($_POST['logout'])) {
	$logout = new Sessions();
	$logout_user = $logout->destroySession();
	header('location: index.php');
}









// DIT KOMT VAN index.php

if(isset($_SESSION['userfname']) && !empty($_SESSION['userfname']) && isset($_POST['login'])) {
	$logout = $form->logoutForm();
	$info = $form->showPerson($checked_user);
}

if(isset($_SESSION['userfname']) && !empty($_SESSION['userfname']) && isset($_POST['submit'])) {
	$userfname = $_SESSION['userfname'];
	$checked_user = $user->showPersons($userfname);
	$logout = $form->logoutForm();
	$info = $form->showPerson($checked_user);
}

if(isset($_POST['logout'])) {
	$session->destroySession();
	header('location: index.php');
}

?>

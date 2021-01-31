<?php
 session_start();

include_once("../classes/DBConnect.php");
include_once("../classes/Person.php");
include_once("../classes/User.php");
include_once("../classes/Sessions.php");

$db_handle = DBConnect::getInstance();
$user = new User($db_handle);
$person = new Person($db_handle);
$session = new Sessions();



$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$password = md5(md5('tjisgay123'.$_POST['password'].'321yagsijt'));
$imin = $_POST['check-in'];
$form_user = array('email'=>$email, 'firstname'=>$firstname, 'lastname' => $lastname, 'phone' => $phone, 'password' => $password, 'imin' => $imin);

$check_post = $person->checkPost($form_user);
$check_user = $user->checkUsers($form_user);
if ($check_user == true) {
	if($person->createPerson($form_user) == true){
		echo 1;
	}
} else {
	echo "Error creating user.";
}

?>

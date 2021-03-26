<?php

session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Story.php');

$db_handle = DBConnect::getInstance();
$story = new Story($db_handle);

$id = $_POST['id'];
$story->deleteStories($id);

echo json_encode($id);


 ?>

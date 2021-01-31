<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once("../../classes/DBConnect.php");
include_once('../../classes/Story.php');

$db_handle = DBConnect::getInstance();
$story = new Story($db_handle);

$request = $_POST;
$request_story = $request['story'];
$request_id = $request['id'];

$updated_fuck_tj = array('story' => $request_story, 'id' => $request_id);
$story->updateStories($updated_fuck_tj);

echo json_encode($updated_fuck_tj);
?>

<?php

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

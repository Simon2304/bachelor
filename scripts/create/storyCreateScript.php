<?php
session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Story.php');

$db_handle = DBConnect::getInstance();
$story = new Story($db_handle);


$story_tj = (string) $_POST['story'];
$story_or_fuck = 1;

$row = $story->createStories($story_tj, $story_or_fuck);

//var_dump($row); 

$element = "<div class='story_item' data-id='".$row['id']."'>";
$element .= "<form action='' method='POST'>";
$element .= "<div class='user_info'>";
$element .= "<img src='images/avatar".$row['user_id'].".png' class='avatar'>";
$element .= "<h3>".$row['name']."</h3>";
$element .= "</div>";
$element .= "<div class='story_tj'>".nl2br($row['story'])."</div>";
$element .= "<textarea class='hiddentextarea' name='story_tj'>".nl2br($row['story'])."</textarea>";
$element .= "<input type='hidden' name='id' value='".$row['id']."'>";
$element .= "<input type='submit' name='edit_s' value='edit'>";
$element .= "<input type='submit' name='delete_s' value='delete'>";
$element .= "</form>";
$element .= "</div>";

echo json_encode($element);


?>

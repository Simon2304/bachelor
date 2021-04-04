<?php
session_start();

include_once('../../classes/DBConnect.php');
include_once('../../classes/Story.php');

$db_handle = DBConnect::getInstance();
$story = new Story($db_handle);


$story_tj = (string) $_POST['fuck'];
$story_or_fuck = 0;

$row = $story->createStories($story_tj, $story_or_fuck);


$element = "<div class='fuck_item' data-id='".$row['id']."'>";
$element .= "<form action='' method='POST'>";
$element .= "<div class='user_info'>";
$element .= "<img src='images/avatar".$row['user_id'].".png' class='avatar'>";
$element .= "<h3>".$row['name']."</h3>";
$element .= "</div>";
$element .= "<div class='fuck_tj'>".nl2br($row['fuck'])."</div>";
$element .= "<textarea class='hiddentextarea' name='fuck_tj'>".nl2br($row['fuck'])."</textarea>";
$element .= "<input type='hidden' name='id' value='".$row['id']."'>";
$element .= "<input type='submit' name='edit_f' value='edit'>";
$element .= "<input type='submit' name='delete_f' value='delete'>";
$element .= "</form>";
$element .= "</div>";

echo json_encode($element);


?>

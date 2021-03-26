<?php
include_once('../classes/View.php');

if(isset($_GET['createStory'])){
	$view = new View();
	$story = $view->createStoryTjView();
	return $story;
} 

if(isset($_GET['createFuck'])) {
	$view = new View();
	$fuck = $view->createFuckTjView();
	return $fuck;
}
?>
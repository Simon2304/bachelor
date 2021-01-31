<?php
include_once('../classes/View.php');

if(isset($_GET['createStory'])){
	$view = new View();
	$result = $view->createStoryTjView();
	echo $result;
}
?>

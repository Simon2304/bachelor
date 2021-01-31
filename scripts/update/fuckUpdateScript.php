<?php
include_once('../../classes/DBConnect.php');
include_once('../../classes/Story.php');

$db_handle = new DBConnect::getInstance();
$story = new Story($db_handle);

$updated_fuck_tj = array('fuck' => $_POST['fuck'], 'id' => $_POST['id']);
$story->updateFucks($updated_fuck_tj);

echo json_encode($updated_fuck_tj);
?>

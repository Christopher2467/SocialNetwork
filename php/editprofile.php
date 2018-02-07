<?php

require_once('classes.php');
require_once('session.php');

$picture_url = strip_tags($_POST['picture_url']);
$user_id = strip_tags($_POST['picture_url']);

$user = new USER();

$sql = $user->runQuery("UPDATE user_currentpicture FROM users WHERE user_id=:uid");
$sql->execute(array(":uid"=>$_SESSION['user_session']));
		
echo "done";

?>
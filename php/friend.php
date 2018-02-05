<?php

require_once('session.php');
require_once('classes.php');

if(isset($_POST['addfriend'])){

	$friend = new FRIEND();
	
	$user_id = $_SESSION['user_session'];
	$friend_id = $_POST['addfriend'];

	if ($user_id == $friend_id){
		echo false;
	}else{
		if($friend->checkiffriend($user_id, $friend_id)){
			echo false;
		}else{
			$friend->addfriend($user_id, $friend_id);
			echo true;
		}
	}
	
}

if(isset($_GET['checkiffriend'])){
	$friend = new FRIEND();
	
	$user_id = $_SESSION['user_session'];
	$friend_id = $_GET['checkiffriend'];

	$isfriends = $friend->checkiffriend($user_id, $friend_id);
	
	echo $isfriends;
}

?>
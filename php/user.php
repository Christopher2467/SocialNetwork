<?php

require_once('classes.php');
require_once('session.php');


//referenced in navbar.js when btn profile is clicked
if (isset($_GET['sendtoprofile'])){
	$user = new USER();

	$sql = $user->runQuery("SELECT user_name FROM users WHERE user_id=:userid");
	$sql->execute(array(":userid"=>$_SESSION['user_session']));
		
	$user_name_req = $sql->fetch(PDO::FETCH_ASSOC);

	$user->redirect('../views/user.php?user=' . $user_name_req['user_name']);

	echo "done";
}


if (isset($_GET['sendtoposterprofile'])){

	$user_id = $_GET['sendtoposterprofile'];

	$user = new USER();

	$sql = $user->runQuery("SELECT user_name FROM users WHERE user_id=:userid");
	$sql->execute(array(":userid"=>$user_id));
		
	$user_name_req = $sql->fetch(PDO::FETCH_ASSOC);

	$user->redirect('../views/user.php?user=' . $user_name_req['user_name']);

	echo "done";
}

if (isset($_GET['getsession'])){

	echo $_SESSION['user_session'];

}

if (isset($_GET['getsessionprofilepicture'])){
	$user = new USER();

	$sql = $user->runQuery("SELECT user_currentpicture FROM users WHERE user_id=:userid");
	$sql->execute(array(":userid"=>$_SESSION['user_session']));
		
	$user_picture_req = $sql->fetch(PDO::FETCH_ASSOC);

	echo $user_picture_req['user_currentpicture'];
}	

//getting userid from username
if (isset($_GET['getuserid'])){

	$user_req = $_GET['getuserid'];
	
	$user = new USER();

	$sql = $user->runQuery("SELECT user_id FROM users WHERE user_name=:userreq");
	$sql->execute(array(":userreq"=>$user_req));
		
	$user_id_req = $sql->fetch(PDO::FETCH_ASSOC);

		
	if($user_id_req == false){

		echo false;

	}else{
		$user_id = $user_id_req['user_id'];

		echo $user_id;
	}
}

//getting username from userid
if (isset($_GET['getusername'])){

	$user_req = $_GET['getusername'];
	
	$user = new USER();

	$sql = $user->runQuery("SELECT user_name FROM users WHERE user_id=:uid");
	$sql->execute(array(":uid"=>$user_req));
		
	$user_name_req = $sql->fetch(PDO::FETCH_ASSOC);

		
	if($user_name_req == false){

		echo false;

	}else{
		$user_name = $user_name_req['user_name'];

		echo $user_name;
	}
}

//getting username from usersession
if (isset($_GET['getusernamefromsession'])){

	$user = new USER();

	$sql = $user->runQuery("SELECT user_name FROM users WHERE user_id=:uid");
	$sql->execute(array(":uid"=>$_SESSION['user_session']));
		
	$user_name_req = $sql->fetch(PDO::FETCH_ASSOC);

		
	if($user_name_req == false){

		echo false;

	}else{
		$user_name = $user_name_req['user_name'];

		echo $user_name;
	}
}

if (isset($_GET['userposts'])) {
	$user_req = $_GET['userposts'];
	
	$user = new USER();

	$sql = $user->runQuery("SELECT user_id FROM users WHERE user_name=:userreq");
	$sql->execute(array(":userreq"=>$user_req));
		
	$user_id_req = $sql->fetch(PDO::FETCH_ASSOC);

		
	if($user_id_req == false){

		echo false;

	}else{
		$user_id = $user_id_req['user_id'];

		$post = new POST();
		$user_posts = $post->getuserposts($user_id);
		echo json_encode($user_posts);
	}	
}


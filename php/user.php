<?php

require_once('../models/user.php');


if (isset($_GET['userid'])) {
	$user_req = $_GET['userid'];
	
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


?>
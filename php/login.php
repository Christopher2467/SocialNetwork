<?php 

session_start();

require_once('../models/user.php');

$login = new USER();

if($login->is_loggedin()!=""){
	$login->redirect('../views/home.php');
}


if(isset($_POST['btn-login'])){
	$username = strip_tags($_POST['loginusername']);
	$email = strip_tags($_POST['loginemail']);
	$password = strip_tags($_POST['loginpassword']);
	
	if($login->doLogin($username, $email, $password)){
		$login->redirect('../views/home.php');
	}
	else{
		//wrong details
		$login->redirect('../views/prelogin.php');
	}	
}
?> 
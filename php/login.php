<?php 

session_start();

require_once('../models/user.php');

$login = new USER();

if($login->is_loggedin()!=""){
	$login->redirect('../views/home.php');
}


if(isset($_POST['btn-login'])){
	$username = strip_tags($_POST['username']);
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	if($login->doLogin($username, $email, $password)){
		$login->redirect('../views/home.php');
	}
	else{
		$login->redirect('../views/login.php');
		$error = "Wrong Details !";
	}	
}
?> 
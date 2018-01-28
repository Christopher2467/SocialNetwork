<?php 

session_start();
require_once('../models/user.php');

$user = new USER();

$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
	
if($user->register($username, $email, $password)){	
	$user->redirect('../index.php');
}

?> 
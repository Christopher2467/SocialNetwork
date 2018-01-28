<?php 

session_start();
require_once('../models/user.php');

$user = new USER();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
	
if($user->register($username, $email, $password)){	
	$user->redirect('../index.php');
}

?> 
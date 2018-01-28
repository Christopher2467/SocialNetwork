<?php 

session_start();
require_once('../models/user.php');

$user = new USER();

$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

if($username=="")	{
		$error[] = "provide username !";	
	}
	else if($email=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($password=="")	{
		$error[] = "provide password !";
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$username, ':umail'=>$email));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$username) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$email) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($username, $email, $password)){	
					$user->redirect('../index.php');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	


?> 
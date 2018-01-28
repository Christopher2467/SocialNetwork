<?php 

	$new_user = array(
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'password' => $_POST['password']
	);

	echo $new_user['username'];
?> 
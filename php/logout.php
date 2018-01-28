<?php
	require_once('session.php');
	require_once('../models/user.php');
	$user_logout = new USER();
	
	$user_logout->doLogout();
	$user_logout->redirect('../index.php');
	

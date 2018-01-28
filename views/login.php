<?php

require("../php/login.php");

?>

<!DOCTYPE html>

<html>

<head>

	<title>Login</title>

</head>

<body>

	<form method="post">

		<label for="username">Enter your username</label>
		<input type="text" name="username" id="username">

		<label for="email">Enter your email</label>
		<input type="text" name="email" id="email">

		<label for="password">Enter your password</label>
		<input type="password" name="password" id="password">

		<input type="submit" name="btn-login" value="Submit">

</body>

</html>
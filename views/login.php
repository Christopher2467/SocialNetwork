<?php

require("../php/login.php");

?>

<!DOCTYPE html>

<html>

<head>

	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

	<form method="post" class = "form">

		<label for="username" class = "formelement">Enter your username or email</label>
		<input type="text" name="username" id="username" class = "formelement">

		<label for="email" class = "formelement">Enter your email</label>
		<input type="text" name="email" id="email" class = "formelement">

		<label for="password" class = "formelement">Enter your password</label>
		<input type="password" name="password" id="password" class = "formelement">

		<input type="submit" name="btn-login" value="Submit" class = "formelement">
	</form>

</body>

</html>
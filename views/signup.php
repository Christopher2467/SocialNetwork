<!DOCTYPE html>

<html>

<head>

	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
	<form action="../php/signup.php" method="post" class = "form">

		<label for="username" class = "formelement">Username</label>
		<input type="text" name="username" id="username" class = "formelement">

		<label for="email" class = "formelement">Email</label>
		<input type="text" name="email" id="email" class = "formelement">

		<label for="password" class = "formelement">Password</label>
		<input type="password" name="password" id="password" class = "formelement">

		<input type="submit" value="Submit">

	</form>
</body>

</html>
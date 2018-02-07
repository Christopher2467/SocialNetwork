<?php

require('../php/user.php');
require('../php/friend.php');

?>

<!DOCTYPE html>

<html>

<head>

	<title>User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/user.js"></script>
	<script type="text/javascript" src="../js/navbar.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

	<?php require("navbar.php"); ?>

	<div id = "userpage">


		<div id = "userbox">

			<img id = "profilepicture">

			<div id = "userinfo">
				<p id = "username"></p>
				<p id = "numposts"></p>
				<p id = "numfollowers"></p>
				<p id = "numfollowing"></p>

			</div>
			
			<button id = "btn-follow">Follow</button>


		</div>
		

		<div id = "mainpostbox">
			
			<div class = "postsdiv">

				<table id = "posts" class = "posts"></table>

			</div>

		</div>

	</div>
	

</body>

</html>
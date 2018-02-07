
<?php

	require_once("../php/classes.php");

	require_once("../php/home.php");
	require_once("../php/session.php");
	require_once("../php/post.php");
	
?>
<!DOCTYPE html>

<html>

<head>

	<title>Homepage</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/home.js"></script>
	<script type="text/javascript" src="../js/navbar.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

	<?php require("navbar.php") ?>

	<div id = "mainpage">
		
		<div id = "userbox">

			<div id = "userinfo">

				<img id = "profilepicture">
				<p id = "username"></p>
				<p id = "numposts"></p>
				<p id = "numfollowers"></p>
				<p id = "numfollowing"></p>

			</div>

		</div>
	
		<div id = "mainpostbox">
		
			<div id = "writepost">
				
				<?php require("writepost.php") ?>


			</div>

			<div class = "postsdiv" id = "friendsposts">

				<table id ="newestfriendsposts" class = "posts"></table>

			</div>

		</div>

	</div>
	
	

</body>

</html>
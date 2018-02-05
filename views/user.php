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
	

	<p id = "username"></p>

	<button id = "btn-follow">Follow</button>

	<table id = "posts">
  	
	</table>

</body>

</html>
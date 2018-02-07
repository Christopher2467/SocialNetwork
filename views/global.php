<!DOCTYPE html>

<html>

<head>

	<title>Global</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/global.js"></script>
	<script type="text/javascript" src="../js/navbar.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
	<?php require("navbar.php") ?>

	<div id = "mainpage">

		<div id = "mainpostbox">
			
			<div id = "writepost">
					
				<?php require("writepost.php") ?>


			</div>

			<div class = "postsdiv">

				<table id = "newestposts" class = "posts"></table>

			</div>

		</div>

	</div>


</body>

</html>
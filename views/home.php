
<?php

	require_once("../php/classes.php");

	require_once("../php/home.php");
	require_once("../php/session.php");


	$auth_user = new USER();
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
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
				<p>Hello <?php print($userRow['user_name']); ?> </p>
				<p>Your email is <?php print($userRow['user_email']); ?> </p>
				<a href=<?php print("user.php" . '?user=' . $userRow['user_name']);?>>Go to your user profile</a>
			</div>

		</div>
	
		<div id = "mainpostbox">
		
			<div id = "writepost">
				
				<?php require("writepost.php") ?>


			</div>

			<div class = "posts" id = "friendsposts">

				<p>Your friends recent posts</p>

				<table id = "newestfriendsposts"></table>

			</div>

		</div>

	</div>
	
	

</body>

</html>
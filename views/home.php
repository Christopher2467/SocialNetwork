
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

</head>

<body>

	<?php require("navbar.php") ?>

	<p>Hello <?php print($userRow['user_name']); ?> </p>
	<p><?php print($userRow['user_email']); ?> </p>
	<a href=<?php print("user.php" . '?user=' . $userRow['user_name']);?>>Go to your user profile</a>

	<?php require("writepost.php") ?>

	<div>
		<p>10 Newest Global Posts</p>

		<table id = "newestposts"></table>

	</div>

	<a href="../php/logout.php">Sign Out</a>

</body>

</html>
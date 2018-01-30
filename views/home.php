
<?php
	
	require("../php/post.php");

	require_once("../php/session.php");
	require_once("../models/user.php");
	$auth_user = new USER();
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>

<!DOCTYPE html>

<html>

<head>

	<title>
		
	</title>

</head>

<body>

	<p>Hello <?php print($userRow['user_name']); ?> </p>
	<p><?php print($userRow['user_email']); ?> </p>

	<form method="post">

		<label for="post">Write a post</label>
		<textarea name="content" id="content" cols="50" rows="5"></textarea>
		<input type="submit" name="btn-post" value="Submit">

	</form>

	<a href="../php/logout.php">Sign Out</a>

</body>
</html>
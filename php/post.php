<?php 

require_once("../php/classes.php");
require_once("../php/session.php");


if(isset($_POST['btn-post'])){

	$post = new POST();
	
	$post_content = htmlspecialchars(trim(strip_tags($_POST['content'])));

	$post->createpost($_SESSION['user_session'], $post_content);

	$post->redirect('../views/home.php');
}

if(isset($_GET['sessionnumuserposts'])){

	$post = new POST();
	$posts = $post->getuserposts($_SESSION['user_session']);
	echo (sizeof($posts));
}


?> 
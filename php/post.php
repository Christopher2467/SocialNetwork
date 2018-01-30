<?php 

require_once("../php/session.php");
require('../models/post.php');


if(isset($_POST['btn-post'])){

	//var_dump($_POST);

	$post = new POST();
	
	$post_content = htmlspecialchars(trim(strip_tags($_POST['content'])));

	$post->createpost($_SESSION['user_session'], $post_content);
	
}

?> 
<?php 

require("classes.php");



if (isset($_GET['newestposts'])) {
	$rows_req = $_GET['newestposts'];
	
	$post = new POST();
	$posts = $post->get10newestposts($rows_req);
	
	if($posts == false){

		echo false;

	}else{

		echo json_encode($posts);

	}	
	
}

?>
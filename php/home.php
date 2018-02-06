<?php

require("classes.php");
require_once('session.php');




if (isset($_GET['newestfriendsposts'])) {
	
	$friend = new FRIEND();
	$friends = $friend->getfriends($_SESSION['user_session']);

	$post = new POST();

	$unsorted_posts = array();

	for($i = 0; $i < sizeof($friends); $i++){

		$user_posts = $post->get5userposts($friends[$i]['friend_id']);

		for($n = 0; $n < sizeof($user_posts); $n++){

			array_push($unsorted_posts, $user_posts[$n]);

		}

	}

	//https://stackoverflow.com/questions/2910611/php-sort-a-multidimensional-array-by-element-containing-date/2910637
	//thank god for this answer lol
	function date_compare($a, $b){
	    $t1 = strtotime($a['post_date']);
	    $t2 = strtotime($b['post_date']);
	    return $t2 - $t1;
	}    

	usort($unsorted_posts, 'date_compare');

	
	echo json_encode($unsorted_posts);

}
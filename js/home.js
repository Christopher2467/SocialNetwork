
window.onload = (function () {
	drawUser()

	getNewestFriendsPosts(function(fposts){

		if (JSON.parse(fposts).length == 0){
			getSessionId(function(id){
				populateFriendsTable(id, "No posts found, why not write your own", new Date().toLocaleString())
			});
		}


		for(n = 0; n < JSON.parse(fposts).length; n++){
			populateFriendsTable(JSON.parse(fposts)[n]['poster_id'],JSON.parse(fposts)[n]['post_content'], JSON.parse(fposts)[n]['post_date'])
		}
	});


});

function getSessionId(callback){

	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/user.php',

  		data: {getsession: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Session Id")
	    	
	  	}

	});
}

function getNewestFriendsPosts(callback){

	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/home.php',

  		data: {newestfriendsposts: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Friends Posts")
	    	
	  	}

	});

}

function getNumUserPosts(callback){
	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/post.php',

  		data: {sessionnumuserposts: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching User Posts")
	    	
	  	}

	});
}

function getSessionUserName(callback){
	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/user.php',

  		data: {getusernamefromsession: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Session Username Posts")
	    	
	  	}

	});
}

function getSessionProfilePicture(callback){
	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/user.php',

  		data: {getsessionprofilepicture: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Session Profile Picture")
	    	
	  	}

	});
}

function getSessionFollowing(callback){
	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/friend.php',

  		data: {sessionamountoffollowing: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Session Amount of people following")
	    	
	  	}

	});
}


function getSessionFollowers(callback){
	var req = ""

	$.ajax({

		type: 'GET',

  		url: '../php/friend.php',

  		data: {sessionamountoffollowers: req},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Session Amount of followers")
	    	
	  	}

	});
}


function populateFriendsTable(poster_id, content, date){
    var table = document.getElementById("newestfriendsposts");
	var row = table.insertRow(table.rows.length);
	row.className = "post";

    var cell1 = row.insertCell(0);
    cell1.className = "userlink";
    
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "<a href = user.php?sendtoposterprofile=" + poster_id + ">Poster</a>";
    cell2.innerHTML = "<p>" + content + "</p>";
    cell3.innerHTML = "<p>" + date + "</p>";
}

function drawUser(){

	var elem_profilepicture = document.getElementById("profilepicture");
	var elem_username = document.getElementById("username");
	var elem_numposts = document.getElementById("numposts");
	var elem_numfollowing = document.getElementById("numfollowing");
	var elem_numfollowers = document.getElementById("numfollowers");

	

	getSessionProfilePicture(function(picturepath){
		elem_profilepicture.src = "../images/" + picturepath + ".jpg"
	});

	getSessionUserName(function(username){
		elem_username.innerHTML = username
	});

	getNumUserPosts(function(numposts){
		elem_numposts.innerHTML = numposts
	});

	getSessionFollowing(function(amount){
		elem_numfollowing.innerHTML = amount
	});

	getSessionFollowers(function(amount){
		elem_numfollowers.innerHTML = amount
	});

}

window.onload = (function () {

	editUserValues();


	document.getElementById('btn-follow').onclick = followUser;


	getUserPosts(function(posts){
		
		if(posts == false){
			alert("No user found")
		}else{
			for (i = 0; i < JSON.parse(posts).length; i++){
				populateTable(JSON.parse(posts)[i]['post_content'], JSON.parse(posts)[i]['post_date'])
			}
		}

	});

});

function getUserId(callback){

	vuser = getUsernameFromUrl()
	
	$.ajax({

		type: 'GET',

  		url: '../php/user.php',

  		data: {getuserid: vuser},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching id")
	    	
	  	}

	});


}

function issessionFollowing(callback){

	getUserId(function(id){
		$.ajax({

			type: 'GET',
		  	url: '../php/friend.php',

		  	data: {checkiffriend: id},

			success: callback,

			error: function(data) {
			  	console.log("Error checking if session is following")
			}

		});
	});
}


function followUser(){

	getUserId(function(id){
		$.ajax({

			type: 'POST',

	  		url: '../php/friend.php',

	  		data: {addfriend: id},

		  	success: function(data) {

		  		if(data){
		  			console.log("Followed User")
		  			window.location.reload()
		  		}
		  		if(data == false){
		  			alert("Already following user")
		  		}
		  	},

		 	error: function(data) {
		    	console.log("Error Following User")
		  	}

		});
	});
	

}

function getUsernameFromUrl(){
	//get the url args
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	var vuser = vars['user']

	return vuser
}

//get user posts from username in url
function getUserPosts(callback){

	
	vuser = getUsernameFromUrl()
	

	$.ajax({

		type: 'GET',

  		url: '../php/user.php',

  		data: {userposts: vuser},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching id")
	    	
	  	}

	});


}

function getSession(callback){

	args = ""

	$.ajax({

		type: 'GET',

  		url: '../php/user.php',

  		data: {getsession: args},

	  	success: callback,

	 	error: function() {
	    	console.log("error fetching session")
	    	
	  	}

	});
	
}

function editUserValues(){

	var vuser = getUsernameFromUrl()

	getSession(function(s_id){
		getUserId(function(u_id){
			issessionFollowing(function(response){

				if(response){
					document.getElementById('btn-follow').disabled = true
					document.getElementById('btn-follow').innerHTML = "Already Following"
				}

				if(s_id == u_id){
					document.getElementById('btn-follow').disabled = true
					document.getElementById('btn-follow').innerHTML = "This is your profile"
				}

			});
		});
	});



	var usernameTag = document.getElementById("username");
	username.innerHTML = "The poster is: " + vuser;
}

function populateTable(content, date) {
    var table = document.getElementById("posts");
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "<a href=" + window.location.href +">Poster</a>";
    cell2.innerHTML = "<p>" + content + "</p>";
    cell3.innerHTML = "<p>" + date + "</p>";

}

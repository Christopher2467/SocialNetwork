
window.onload = (function () {
	
	editUserValues();

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

//get user posts from username in url
function getUserPosts(callback){

	//get the url args
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	var vuser = vars['user']

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

function editUserValues(){

	//get the url args
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);
	//username from url
	var vuser = vars['user'];

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


window.onload = (function () {
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
	    	alert("error fetching Newest Posts")
	    	
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
	    	alert("error fetching Newest Posts")
	    	
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

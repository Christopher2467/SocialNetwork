
window.onload = (function () {

	getNewestFriendsPosts(function(fposts){
		for(n = 0; n < JSON.parse(fposts).length; n++){
			populateFriendsTable(JSON.parse(fposts)[n]['poster_id'],JSON.parse(fposts)[n]['post_content'], JSON.parse(fposts)[n]['post_date'])
		}
	});


});



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

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "<a href = user.php?sendtoposterprofile=" + poster_id + ">Poster</a>";
    cell2.innerHTML = "<p>" + content + "</p>";
    cell3.innerHTML = "<p>" + date + "</p>";
}

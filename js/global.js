
window.onload = (function () {

	getNewestPosts(function(posts){
		for(i = 0; i < JSON.parse(posts).length; i++){
			populateTable(JSON.parse(posts)[i]['poster_id'],JSON.parse(posts)[i]['post_content'], JSON.parse(posts)[i]['post_date'])
		}
	
	});

});


function getNewestPosts(callback){


	var reqamount = 10;

	$.ajax({

		type: 'GET',

  		url: '../php/global.php',

  		data: {newestposts: reqamount},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching Newest Posts")
	    	
	  	}

	});


}

function populateTable(poster_id, content, date){

    var table = document.getElementById("newestposts");
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
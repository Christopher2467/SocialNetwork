
window.onload = (function () {

	getUserId(function(id){
		console.log(id)
	});

});

function getUserId(callback){

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

  		data: {userid: vuser},

	  	success: callback,

	 	error: function(data) {
	    	alert("error fetching id")
	    	
	  	}

	});


}

function getUserPosts(){

}

function populateTable() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
}

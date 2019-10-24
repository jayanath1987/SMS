<!DOCTYPE HTML>
<html>
    <head>
        <title>Category Manager</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>

<div style='margin:0 0 .5em 0;'>
	<!-- when clicked, it will show the user's list -->
	<div id='viewUsers' class='customBtn'>View Category</div>

	<!-- when clicked, it will load the add user form -->
	<div id='addUser' class='customBtn'>+ New Category</div>
	
	<!-- this is the loader image, hidden at first -->
	<div id='loaderImage'><img src='images/ajax-loader.gif' /></div>
	
	<div style='clear:both;'></div>
</div>

<!-- this is wher the contents will be shown. -->
<div id='pageContent'></div>

<script src='js/jquery-1.9.1.min.js'></script>

<script type='text/javascript'>
$(document).ready(function(){
	
	// VIEW USERS on load of the page
	$('#loaderImage').show();
	showUsers();
	
	// clicking the 'VIEW USERS' button
	$('#viewUsers').click(function(){
		// show a loader img
		$('#loaderImage').show();
		
		showUsers();
	});
	
	// clicking the '+ NEW USER' button
	$('#addUser').click(function(){
		showCreateUserForm();
	});

	// clicking the EDIT button
	$(document).on('click', '.editBtn', function(){ 
	
		var user_id = $(this).closest('td').find('.userId').text();
		console.log(user_id);
		
		// show a loader image
		$('#loaderImage').show();

		// read and show the records after 1 second
		// we use setTimeout just to show the image loading effect when you have a very fast server
		// otherwise, you can just do: $('#pageContent').load('update_form.php?user_id=" + user_id + "', function(){ $('#loaderImage').hide(); });
		setTimeout("$('#pageContent').load('update_form.php?user_id=" + user_id + "', function(){ $('#loaderImage').hide(); });",1000);
		
	});	
	
	
	// when clicking the DELETE button
    $(document).on('click', '.deleteBtn', function(){ 
        if(confirm('Are you sure?')){
		
            // get the id
			var user_id = $(this).closest('td').find('.userId').text();
			
			// trigger the delete file
			$.post("delete.php", { id: user_id })
				.done(function(data) {
					// you can see your console to verify if record was deleted
					console.log(data);
					
					$('#loaderImage').show();
					
					// reload the list
					showUsers();
					
				});

        }
    });
	
	
    // CREATE FORM IS SUBMITTED
     $(document).on('submit', '#addUserForm', function() {

		// show a loader img
		$('#loaderImage').show();
		
		// post the data from the form
		$.post("create.php", $(this).serialize())
			.done(function(data) {
				// 'data' is the text returned, you can do any conditions based on that
				showUsers();
			});
	 			
        return false;
    });
	
    // UPDATE FORM IS SUBMITTED
     $(document).on('submit', '#updateUserForm', function() {

		// show a loader img
		$('#loaderImage').show();
		
		// post the data from the form
		$.post("update.php", $(this).serialize())
			.done(function(data) {
				// 'data' is the text returned, you can do any conditions based on that
				showUsers();
			});
	 			
        return false;
    });
	
});

// READ USERS
function showUsers(){
	// read and show the records after at least a second
	// we use setTimeout just to show the image loading effect when you have a very fast server
	// otherwise, you can just do: $('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });
	// THIS also hides the loader image
	setTimeout("$('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });", 1000);
}

// CREATE USER FORM
function showCreateUserForm(){
	// show a loader image
	$('#loaderImage').show();
	
	// read and show the records after 1 second
	// we use setTimeout just to show the image loading effect when you have a very fast server
	// otherwise, you can just do: $('#pageContent').load('read.php');
	setTimeout("$('#pageContent').load('create_form.php', function(){ $('#loaderImage').hide(); });",1000);
}
</script>

</body>
</html>
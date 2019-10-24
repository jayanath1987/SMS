<?php
//include database connection
include 'libs/db_connect.php';


try{
	//write query
	$query = "INSERT INTO category SET title = ?, message = ?";//, username = ?, password  = ?";

	//prepare query for excecution
	$stmt = $con->prepare($query);

	//bind the parameters
	//this is the first question mark
	$stmt->bindParam(1, $_POST['title']);

	//this is the second question mark
	$stmt->bindParam(2, $_POST['message']);

//	//this is the third question mark
//	$stmt->bindParam(3, $_POST['username']);
//
//	//this is the fourth question mark
//	$stmt->bindParam(4, $_POST['password']);

	// Execute the query
	if($stmt->execute()){
		echo "User was created.";
	}else{
		echo "Unable to created user.";
	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
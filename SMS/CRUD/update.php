<?php
//include database connection
include 'libs/db_connect.php';

try{

	//write query
	//in this case, it seemed like we have so many fields to pass and 
	//its kinda better if we'll label them and not use question marks
	//like what we used here
	$query = "update 
				template 
			set 
				title = :title, 
				message = :message

			where
				id = :id";

	//prepare query for excecution
	$stmt = $con->prepare($query);

	//bind the parameters
	$stmt->bindParam(':title', $_POST['title']);
	$stmt->bindParam(':message', $_POST['message']);
//	$stmt->bindParam(':username', $_POST['username']);
//	$stmt->bindParam(':password', $_POST['password']);

	$stmt->bindParam(':id', $_POST['id']);

	// Execute the query
	if($stmt->execute()){
		echo "User was updated.";
	}else{
		echo "Unable to update template.";
	}

}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
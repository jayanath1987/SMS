<?php
//include database connection
include 'libs/db_connect.php';

try {

	$query = "DELETE FROM template WHERE id = ?";
	$stmt = $con->prepare($query);
	$stmt->bindParam(1, $_POST['id']);
	
	if($stmt->execute()){
		echo "User was deleted.";
	}else{
		echo "Unable to delete user.";
	}
	
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
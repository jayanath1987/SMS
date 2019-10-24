<?php
try {
	include 'libs/db_connect.php';
	
	//prepare query
	$query = "select 
				id, title, message
			from 
				template 
			where 
				id = ? 
			limit 0,1";
			
	$stmt = $con->prepare( $query );

	//this is the first question mark
	$stmt->bindParam(1, $_REQUEST['user_id']);

	//execute our query
	if($stmt->execute()){
	
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//values to fill up our form
		$id = $row['id'];
		$title= $row['title'];
		$message = $row['message'];
		//$username = $row['username'];
		//$password = $row['password'];
		
	}else{
		echo "Unable to read record.";
	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
<!--we have our html form here where new user information will be entered-->
<form id='updateUserForm' action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Title</td>
            <td><input type='text' name='title' value='<?php echo $title; ?>' required /></td>
        </tr>
        <tr>
            <td>Message</td>
            <td><input type='text' name='message' value='<?php echo $message;  ?>' required /></td>
        </tr>
<!--        <tr>
            <td>Username</td>
            <td><input type='text' name='username'  value='<?php echo $username;  ?>' required /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' value='<?php echo $password;  ?>' required/></td>-->
        <tr>
            <td></td>
            <td>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $id ?>' />
                <input type='submit' value='Update' class='customBtn' />
				
            </td>
        </tr>
    </table>
</form>

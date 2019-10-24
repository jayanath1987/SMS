<?php
//include database connection
include 'libs/db_connect.php';

//select all data
$query = "SELECT id, title, message FROM template ORDER BY id desc";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

if($num>0){ //check if more than 0 record found

    echo "<table id='tfhover' class='tftable' border='1'>";//start table
    
        //creating our table heading
        echo "<tr>";
            echo "<th>Title</th>";
            echo "<th>Message</th>";
//            echo "<th>Username</th>";
            echo "<th style='text-align:center; width:190px;'>Action</th>";
        echo "</tr>";
        

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);

            //creating new table row per record
            echo "<tr>";
                echo "<td>{$title}</td>";
                echo "<td >{$message}</td>";
                //echo "<td>{$username}</td>";
                echo "<td style='text-align:center;'>";
					// add the record id here
					echo "<div class='userId'>{$id}</div>";
					
                    //we will use this links on next part of this post
                    echo "<div class='editBtn customBtn'>Edit</div>";
					
                    //we will use this links on next part of this post
                    echo "<div class='deleteBtn customBtn'>Delete</div>";
                echo "</td>";
            echo "</tr>";
        }
        
    echo "</table>";//end table
    
}

// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}

?>
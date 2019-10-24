<?php
//include database connection
include 'CRUD/libs/db_connect.php';

//select all data
$query = "SELECT id, title, message FROM category ORDER BY id desc";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

if($num>0){ //check if more than 0 record found

    echo "<form><table id='tfhover' class='tftable' border='1'>";//start table
    
        //creating our table heading
        echo "<tr>";
            echo "<th style='width:400px;'>Title</th>";
            echo "<th style='width:200px;'>Message</th>";
        echo "</tr>";
        

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
echo "Category ".  "<select>
  <option value='{$id}'>{$title}</option>
</select>";
            //creating new table row per record
            echo "<tr>";
                echo "<td>{$title}</td>";
                echo "<td >{$message}</td>";

                echo "</td>";
            echo "</tr>";
        }
        
    echo "</table></form>";//end table
    
}

// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}

?>
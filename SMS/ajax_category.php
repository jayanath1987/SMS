<?php
include('CRUD/libs/db_connect.php');

//select all data
$query = "SELECT id, title, message FROM category ORDER BY id desc";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();
if($num>0){
     echo "<option value='all'>--Select Category--</option>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<option value='{$id}'>{$title}</option>";
    }
}




?>
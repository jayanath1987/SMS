<?php

include('CRUD/libs/db_connect.php');
require_once 'sms.php';
if($_POST){
//select all data
$query = "SELECT id, message FROM category where id = ".$_POST['Category'];
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();
if($num>0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $body=$row['message'];
    $Mobile=explode(",",$body);
    }
    
    
    if($_POST['group1'] == '1'){
        $query2 = "SELECT id, message FROM template where id = ".$_POST['template'];
        $stmt2 = $con->prepare( $query2 );
        $stmt2->execute();
        $num2 = $stmt2->rowCount();
        if($num2>0){
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $Message=$row2['message'];
        }
    }else{
        $Message=$_POST['message'];
    }
    
    try{
/**   SMS single*/        
//    $sms_content = 'SMS Content 1';
//    $config = array('message' => $Message, 'recepient' => $Mobile[0]);
//    $smso = new sms();
//    $result = $smso->sendsms($config);
//    if ($result[0] == 1) {
//        //SMS Sent
//        echo 'ok';
//    } else {
//        //SMS wasn't Sent
//        echo 'error';
//    }

//Bulk SMS
//$dataarray=array(array('sms_content' => 'Test 1','sms_recepient' => '0779105338'),array('sms_content' => 'Test 2','sms_recepient' => '0779105338'),array('sms_content' => 'Test 3','sms_recepient' => '0779105338'));

foreach ($Mobile as $key) {
    $dataarray[]=array('sms_content' => $Message,'sms_recepient' => $key);
}

$smso = new sms();
$result = $smso->sendsmsbatch($dataarray);
if ($result[0] == 1) {
    //SMS Sent
    echo 'ok';
    $status = '1';
    $msg = "SMS Sent";
} else {
    //SMS wasn't Sent
    echo 'error';
    $status = '0';
    $msg = "SMS Not Sent";
}        
        
        $date = date("Y-m-d H:i:s");
        //$user = $_SERVER['loggedin'];
        $user = "icta";
        //$status = "0";
        $query3 = "INSERT INTO send_messages SET cid = ?, tid = ?,message = ?,date = ?,username = ?,status = ?";
        $stmt3 = $con->prepare($query3);
        $stmt3->bindParam(1, $_POST['Category']);
        $stmt3->bindParam(2, $_POST['template']);
        $stmt3->bindParam(3, $Message);
        $stmt3->bindParam(4, $date);
        $stmt3->bindParam(5, $user);
        $stmt3->bindParam(6, $status);        
        if($stmt3->execute()){
		echo "Successfully Send.";
                header("location:protected.php?gmessage='Successfully Saved and {$msg}'");
	}else{
		echo "Unable to Send.";
                header("location:protected.php?gmessage='Unable to Save and {$msg}'");
	}
        
    }catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
    }
    
    

    
    
}

?>


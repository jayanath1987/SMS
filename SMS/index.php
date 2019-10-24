<?php
error_reporting(0);
session_start();
require_once 'includes/main.php';


/*--------------------------------------------------
	Handle visits with a login token. If it is
	valid, log the person in.
---------------------------------------------------*/

if($_REQUEST['relog']== '1'){
    //echo "Wrong Username or Password"; ?>
    <div class="alert-box notice" style="text-align: center; width: 400px; margin: 0 auto;"><span>notice: </span>Wrong Username or Password</div>
    <?php
}




if(isset($_GET['logout'])){

	$user = new User();

	if($user->loggedIn()){
		$user->logout();
	}
        session_start();
        session_destroy();
	redirect('index.php?relog=0');
        


}



?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>CGR SMS</title>
                <link rel="stylesheet" href="box.css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

		<!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>

		<form id="login-register" method="post" action="checklogin.php">

                    <h2 style="text-align: center">Sri Lanka Railways</h2>
                        <h3 style="text-align: center">SMS Alerting Module </h3>
			<input type="text" placeholder="username" name="un" autofocus />
                        <input type="password" placeholder="password" name="pw" autofocus />
			<p style="margin-left: 100px;">Enter credentials to login the system</p>
                        
                        <button style="margin-left: 100px;" type="submit">Login</button>
                        <button type="reset" >Reset</button>
                        
                        <span></span>

		</form>

            <footer style="text-align: center">
            <a class="" href="http://www.icta.lk">Copyright © 2014 ICTA</a>
        </footer>
        


	</body>
</html>
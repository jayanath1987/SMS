<?php
session_start();
if (!$_SESSION['loggedin']){

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>SMS</title>
                <link rel="stylesheet" type="text/css" href="CCRUD/css/style.css">
		<!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />
                <link rel="stylesheet" href="box.css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
                 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
 $(function() {
$( "#tabs" ).tabs({
collapsible: true
});
});

$(document).ready(function(){
   
});
</script>

	</head>

	<body>

            <div id="protected-page" style="padding-left: 4px;">
              <?php      if($_GET){ 
    //echo $_GET['gmessage']; ?>
    <div class="alert-box notice" style="text-align: center; width: 400px; margin: 0 auto;"><span>notice: </span><?php echo $_GET['gmessage']; ?></div>
 <?php   }
?>
    
<div id="tabs" style="width: 98%;">
<ul>
<li><a href="#tabs-1">Send Message</a></li>
<li><a href="#tabs-2">Categories</a></li>
<li><a href="#tabs-3">Templates</a></li>
<li><a href="#tabs-4" class="logout-button">Logout</a></li>
</ul>
    <div id="tabs-1"><form action="saverequest.php" method="post" onsubmit="return validate()">
<h3>Send Message</h3>
<div id='pageContent'></div>
<div class="pagecontentdiv">
    <br>
    Category :
<select name="Category" class="Category" id="Category" >
<option selected="selected">--Select Category--</option>
</select>
    
    <br><br>
    Template :
    <input type="radio" name="group1" value="1" autocomplete="off"> Existing <input type="radio" name="group1" value="0" autocomplete="off"> New <br>
    <br>
    <div id="existing">
            
            
        <select name="template" class="template" id="template" >
            <option selected="selected" value="all">--Select template--</option>
            </select>
    </div>
    <div id="new"> Message : 
        <textarea id="message" name="message" maxlength="160" style="width: 300px; height: 100px;"  ></textarea>

    </div>
            <br>
       
</div> <input type='submit' value='Send' class='customBtn' />
    </form>

</div>
<div id="tabs-2">
<h3>Category Manager</h3>
<iframe src="CCRUD/index.php" style="width: 100%; height: 100%; min-height: 400px;" ></iframe> 
</div>
<div id="tabs-3">
<h3>Template Manager</h3>
<iframe src="CRUD/index.php" style="width: 100%; height: 100%; min-height: 400px;" ></iframe> 
</div>
<div id="tabs-4">
<h3>Logout</h3>
<a href="index.php?logout=1" class="logout-button">Logout</a>
</div>    
</div>
		</div>
            <footer style="text-align: center">
            <a class="" href="http://www.icta.lk">Copyright © 2014 ICTA</a>
        </footer>
	</body>
</html>


<script type='text/javascript'>
$(document).ready(function(){
    
    $("#new").hide();
    $("#existing").hide(); 
    
    showCategories();
    showTemplates();
    

    $("input[name$='group1']").click(function() {
        var test = $(this).val();
        if(test == 0){
        $("#existing").hide();
        $("#message").val("");
        $("#new").show();
        }else{
        $("#new").hide();
        $("#existing").show();            
        }

    });
});

function validate(){
    if($("#Category").val() == 'all'){
        alert("Invalid Category");
        return false;
    }
var radio_value = $('input:radio[name=group1]:checked').val();
    if(radio_value == null){
       alert("Invalid Template type");
        return false;
    }
    if(radio_value == "1"){
        if($("#template").val() == 'all'){
        alert("Invalid Template");
        return false;
    }
    }
    if(radio_value == "0"){
        if($("#message").val() == ""){
        alert("Invalid Message");
        return false;
        }
    }
}

function showCategories(){
    $.ajax
({
type: "POST",
url: "ajax_category.php",
//data: dataString,
cache: false,
success: function(html)
{
$(".Category").html(html);
}
});

 
}

function showTemplates(){
    $.ajax
({
type: "POST",
url: "ajax_template.php",
//data: dataString,
cache: false,
success: function(html)
{
$(".template").html(html);
}
});

 
}

</script>
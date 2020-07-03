<?php
session_start();
$dbServername = "localhost";
$dbUsername  = "root";
$dbPassword = "";
$dbName = "myloan";
$conn =new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
?>
<html lang="en-us">
 <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
 <style>
 
 </style>
 
 <body>
   

 <nav class="navbar navbar-inverse">
  
   <div class="container-fluid">
   
    <div class="navbar-header">
	
      <a class="navbar-brand" href="index.php" style="color:goldenrod;">ZeeLoan</a>
    </div>
    <ul class="nav navbar-nav">
	  <li class="active" ><a href="applyloan.php" style="color:goldenrod;">Apply for a loan</a></li>
	  <li><a href="aboutus.php"style="color:goldenrod;">about us</a></li>
	  <li><a href="tac.php"style="color:goldenrod;">Terms and conditions</a></li>
	  
     </ul>
	 <ul class="nav navbar-nav navbar-right" id="icon">
	 <li><a href="controls.php"style="color:goldenrod;">admin</a></li>
	 <li><a href="profile.php"style="color:goldenrod;">my profile</a></li>
	  <li><a href="logout.php"style="color:goldenrod;">Logout</a></li>
	  
	 </ul>
	
	 </div>
</nav>


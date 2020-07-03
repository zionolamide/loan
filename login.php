
<?php include ("layout/headers.php");?>
<?php include ("css/login.css");?>
<?php
if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])){
    header("location:profile.php");
}
if(isset($_POST['login'])){
	$dbServername = "localhost";
	$dbUsername  = "root";
	$dbPassword = "";
	$dbName = "myloan";
	  
	
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	
	
	$conn =new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	
	if(empty($email) || empty($pwd)){
		echo "some fields are missing";
		header("location:login");
	}else{
		$sql="SELECT * FROM users WHERE email='".$email."' AND pwd='".md5($pwd)."' ";
		$query = $conn->query($sql);
		if ($query->num_rows > 0){
            $user = $query->fetch_assoc();
            $_SESSION['user'] = $user;
            header("location:profile.php");
		}else{
			echo "email does not exist";
			
		}
	}
}
?>
<div class=" ">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="image/images.jpeg" alt="images" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="image/pic2.jpg" alt="pic2" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="image/pic1.jpg" alt="pic1" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
  <div class="row" id="background">
	<div class="col-sm-4"></div>
	  <div class="col-sm-4" id="form">
		<h2 style="text-align:center;"><p >&#10046;</p>Login Now<hr style="width:150px;"></h2>
	     <form class="form-horizontal" method="post" action=""  >
		   <!--email row-->
			<div class="form-group">
			 <label class="control-label col-sm-4" for="email">Email:</label>
			  <div class="col-sm-6">
			   <input type="email" class="form-control" id="email" name="email" placeholder="enter email" >
			   
			  </div>
			</div>
			 
			<!--password row-->
			 <div class="form-group">
			 <label class="control-label col-sm-4" for="pwd">Password:</label>
			  <div class="col-sm-6">
			   <input type="password" class="form-control" id="pwd" name="pwd" placeholder="enter password" >
			  </div>
			</div>
			<!--submit row-->
			<div class="form-group">
			 <div class="col-sm-offset-2 col-sm-1">
			  <button type="submit" class="btn btn-default" name="login" style="margin-left:100px; border:2px solid gray;border-radius:8px; background-color:black; color:azure;">Login</button>
			 </div>
		   </div>
	   
	     </form>
	  </div>
	  <div class="col-sm-4"></div>
  </div>
<?php include ("layout/footers.php");?>
























<?php include ("layout/headers.php");?>
<?php include ("css/register.css");?>

<?php
if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])){
    header("location:profile.php");
}
if(isset($_POST['submit'])){



      $fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $pwd = $_POST['pwd'];
	 
      $country = $_POST['country'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
	  
        $username_error ="";
		 $email_error= "";
		  $pwd_error= "";
       $MESSAGESERROR = "";
	   $MESSAGES = "";
	  $dbServername = "localhost";
      $dbUsername  = "root";
      $dbPassword = "";
      $dbName = "myloan";
      $conn =new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (empty($_POST["fullname"]) || empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["pwd"]) || empty($_POST["country"]) || empty($_POST["gender"]) || empty($_POST["dob"])) {
    $MESSAGESERROR = "some fields are missing";

	}else{
	    $pwd = md5($pwd);
	    $sql ="INSERT INTO users (`fullname`,`username`,`email`,`pwd`,`country`,`gender`,`dob`) VALUES ('$fullname','$username','$email','$pwd','$country','$gender','$dob')";
	    $queryresult = $conn->query($sql);
	
  }	  
   
  
	 
	  
   if (!empty($_POST["fullname"]) || !empty($_POST["username"]) || !empty($_POST["email"]) || !empty($_POST["pwd"]) || !empty($_POST["country"]) || !empty($_POST["gender"]) || !empty($_POST["dob"]) ) {
   $MESSAGES = "Registration successful <br> <a href='login.php'>click here</a> to go to the login page ";
	
  } 
  
	  
  }

	
  	
}



  
?>


 
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
        </div>
      </div>
      <div class="item">
        <img src="image/pic2.jpg" alt="pic2" style="width:100%;">
        <div class="carousel-caption">  
        </div>
      </div>
      <div class="item">
        <img src="image/pic1.jpg" alt="pic1" style="width:100%;">
        <div class="carousel-caption"> 
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
 
  
 <!--form row--> 
  <div class="row" id="background">
  <!--first grid-->
  <div class="col-sm-4">hello</div>
  
  <!--second grid-->
  <div class="col-sm-4" id="form">
  
   <h2 style="text-align:center; margin-bottom:50px;"><p >&#10046;</p> register now <hr style="width:350px; "> </h2> 
    <form class="form-horizontal" method="post" action="">	
	 <!--fullname row-->
	  <div class="form-group">	

		<label class="control-label col-sm-4" for="fullname">Fullname:</label>
		  <div class="col-sm-6">
			<input type="fullname" class="form-control" id="fullname" name="fullname" placeholder="enter fullname" >
			  <?php if (isset($MESSAGESERROR) &&  isset($MESSAGESERROR) && $MESSAGESERROR) { ?> 			    
               <div class='alert alert-danger'> <?php echo $MESSAGESERROR; ?></div>
             <?php } ?>	  
			    
		 </div>
	  </div>
	  <!--username row-->
	  <div class="form-group">
		<label class="control-label col-sm-4" for="username">Username:</label>
		  <div class="col-sm-6">
			<input type="username" class="form-control" id="username" name="username" placeholder="enter username" >
			  <?php if (isset($username_error) &&  isset($username_error) && $username_error) { ?> 			    
               <div class='alert alert-danger'> <?php echo $username_error; ?></div>
             <?php } ?>	
			  
		  </div>         
	  </div>
	  <!--email row-->
	  <div class="form-group">
		<label class="control-label col-sm-4" for="email">Email:</label>
		  <div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" placeholder="enter email" >
			 <?php if (isset($email_error) &&  isset($email_error) && $email_error) { ?> 			    
               <div class='alert alert-danger'> <?php echo $email_error; ?></div>
             <?php } ?>	
			  
		 </div>     
	  </div>
	  <!--password row-->
	  <div class="form-group">
		<label class="control-label col-sm-4" for="email">Password:</label>
		  <div class="col-sm-6">
			<input type="password" class="form-control" id="pwd" name="pwd" placeholder="enter password" >
			  
			  		  
		 </div>     
	  </div>
	  <!--country row-->
	  <div class="form-group">
	   <label class="control-label col-sm-4" for="country">Country:</label>
		<div class="col-sm-6">
		  		   
		  <div class="autocomplete" style="width:190px;">
           <input id="myInput" type="text" name="country" placeholder="Country" style="border-radius:9px;" >				
          </div>
		</div>
	 </div>
	 <!--gender row -->
	 <div class="form-group">
	  <label class="control-label col-sm-4" for="pwd">Gender:</label>			   
	    <div class="col-sm-6">
		  <select name="gender" class="form-control">
		    <option value="male">male</option>
		    <option value="female">female</option>
			<option value="others">others</option>
		  </select>
		  
		  
		</div>          
	 </div>
	 <!--date of birth row-->	 
	 <div class=" form-group">
       <label class="control-label col-sm-4" for="dob">Date of birth:</label> 
        <div class="col-sm-6"> 
		  <input  name="dob" type="text" class="form-control" id="dob" placeholder="DD/MM/YY">
		   
            			
	    </div>         
	 </div>
	 <!--buttom-->
	 <div class="form-group">
	   <div class="col-sm-offset-2 col-sm-1" id="button">
		 <button type="submit" class="btn btn-default" name="submit" style="margin-left:100px; border:2px solid gray;border-radius:8px; background-color:black; color:azure;">Register</button>
	   </div>
	 </div> 
	 
	</form>
  </div>
  <!--third grid-->
  <div class="col-sm-4">
  <div class="col-sm-6">
   <?php if (isset($MESSAGES) &&  isset($MESSAGESERROR) && !$MESSAGESERROR) { ?> 			    
        <div class='alert alert-success'> <?php echo $MESSAGES; ?></div>
     <?php } ?>	 
   </div>
 
  </div>
  </div>
	
</div>
	
<?php include ("layout/footers.php");?>

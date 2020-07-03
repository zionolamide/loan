 






<?php
if(isset($_POST['intouch_submit'])){
$dbServername = "localhost";
$dbUsername  = "root";
$dbPassword = "";
$dbName = "myloan";
$conn =new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


$fullname = $_POST['fullname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
 
   $messagesError="";
   $messageSuccess="";
    //$fullnameErr = $emailErr = $subjectErr = $messageErr ="";	
	//$fullnameSuccess = $emailSuccess = $subjectSuccess = $messsageSuccess = $alertSuccess ="";
	//$fullname = $email = $subject = $message = $alert= "";
	
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(empty($_POST["fullname"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"]) ){
		$messagesError="opps some fields are not filled properly";
	
	
	}else{
		
		
		
		$sql ="INSERT INTO intouch (`fullname`,`email`,`subject`,`message`) VALUES ('$fullname','$email','$subject','$message')";
         $queryresult = $conn->query($sql);
		 
	}
	 
   if(!empty($_POST["fullname"]) || !empty($_POST["email"]) || !empty($_POST["subject"]) || !empty($_POST["message"])){
		$messageSuccess="we've recieve your message,and we will send you feedback about your message";
	}else{
		
		 
	  } 
    }

  }


function tests_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

?>
<?php include ("css/footer.css");?>

    <div id="intouch">
	    <div class="row" id="hhhh" >
	  <!--first grid row-->
		<div class="col-sm-4" >
		 <h3 style="color:black">Our priority<hr width="180px;"></h3>
		  <p style="color:black"> Our priority is to always be there <br>for our customers</p>
		</div>
		<!--second grid row-->
		<div class="col-sm-4" > 
		  <h3 style="color:black">Our vision<hr width="180px"; ></h3>
		   <p style="color:black">To be the retail banking experience <br>of choice in africa.</p>
		</div>
		<!--the third row-->
		<div class="col-sm-4">
		  <h3 style="color:black">Our mission<hr width="180px;"></h3>
		   <p style="color:black">providing customer-centric financial solutions for all markrt, through user-friendly technology innovations</p>
		</div>
	 </div>
	 <div class="row" id="loans">
	  <h3 style="text-align:center;">The types of loans we offer.<hr style="width:330px;"></h3>	
       <!--the firsh grid row-->	  
		<div class="col-sm-4" id="student"> 
		  <img src="image/loan2.jpg" alt="loan2"  width="149px" class="img-responsive" style=" border: 2px solid goldenrod;border-radius: 9px;">
		   <h4 style="margin-right:240px;">Student loan.</h4>
		</div>
		<!--the second grid row-->
		<div class="col-sm-4" id="personal">
		  <img src="image/loan3.jpg" alt="loan3"  width="149px" class="img-responsive" style=" border: 2px solid goldenrod;border-radius: 9px; margin-left:120px">
		   <h4 style="margin-left:10px;">personal loan.</h4>
		</div>
		<!--the third grid row-->
		<div class="col-sm-4" id="business">
		  <img src="image/loan4.jpg" alt="loan4"  width="149px" class="img-responsive" style=" border: 2px solid goldenrod;border-radius: 9px;margin-left: 220px;">
		   <h4 style="margin-left:200px;">Business loan.</h4>
		</div>	
     </div>
<hr>
<!--the grid row-->
<div class="row">
 <h2 >We are always happy to hear from you</h2>
	  <h6>why not get intouch with us?</h6>
 <!--first grid row-->
	<div class="col-sm-3">
	 
	</div>
 <!--second grid row-->
     
	<div class="col-sm-5">
	 
	 <form class="form-horizontal" method="post" action="">
	   <!--fullname row-->
		<div class="form-group">
		 <label class="control-label col-sm-4" for="fullname">Fulname:</label>
		  <div class="col-sm-7">
		   <input type="fullname" class="form-control" id="fullname" name="fullname" placeholder="enter fullname" >		   
		   <?php if (isset($messagesError) &&  isset($messagesError) && $messagesError) { ?> 			    
             <div class='alert alert-danger'> <?php echo $messagesError; ?></div>
           <?php } ?>
		   <?php if (isset($messageSuccess) &&  isset($messagesError) && !$messagesError) { ?> 			    
             <div class='alert alert-success'> <?php echo $messageSuccess; ?></div>
           <?php } ?>
		   		   
		  </div>
		</div>
		<!--email row-->
		<div class="form-group">
		  <label class="control-label col-sm-4" for="email">Email:</label>
		    <div class="col-sm-7">
		      <input type="email" class="form-control" id="email" name="email" placeholder="enter email" >
		       
		         
		    </div>
		</div>
		<!--subject row-->
		<div class="form-group">
		 <label class="control-label col-sm-4" for="subject">Subject:</label>		 
		  <div class="col-sm-7">		 
		    <input type="subject" class="form-control" id="subject" name="subject" placeholder="enter subject" >
		     
		    
		  </div>
		</div>
		<!--message row-->
		<div class=" form-group">
		  <label class="control-label col-sm-4" for="message">Message:</label>
			<div class="col-sm-7"> 
			  <textarea  name="message" class="form-control" placeholder="Enter your message"></textarea>			   
		      		 
			</div>
		</div>
		<!--button row-->
		<div class="form-group">
		   <div class="col-sm-offset-2 col-sm-1" >			
			<button type="submit"  name="intouch_submit" style="color:azure; margin-left:180px;"> Message</button>		      
		   </div>	      
		</div>
	 </form>
	 
    </div>
	<!--third grid row -->	
	<div class="col-sm-4">
	    
	</div>
	</div>
 
	
	
	
</div>
	 <!--get in touch row-->
	 
  <div class="row" id="location">
   <!--the grid row-->
    <div class="row"></div>
    <div class="col-sm-4">
	 <span style="font-size:40px; color:goldenrod">&#10020;</span>
	
	</div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
	 <span style="font-size:40px; color:goldenrod">&#10020;</span>
	</div>
	
	<div class="row">
	 
	   <div class="col-sm-4" id="call">
	    <h2>Email or Contact us:</h2>
   	     <p><b>timehinzionolamide@gmail.com.<br>08067913476.</p>
	   </div>
	   <div class="col-sm-4" id="loan">
	   <span style="font-size:90px">&#8358;</span>
	    <!----<img src="image/loan.png" alt="loan"  width="90px;"  height="83px;" ;class="img-responsive">-->
		 <p>We offer  loan from 	&#8358;10,000 up to &#8358;10,ooo,ooo</p>
	   </div>
	    	   
		 <div class="col-sm-4" id="process">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			  </ol>
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" id="picture">			  
				<div class="item active">
				   <img src="image/pro6.jpg" alt="pro6"  width="149px" class="img-responsive">
					 <h5 style="margin-right:272px">Create an account.</h5>			   
				</div>
				<div class="item">
				  <img src="image/pro2.jpg" alt="pro2"  width="137px" class="img-responsive">
					<h5 style="margin-right:272px">Apply for a loan.</h5>
				</div>
				<div class="item">
				  <img src="image/pro3.jpg" alt="pro3"  width="137px" class="img-responsive"> 
				   <h5 style="margin-right:272px">Answer few questions.</h5>
				</div>
				<div class="item">
				  <img src="image/pro5.jpg" alt="pro5"  width="120px" class="img-responsive"> 
				   <h5 style="margin-right:272px">Receive your loan in ten minutes.</h5>
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
	    </div>
<!--our location row-->
   <h1 >our location<hr width="280px;"></h1>
    <div class="col-sm-4" style="text-align:center;"><h3><b>ibadan</b></h3>
      <P>GNI Building Oke-Bola Ibadan.</p>
    </div>
    <div class="col-sm-4" style="text-align:center;"><h3><b>osogbo</b></h3>
      <P> opposite obelawo plastic industry.</p>
     </div>
     <div class="col-sm-4" style="text-align:center;"><h3><b>ilorin</b></h3>
     <P>GNI Building famson ilorin.</p>
    </div>
 </div>
</div>
 <div class="row">
 
<!--last footer-->
   <div id="footer">
    <p style="color:goldenrod;">@zeeloan.com</p>
   </div>

</div>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>



<?php include ("layout/header.php");?>
<?php include ("css/applyloan.css");?>
<?php
if (!isset($_SESSION['user']) && !isset($_SESSION['user']['email'])){
    header("location:login.php");
}
$user = $_SESSION['user'];
$prepare_sql_statement = "SELECT * FROM loans WHERE user_id='{$user['id']}' AND (status ='0' OR status = '1')";
$checkLoanQuery = $conn->query($prepare_sql_statement);
if ($checkLoanQuery->num_rows > 0){
    header("location:profile.php?error=You're not eligible for loan application");
}
if(isset($_POST['loan_submit'])){
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$amount = $_POST['amount'];
	$purpose = $_POST['purpose'];
	$business_type = $_POST['business_type'];
	$loan_type = $_POST['loan_type'];
	$MESSAGE_ERROR = "";
	$MESSAGE_SUCCESS = "";
       
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["phone_number"]) || empty($_POST["address"]) || empty($_POST["amount"]) || empty($_POST["purpose"]) || empty($_POST["business_type"]) || empty($_POST["loan_type"])) {
        $MESSAGE_ERROR = "please fill the form correctly";
   
   } else {
		    $user = $_SESSION['user'];
		    $userId = $user['id'];
		    $due = $amount + ($amount * 0.075);
		    $due_date = date('Y-m-d', strtotime('+1 month', time()));
         $sql ="INSERT INTO loans (`user_id`,`phone_number`,`address`,`amount`,`purpose`,`business_type`,`loan_type`, `due`,`due_date`) VALUES ('".$userId."','$phone_number','$address','$amount','$purpose','$business_type','".$loan_type."','".$due."','".$due_date."')";
         $queryresult = $conn->query($sql);
         if ($queryresult){
             $MESSAGE_SUCCESS = "Loan Application was successful! <br> please fill the guarantors form";
         }
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
       <img src="image/images.jpeg" alt="img" height="500" width="2100"class="img-responsive">
	   <div class="carousel-caption"> 
      </div>
    </div>
    <div class="item">
      <img src="image/kkk.jpeg" alt="imgs" height="500" width="2100" class="img-responsive">
	  <div class="carousel-caption">         
      </div>
    </div>
    <div class="item">
      <img src="image/pic4.jpg" alt="pic4" height="500" width="2100" class="img-responsive">
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
<!--grid row-->
 <div class="row">
 <!--apply for a loan form row--> 
   
  <div class="col-sm-6">             
    <form class="form-horizontal" method="post" action="" id="apply">	
	<h3 style="margin-left:270px;">Apply for a loan</h3><hr style=" width:350px; margin-left:190px;">
    
    
	<?php if (isset($MESSAGE_ERROR) &&  isset($MESSAGE_ERROR) && $MESSAGE_ERROR) { ?> 			    
          <div class='alert alert-danger'> <?php echo $MESSAGE_ERROR; ?></div>
    <?php } ?>
    <?php if (isset($MESSAGE_SUCCESS) &&  isset($MESSAGE_ERROR) && !$MESSAGE_ERROR) { ?> 			    
          <div class='alert alert-info'> <?php echo $MESSAGE_SUCCESS; ?></div>
    <?php } ?>

	 <!--phonenumber row-->
	 <div class="form-group">
	  <label class="control-label col-sm-4" for="phone_number">Phone number:</label>
	   <div class="col-sm-6">
		 <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="enter phone number" >		 
	     
		  
	   </div>
	 </div>
	 <!--address row-->
	 <div class="form-group">
	  <label class="control-label col-sm-4" for="address">Address:</label>
	   <div class="col-sm-6">
		<input type="text" class="form-control" id="address" name="address" placeholder="enter address" >
        		 
	   </div>
	 </div>
	 <!--dob row-->
	 <div class=" form-group">
       <label class="control-label col-sm-4" for="dob">Date of birth:</label> 
        <div class="col-sm-6"> 
		 <input  name="dob" type="text" class="form-control" id="dob" placeholder="DD/MM/YY">
        	 
		</div>
     </div>
	 <!--amount row-->
	 <div class="form-group">
	  <label class="control-label col-sm-4" for="amount">Amount:</label>
	   <div class="col-sm-6">
		<input type="text" class="form-control" id="amount" name="amount" placeholder="enter amount" >
        		 
	   </div>
	 </div>
	 <!--purpose row-->
	 <div class="form-group">
	   <label class="control-label col-sm-4" for="purpose">Purpose:</label>
	    <div class="col-sm-6"> 
		  <textarea  name="purpose" class="form-control" placeholder="what do you want to use the loan for?"></textarea>		  
	       
		</div>
	 </div>
	 <!--business type row-->
	 <div class="form-group">
	  <label class="control-label col-sm-4" for="business_type">Business type:</label>
	   <div class="col-sm-6">
		<input type="text" class="form-control" id="business_type" name="business_type" placeholder="enter business type">	
	     
	   </div>
	 </div>
	 <!--loan type row-->
	 <div class="form-group">
	  <label class="control-label col-sm-4" for="loan_type">loan type;</label>   
		<div class="col-sm-6" >
         		 
		 <select name="loan_type" title="loan_type" id="loan_type" class="form-control" >
		 
		  <option value="personal loan" class="form-control">personal loan </option>
		  <option value="student loan" class="form-control"> student loan </option>
		  <option value="business loan" class="form-control"> business loan </option>
		  
		 </select> 
		</div>	  
	 </div>
	 <!--button row-->
	 <div class="form-group">
	   <div class="col-sm-offset-2 col-sm-1">
		 <button type="submit"  name="loan_submit" style="margin-left:100px;  border:3px solid black; border-radius:7px; background-color:black; color:white; padding:10px 25px 10px 25px;" >Submit</button>
		</div>
	 </div> 
   </form>	
  </div>
  <!--garrantor fields form-->
  </div>
</div>
<?php include("layout/footer.php"); ?>

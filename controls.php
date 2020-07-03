<?php
	session_start();
?>
<?php include ("layout/header.php");?>
<?php include ("css/controls.css");?>


<?php 
if(isset($_POST['loan-submit'])){
	
	
}

?>

</head>
<body>
<h1 style="color:goldenrod; text-align:center; ">Controls</h1>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'data')" id="defaultOpen">The Data's Of All Users</button>
  <button class="tablinks" onclick="openCity(event, 'disburse')" id="bt2">Disbursement of loan</button>
  <button class="tablinks" onclick="openCity(event, 'guarantor')" id="bt3">Guarantor's of loan</button>
  <button class="tablinks" onclick="openCity(event, 'messages')" id="bt4">Messages </button>
</div>
<!--The Data's Of All Users row-->
<div id="data" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
   <div class="b1">
     <h3>The Data's Of All Users</h3>
   </div>
      <?php 
    $conn = new mysqli('localhost', 'root', '', 'myloan') or die(conn_error($conn));
	$result = $conn->query("SELECT * FROM users")or die($conn->error);
    //pre_r$result);
   ?>
   <div class="row justify-content-center">
     <table class="table">
	   <thead>
		  <tr>
		    <th>Id</th>
			<th>Fullname</th>
			<th>Username</th>
			<th >Email</th>
			<th>Password</th>
			<th >Country</th>
			<th>Gender</th>
			<th >Dob</th>
		  </tr>
	   </thead>
	   <?php while ($row = $result->fetch_assoc()): ?>
	   <tr>
	     <td><?php echo $row['id']; ?></td>
	     <td><?php echo $row['fullname']; ?></td>
		 <td><?php echo $row['username']; ?></td>
		 <td><?php echo $row['email']; ?></td>
	     <td><?php echo $row['pwd']; ?></td>
		 <td><?php echo $row['country']; ?></td>
		 <td><?php echo $row['gender']; ?></td>
	     <td><?php echo $row['dob']; ?></td>
		
		 
		 
	   </tr>
	   <?php endwhile; ?>
	 </table>
   </div>
	 <?php
	 #pre_r($result->fetch_assoc());
	 function pre_r($array){
	 echo '<pre>';
	 print_r($array);
	 echo '</pre>';
		 }
   
   ?>
</div>
<!--The disbursement row-->
<div id="disburse" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <div id="b2">
  <h3>Disbursement of loan</h3>
  </div>
  <?php 
    $conn = new mysqli('localhost', 'root', '', 'myloan') or die(conn_error($conn));
	$result = $conn->query("SELECT * FROM apply_loan")or die($conn->error);
    //pre_r$result);
   ?>
   <div class="row justify-content-center">
     <table class="table">
	   <thead>
		  <tr>
		    <th>Id</th>
			<th>Fullname</th>
			<th>phone_number</th>
			<th >Email</th>
			<th>Address</th>
			<th >Dob</th>
			<th>Amount</th>
			<th >Purpose</th>
			<th>Gender</th>
			<th >Business Type</th>
			<th>Loan Type</th>
			<th >Collateral</th>
			<th >Guarantor</th>
		  </tr>
	   </thead>
	   <?php while ($row = $result->fetch_assoc()): ?>
	   <tr>
	     <td><?php echo $row['id']; ?></td>
	     <td><?php echo $row['fullname']; ?></td>
		 <td><?php echo $row['phone_number']; ?></td>
		 <td><?php echo $row['email']; ?></td>
	     <td><?php echo $row['address']; ?></td>
		 <td><?php echo $row['dob']; ?></td>
		 <td><?php echo $row['amount']; ?></td>
	     <td><?php echo $row['purpose']; ?></td>
		 <td><?php echo $row['gender']; ?></td>
	     <td><?php echo $row['business_type']; ?></td>
		 <td><?php echo $row['loan_type']; ?></td>
		 <td><?php echo $row['collateral']; ?></td>
	     <td><?php echo $row['guarantor']; ?></td>
		 
		
		 
		 
	   </tr>
	   <?php endwhile; ?>
	 </table>
   </div>
	 
</div>
<!--The guarantor row-->
<div id="guarantor" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <div class="b3">
  <h3 >Guarantor's of loan</h3>
       <?php 
    $conn = new mysqli('localhost', 'root', '', 'myloan') or die(conn_error($conn));
	$result = $conn->query("SELECT * FROM g_loan")or die($conn->error);
    //pre_r$result);
   ?>
   <div class="row justify-content-center">
     <table class="table">
	   <thead>
		  <tr>
		    <th>Guarantor's Id</th>
			<th>Guarantor's Fullname</th>
			<th>Guarantor's phone_number</th>
			<th>Guarantor's Email</th>
			<th>Guarantor's Address</th>
			<th>Guarantor's Dob</th>			
     		<th>Guarantor's Gender</th>			
		  </tr>
	   </thead>
	   <?php while ($row = $result->fetch_assoc()): ?>
	   <tr>
	     <td><?php echo $row['id']; ?></td>
	     <td><?php echo $row['g_fullname']; ?></td>
		 <td><?php echo $row['g_phone_number']; ?></td>
		 <td><?php echo $row['g_email']; ?></td>
	     <td><?php echo $row['g_address']; ?></td>
		 <td><?php echo $row['g_gender']; ?></td>	 
	   </tr>
	   <?php endwhile; ?>
	 </table>
   </div>
	
</div>
</div>
<!--The messages row-->
<div id="messages" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <div class="b4">
  <h3 >Messages From Users</h3>
  </div>
    <?php 
    $conn = new mysqli('localhost', 'root', '', 'myloan') or die(conn_error($conn));
	$result = $conn->query("SELECT * FROM intouch")or die($conn->error);
    //pre_r$result);
   ?>
   <div class="row justify-content-center">
     <table class="table">
	   <thead>
		  <tr>
		    <th> Id</th>
			<th> Fullname</th>
			<th> Email</th>
			<th>Subject</th>
			<th>Message </th>
			<th>Action </th>
            
		  </tr>
	   </thead>
	   <?php while ($row = $result->fetch_assoc()): ?>
	   <tr>
	     <td><?php echo $row['id']; ?></td>
	     <td><?php echo $row['fullname']; ?></td>
		 <td><?php echo $row['email']; ?></td>
		 <td><?php echo $row['subject']; ?></td>
	     <td><?php echo $row['message']; ?></td>	 
	     <td>	
          		 
			<a href="controls.php?reply=<?php echo $row['id']; ?>">reply message</a>
		    
		 </td>
	   </tr>
	   <?php endwhile; ?>
	 </table>
   </div>
	
</div>


     
</body>

<?php include ("include/functions.php");?>
<?php include ("layout/footer.php");?>

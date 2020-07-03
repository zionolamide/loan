<?php include ("layout/header.php");?>
<?php include ("css/profile.css");?>
<?php
	if (!isset($_SESSION['user']) && !isset($_SESSION['user']['email'])){
        header("location:login.php");
    }
?>
<div class="container">
  <div class="row">
	<div class="col-sm-4"> hello</div>
	  <div class="col-sm-4" id="profile">
	    <?php 
    $conn = new mysqli('localhost', 'root', '', 'myloan') or die(conn_error($conn));
	$result = $conn->query("SELECT * FROM users ")or die($conn->error);
    //pre_r$result);
   ?>
   
	   
	   <?php while ($row = $result->fetch_assoc()): ?>
	   
         <h2 style="text-align:center;">Profile</h2>
                    
           <div class="form-group">
		    <label  for="userid">User ID: <?php echo $row['fullname']; ?></label>
			<br>
		   
			
		  </div>
         
	  </div>
	  
	<div class="col-sm-4">
        <?php if (isset($_GET['error']) && $_GET['error'] != ""): ?>
            <span class="alert alert-warning">
                <?php echo  $_GET['error'] ?>
            </span>
        <?php endif; ?>
    </div>
  </div>
 <?php endwhile; ?>
<?php
	 #pre_r($result->fetch_assoc());
	 function pre_r($array){
	 echo '<pre>';
	 print_r($array);
	 echo '</pre>';
		 }
   
   ?>


</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4> My loans Applications</h4>
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Amount</th>
                    <th>Interest rate (%) per month</th>
                    <th>Due </th>
                    <th>Due date</th>
                    <th>status</th>
                    <th>created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $user = $_SESSION['user'];
                $prepare_sql_statement = "SELECT * FROM loans WHERE user_id='{$user['id']}'";
                $checkLoanQuery = $conn->query($prepare_sql_statement);
                $loans = $checkLoanQuery->fetch_all(MYSQLI_ASSOC);
                ?>
                <?php $counter = 1 ?>
                <?php foreach ($loans as $key => $loan): ?>
                    <tr>
                        <td><?php echo $counter?></td>
                        <td><?php echo $loan['amount']?></td>
                        <td><?php echo $loan['interest_rate']?></td>
                        <td><?php echo $loan['due']?></td>
                        <td><?php echo $loan['due_date']?></td>
                        <td>
                            <?php  if ($loan['status'] == '0'):?>
                                <span class="badge badge-warning">Yet to be approved</span>
                            <?php  elseif ($loan['status'] == '1'):?>
                                <span class="badge badge-warning">Approved</span>
                            <?php  elseif ($loan['status'] == '2'):?>
                                <span class="badge badge-warning">Dissaproved</span>
                            <?php  elseif ($loan['status'] == '3'):?>
                                <span class="badge badge-warning">Disbursed</span>

                            <?php  elseif ($loan['status'] == '4'):?>
                                <span class="badge badge-warning">Closed</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date('d M Y h:i:sa', strtotime($loan['created_at']))?></td>
                        <td><a href="view_loan.php?id=<?php echo $loan['id']?>" class="btn btn-primary btn-sm"> View </a></td>
                    </tr>
                <?php $counter++ ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ("layout/footer.php");?>
</div>


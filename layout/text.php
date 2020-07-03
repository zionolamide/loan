<div id="guarantor" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times;</span>
  <div class="b3">
  <h3>Guarantor Of Loan</h3>
  
  </div>
  <div>
      <?php 
    $conn = new mysqli('localhost', 'root', '', 'myloan') or die(conn_error($conn));
	$result = $conn->query("SELECT * FROM g_loan")or die($conn->error);
    //pre_r$result);
   ?>
   <div class="row justify-content-center" >
     <table class="table" >
	   <thead>
		  <tr >
		    <th>Guarantor's Id</th>
			<th>Guarantor's Fullname</th>
			<th>Guarantor's Phone Numeber</th>
			<th >Guarantor's Email</th>
			<th >Guarantor's address</th>
			<th >Guarantor's gender</th>
		  </tr>
	   </thead>
	   <?php while ($row = $result->fetch_assoc()): ?>
	   <tr >
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

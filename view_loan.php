<?php include ("layout/header.php");?>
<?php include ("css/profile.css");?>
<?php
	if (!isset($_SESSION['user']) && !isset($_SESSION['user']['email'])){
        header("location:login.php");
    }
?>


<?php

if(isset($_POST['guarantor_submit'])){
    $g_fullname =$_POST['g_fullname'];
    $g_phone_number = $_POST['g_phone_number'];
    $g_email = $_POST['g_email'];
    $g_address = $_POST['g_address'];
    $g_gender = $_POST['g_gender'];
    $loanId = $_POST['loan_id'];
    $userId = $_POST['user_id'];


    $message_error = "";
    $message_success = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ( empty($_POST["g_fullname"]) || empty($_POST["g_phone_number"]) || empty($_POST["g_email"]) || empty($_POST["g_address"]) || empty($_POST["g_gender"]) ) {
            $message_error= "please fill the form correctly ";

        } else {
            $sql ="INSERT INTO guarantors (`fullname`, `phone_number`,`email`,`address`,`gender`, `user_id`, `loan_id`  ) VALUES ('$g_fullname','$g_phone_number','$g_email', '$g_address','$g_gender', '$userId', '$loanId')";
            $queryresult = $conn->query($sql);
            if ($queryresult){
                $message_success = "we will get back to you";
            }
        }
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <?php
            $user = $_SESSION['user'];
            $loanId = $_GET['id'];
            if (!$loanId) header("location:profile.php?error=Unkown error occurred");
            $prepare_sql_statement = "SELECT * FROM loans WHERE id ='{$loanId}' AND user_id='{$user['id']}'";
            $checkLoanQuery = $conn->query($prepare_sql_statement);
            if ($checkLoanQuery->num_rows < 1) header("location:profile.php?error=Loan not found");
            $loan = $checkLoanQuery->fetch_assoc();
            ?>
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th>Amount</th>
                    <th>Interest rate (%) per month</th>
                    <th>Due </th>
                    <th>Due date</th>
                    <th>status</th>
                    <th>created at</th>
                </tr>
                </thead>
                <tbody>
                <tr>
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
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">

            <form class="form-horizontal" method="post" action="" id="apply">
                <?php if (isset($message_error) &&  isset($message_error) && $message_error) { ?>
                    <div class='alert alert-danger'> <?php echo $message_error; ?></div>
                <?php } ?>
                <?php if (isset($message_success) &&  isset($message_error) && !$message_error) { ?>
                    <div class='alert alert-success'> <?php echo $message_success; ?></div>
                <?php } ?>
                <h3 style="margin-left:270px;">Garrantor's field</h3><hr style=" width:350px; margin-left:190px;">
                <!--fullname row-->
                <div class="form-group">
                    <label class="control-label col-sm-4" for="g_fullname"> Fullname:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="g_fullname" name="g_fullname" placeholder="enter fullname" >

                    </div>
                </div>
                <!--phonenumber row-->
                <div class="form-group">
                    <label class="control-label col-sm-4" for="g_phone_number"> Phone number:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="g_phone_number" name="g_phone_number" placeholder="enter phone number" >

                    </div>
                </div>
                <!--email row-->
                <div class="form-group">
                    <label class="control-label col-sm-4" for="g_email">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="g_email" name="g_email" placeholder="enter email" >

                    </div>
                </div>
                <!--address row-->
                <div class="form-group">
                    <label class="control-label col-sm-4" for="g_address">Address:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="g_address" name="g_address" placeholder="enter address" >

                    </div>
                </div>
                <!--gender row-->
                <div class="form-group">
                    <label  class="control-label col-sm-4" for="g_gender">Gender:</label>
                    <div class="col-sm-6" >

                        <select name="g_gender" title="g_Gender" id="g_gender" class="form-control" >
                            <option value="male" class="form-control"> Male </option>
                            <option value="female" class="form-control"> Female </option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="loan_id" value="<?php echo $loanId ?>">
                <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                <!--submt row-->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-1">
                        <button type="submit"  name="guarantor_submit" style="margin-left:100px;  border:3px solid black; border-radius:7px; background-color:black; color:white; padding:10px 25px 10px 25px;" >proceed</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("layout/footer.php");?>
</div>


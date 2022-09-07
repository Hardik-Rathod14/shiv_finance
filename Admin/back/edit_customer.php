<?php

session_start();
$branch = base64_decode($_SESSION['branch']);
// echo $branch;
$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);
// echo $new_loan;
$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);

include("../../db/connect.php");
if (isset($_POST['cstid'])  || isset($_POST['cname'])  || isset($_POST['contact_no'])  || isset($_POST['amount'])) {
      $cstid = mysqli_real_escape_string($con, $_POST['cstid']);
      $cstid = htmlspecialchars($cstid);
      $cmd = "select * from $new_loan  where cid='$cstid' ";
      $result = mysqli_query($con, $cmd) or die(mysqli_error($con));
      while ($row = mysqli_fetch_array($result)) {

            $loan_duration = $row['loan_duration'];
      }
      // echo "$loan_duration";
      $cname = mysqli_real_escape_string($con, $_POST['cname']);
      $cname = htmlspecialchars($cname);
      $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
      $contact_no = htmlspecialchars($contact_no);
      $amount = mysqli_real_escape_string($con, $_POST['amount']);
      $amount = htmlspecialchars($amount);
      // $duration = mysqli_real_escape_string($con, $_POST['duration']);
      // $duration = htmlspecialchars($duration);
      // echo $cname;
      if (!empty($_POST['loantype']) ) {
            $loantype = mysqli_real_escape_string($con, $_POST['loantype']);
            $loantype = htmlspecialchars($loantype);
            // echo "loantype";
            $sel = "update $new_loan set customer_name='$cname',contact_no='$contact_no',loan_type='$loantype',loan_amount='$amount' where cid='$cstid'";
            // echo $sel;
            $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
            if ($sql) {
?>
                  <script>
                        alert('Customer Edit Sucessfully...!');
                        //  window.location = './edit_user.php';
                  </script>
            <?php
            } else {
            ?>
                  <script>
                        alert('Failed...!');
                        //  window.location = './edit_user.php';
                  </script>
            <?php

            }
      } else if (empty($_POST['loantype']) ) {
            $sel = "update $new_loan set customer_name='$cname',contact_no='$contact_no',loan_amount='$amount' where cid='$cstid'";
            // echo $sel;
            $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
            if ($sql) {
            ?>
                  <script>
                        alert('Customer Edit Sucessfully...!');
                        //  window.location = './edit_user.php';
                  </script>
            <?php
            } else {
            ?>
                  <script>
                        alert('Failed...!');
                        //  window.location = './edit_user.php';
                  </script>
            <?php

            }
      
      }
} else {
      ?>
      <script>
            alert('Somthing Went Wrong...!');
            window.location = './dashboard.php';
      </script>
<?php


}

$con->close();
?>
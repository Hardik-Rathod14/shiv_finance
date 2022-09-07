<?php
session_start();
include("../../db/connect.php");

$branch = base64_decode($_SESSION['branch']);

$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);

$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);

date_default_timezone_set("Asia/Kolkata");

$date = date("Y-m-d-h_i_s");

// echo $date;
// echo $cstid;





if (isset($_POST['cid'])) {
     // $cstid = base64_decode($_SESSION['cstid']);

     $cid = mysqli_real_escape_string($con, $_POST['cid']);

     $cid = htmlspecialchars($cid);


     echo $cid;
     







     $cmd5 = "select * from $new_loan where cid='$cid'";
     // echo $cmd5;
     $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

     while ($row = mysqli_fetch_array($result5)) {

          // $id = $row['id'];
          $c_status = $row['complete_status'];

          $customer_name = $row['customer_name'];

          $contact_no = $row['contact_no'];

          $loan_type = $row['loan_type'];

          $amount = $row['loan_amount'];

          $emi = $row['emi'];

          $start_date = $row['start_date'];

          $end_date = $row['end_date'];

          $loan_duration = $row['loan_duration'];

          $paid = $row['paid'];
     }
     // echo $c_status;

     // $newc_status = $c_status + 1;
     // echo $newc_status;




     $sel1 = "update $new_loan set loan_status = 'Completed' where cid='$cid'";

     $sql1 = mysqli_query($con, $sel1) or die(mysqli_error($con));



     // $sel = "update pay_emi set paid='1', date='$date' where id='$id'";

     // $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
     // // echo $sel;
     if ($sql1) {

?>

          <script>
               alert('Loan Closed Successfully...!');
               window.location = './loan_status.php';
          </script>

     <?php



     } else { ?>

          <script>
               alert('Loan Close Failed...!');
               window.location = './../editCtmr.php';
          </script>

     <?php

     }
} else {

     ?>

     <script>
          alert('Something Went Wrong...!');
          window.location = './../editCtmr.php';

     </script>

<?php

}



$con->close();

?>
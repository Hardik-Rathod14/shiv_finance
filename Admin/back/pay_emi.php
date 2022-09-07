<?php
session_start();
include("../../db/connect.php");

$cstid = base64_decode($_SESSION['cstid']);
$branch = base64_decode($_SESSION['branch']);

$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);

$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);

date_default_timezone_set("Asia/Kolkata");

$date = date("Y-m-d-h_i_s");
if (isset($_POST['pay'])) {

      $cstid = mysqli_real_escape_string($con, $_POST['cstid']);
      $cstid = htmlspecialchars($cstid);
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $id = htmlspecialchars($id);
      $amount = mysqli_real_escape_string($con, $_POST['amount']);
      $amount = htmlspecialchars($amount);
      // echo $cstid;
      // echo $id;
      // echo $amount;


      include("../../db/connect.php");

      $cmd5 = "select * from $new_loan where cid='$cstid'";
      $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

      while ($row = mysqli_fetch_array($result5)) {

            // $id = $row['id'];
            $month_status = $row['month_status'];

            $customer_name = $row['customer_name'];

            $contact_no = $row['contact_no'];

            $loan_type = $row['loan_type'];

            // $paid_amount = $row['paid_amount'];

            // $pending_amount = $row['pending_amount'];
            $loan_amount = $row['loan_amount'];

            $emi = $row['emi'];

            $start_date = $row['start_date'];

            $end_date = $row['end_date'];

            $loan_duration = $row['loan_duration'];

            // $paid = $row['paid'];

      }
      $ptmp_amt =$paid_amount + $amount;
      $pending_amount = $loan_amount - $ptmp_amt;



      $newm_status = $month_status + 1;




      $sel1 = "update $new_loan set month_status = '$newm_status' where cid='$cstid'";

      $sql1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

      $sel = "update $pay_emi set paid='1',amount='$amount',date='$date' where cid='$cstid' and id='$id'";
      // echo $sel;
      // echo $amount;
      $sql = mysqli_query($con, $sel) or die(mysqli_error($con));

      if ($sql && $sql1) {


?>

            <script>
                  alert('EMI Paid Successfully...!');
                  window.location.href = "../editCtmr.php?cstid=<?php echo $cstid; ?>";
            </script>

      <?php



      } else {
      ?>

            <script>
                  alert('EMI Paid Failed...!');
            </script>

      <?php


      }
} else {
      ?>
      <script>
            alert('Something Went Wrong...!');
      </script>
<?php
}
$con->close();
?>
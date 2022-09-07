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
if (isset($_POST['id'])) {


      $id = mysqli_real_escape_string($con, $_POST['id']);
      $id = htmlspecialchars($id);
      echo $id;
      include("../../db/connect.php");

      $cmd5 = "select * from $pay_emi where id='$id'";
      $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

      while ($row = mysqli_fetch_array($result5)) {

            $emi = $row['emi'];
            $cstid = $row['cid'];
      }

      $cmd = "select * from $new_loan where cid='$cstid'";
      $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

      while ($row = mysqli_fetch_array($result)) {

            $month_status = $row['month_status'];
      }

      $newmonth_status =$month_status - 1;

      $sel2 = "update $new_loan set month_status = '$newmonth_status' where cid='$cstid'";

      $sql = mysqli_query($con, $sel2) or die(mysqli_error($con));

      $sel = "update $pay_emi set paid='0',amount='$emi',date='0' where cid='$cstid' and id='$id'";
      $sql1 = mysqli_query($con, $sel) or die(mysqli_error($con));

      // echo $sel;
      // echo $amount;
      $sql = mysqli_query($con, $sel) or die(mysqli_error($con));

      if ($sql && $sql1) {


?>

            <script>
                  alert('EMI Unpaid Successfully...!');
                  window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
                 

            </script>

      <?php



      } else {
      ?>

            <script>
                  alert('EMI Unpaid Failed...!');
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
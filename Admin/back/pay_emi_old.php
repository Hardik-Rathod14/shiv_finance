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
if (isset($_POST['proceed'])) {

      $cstid = mysqli_real_escape_string($con, $_POST['cid']);

      $cstid = htmlspecialchars($cstid);
      $amount = mysqli_real_escape_string($con, $_POST['amount']);
      $amount = htmlspecialchars($amount);
      // echo $cstid;
      // echo $amount;
      include("../../db/connect.php");
      $cmd1 = "select * from $pay_emi where paid='1' and cid='$cstid' ";
      $result1 = mysqli_query($con, $cmd1) or die(mysqli_error($con));
      if (mysqli_fetch_row($result1) > 1) {
            // echo "paid1 here";
            include("../../db/connect.php");

            $cmd = "select * from $pay_emi where cid='$cstid' ORDER BY month DESC LIMIT 1";
            $result = mysqli_query($con, $cmd) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)) {
                  $pmonth = $row['month'];
            }
            // echo $pmonth;

            // $cmd1 = "SELECT * FROM $pay_emi WHERE paid=(SELECT max(paid) FROM $pay_emi)";
            $cmd="SELECT paid FROM $pay_emi
ORDER BY paid DESC
LIMIT 1;";
            $result1 = mysqli_query($con, $cmd1) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result1)) {
                  $month = $row['month'];
            }
            // echo $month;
            if ($pmonth != $month) {
                  // echo $month;
                //   echo "middle here";
                  $newmnth = $month + 1;
                //   echo $newmnth;
                  include("../../db/connect.php");
                  $cmd5 = "select * from $new_loan where cid='$cstid'";
                  $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

                  while ($row = mysqli_fetch_array($result5)) {

                        // $id = $row['id'];
                        $month_status = $row['month_status'];

                        $customer_name = $row['customer_name'];

                        $contact_no = $row['contact_no'];

                        $loan_type = $row['loan_type'];

                        // $amount = $row['loan_amount'];

                        $emi = $row['emi'];

                        $start_date = $row['start_date'];

                        $end_date = $row['end_date'];

                        $loan_duration = $row['loan_duration'];

                        // $paid = $row['paid'];

                  }
                  // echo $c_status;

                  $newm_status = $month_status + 1;
                  // echo $newm_status;




                  $sel1 = "update $new_loan set month_status = '$newm_status' where cid='$cstid'";

                  $sql1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

                  // if ($sql1) {
                  //     echo "sucessfully";
                  // } else {
                  //     echo "failed";
                  // }



                  $sel = "update $pay_emi set paid='1',amount='$amount',date='$date' where cid='$cstid' and month='$newmnth'";
                  // echo $sel;
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
                  // echo "last here";

                  $newmnth = $month;

                  include("../../db/connect.php");


                  $cmd5 = "select * from $new_loan where cid='$cstid'";
                  // echo $cmd5;
                  $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

                  while ($row = mysqli_fetch_array($result5)) {

                        // $id = $row['id'];
                        $month_status = $row['month_status'];

                        $customer_name = $row['customer_name'];

                        $contact_no = $row['contact_no'];

                        $loan_type = $row['loan_type'];

                        // $amount = $row['loan_amount'];

                        $emi = $row['emi'];

                        $start_date = $row['start_date'];

                        $end_date = $row['end_date'];

                        $loan_duration = $row['loan_duration'];

                        // $paid = $row['paid'];

                  }
                  // echo $c_status;

                  $newm_status = $month_status + 1;
                  // echo $newm_status;




                  $sel1 = "update $new_loan set month_status = '$newm_status' where cid='$cstid'";

                  $sql1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

                  // if ($sql1) {
                  //     echo "sucessfully";
                  // } else {
                  //     echo "failed";
                  // }



                  $sel = "update $pay_emi set paid='1',amount='$amount',date='$date' where cid='$cstid' and month='$newmnth'";
                  // echo $sel;
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
            }
      } else {
            // echo "paid1 not here";
            include("../../db/connect.php");


            $cmd5 = "select * from $new_loan where cid='$cstid'";
            // echo $cmd5;
            $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

            while ($row = mysqli_fetch_array($result5)) {

                  // $id = $row['id'];
                  $month_status = $row['month_status'];

                  $customer_name = $row['customer_name'];

                  $contact_no = $row['contact_no'];

                  $loan_type = $row['loan_type'];

                  // $amount = $row['loan_amount'];

                  $emi = $row['emi'];

                  $start_date = $row['start_date'];

                  $end_date = $row['end_date'];

                  $loan_duration = $row['loan_duration'];

                  // $paid = $row['paid'];

            }
            // echo $c_status;

            $newm_status = $month_status + 1;
            // echo $newm_status;

            $sel1 = "update $new_loan set month_status = '$newm_status' where cid='$cstid'";

            $sql1 = mysqli_query($con, $sel1) or die(mysqli_error($con));

            // if ($sql1) {
            //     echo "sucessfully";
            // } else {
            //     echo "failed";
            // }

            



            $sel = "update $pay_emi set paid='1',amount='$amount',date='$date' where cid='$cstid' and month='1'";
            // echo $sel;
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
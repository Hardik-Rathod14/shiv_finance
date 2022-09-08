<?php
session_start();
$branch = base64_decode($_SESSION['branch']);
$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);
$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);

include("../../db/connect.php");
if (isset($_POST['cstid'])  || isset($_POST['cname'])  || isset($_POST['contact_no'])  || isset($_POST['amount']) ) {
      $cstid = mysqli_real_escape_string($con, $_POST['cstid']);
      $cstid = htmlspecialchars($cstid);
      $cname = mysqli_real_escape_string($con, $_POST['cname']);
      $cname = htmlspecialchars($cname);
      $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
      $contact_no = htmlspecialchars($contact_no);
      $amount = mysqli_real_escape_string($con, $_POST['amount']);
      $amount = htmlspecialchars($amount);
      if (isset($_POST['duration'])) {

      
      $duration = mysqli_real_escape_string($con, $_POST['duration']);
      $duration = htmlspecialchars($duration);


      $cmd = "select * from $new_loan  where cid='$cstid' ";
      $result = mysqli_query($con, $cmd) or die(mysqli_error($con));
      while ($row = mysqli_fetch_array($result)) {

            $id = $row['id'];
            $contact_no = $row['contact_no'];
            $loan_type = $row['loan_type'];
            $ploan_duration = $row['loan_duration'];
            $emi = $row['emi'];
            $month_status = $row['month_status'];
      }
      if ($ploan_duration != $duration) {


            $extendloanDuration = $duration - $ploan_duration;
           
            $sel = "update $new_loan set customer_name='$cname',contact_no='$contact_no',loan_amount='$amount',loan_duration='$duration' where cid='$cstid'";
            $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
           

            for ($i = 1; $i <= $extendloanDuration; $i++) {

                  $sel1 = "INSERT INTO $pay_emi (`id`, `cid`, `customer_name`, `contact_no`,
                              `loan_type`, `loan_amount`, `loan_duration`, `emi`,`amount`,`month`, `date`,`paid`)
                               VALUES (NULL,'$cstid', '$cname', '$contact_no', '$loan_type', 
                               '$amount','$duration','$emi','$emi', '$i','0', '0')";
                  // echo $sel1;
                  $sql2 = mysqli_query($con, $sel1) or die(mysqli_error($con));
            }

            if ($sql && $sql2) {

      ?>
                  <script>
                        alert('Customer Edit Sucessfully...!');
                        window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
                  </script>
            <?php
            } else {

            ?>
                  <script>
                        alert('Failed...!');
                        window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
                  </script>
            <?php

            }
      } else if($ploan_duration == $duration){
            include("../../db/connect.php");
            $sel = "update $new_loan set customer_name='$cname',contact_no='$contact_no',loan_amount='$amount',loan_duration='$ploan_duration' where cid='$cstid' ";
            $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
            if ($sql) {
            ?>
                  <script>
                        alert('Customer Edit Sucessfully...!');
                        window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
                  </script>
            <?php
            } else {
            ?>
                  <script>
                        alert('Failed...!');
                        window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
                  </script>
      <?php

            }
      }
} else {
      include("../../db/connect.php");
      $sel = "update $new_loan set customer_name='$cname',contact_no='$contact_no',loan_amount='$amount' where cid='$cstid' ";
      $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
      if ($sql) {
      ?>
            <script>
                  alert('Customer Edit Sucessfully...!');
                  window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
            </script>
      <?php
      } else {
      ?>
            <script>
                  alert('Failed...!');
                  window.location.href = "./editCtmr.php?cstid=<?php echo $cstid; ?>";
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
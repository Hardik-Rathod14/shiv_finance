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

if (isset($_POST['id'])) {
     $id = mysqli_real_escape_string($con, $_POST['id']);
     $id = htmlspecialchars($id);

     $cmd5 = "select * from $new_loan where id='$id'";
      $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));

      while ($row = mysqli_fetch_array($result5)) {

            $emi = $row['emi'];
            $cstid = $row['cid'];
      }

     $data = "delete from $new_loan where id='$id'";
     $result = mysqli_query($con, $data) or die(mysqli_error($con)); 

      $query = "delete from $pay_emi where cid='$cstid'";
     $sql = mysqli_query($con, $query) or die(mysqli_error($con));

     if ($result && $sql) {
?>
          <script>
                alert('Customer Deleted...!');
          </script>
     <?php
     } else {
     ?>
          <script>
              alert('Customer Deleted Failed...!');
          </script>
     <?php
     }
} else {
     ?>
     <script>
          alert('Somthing Went Wrong...!');
     </script>
<?php
}

$con->close();
?>
<?php

include("../../db/connect.php");

if (isset($_POST['id'])) {
     $id = mysqli_real_escape_string($con, $_POST['id']);
     $id = htmlspecialchars($id);



     $data = "delete from inquirydata where id='$id'";
     $result = mysqli_query($con, $data) or die(mysqli_error($con));
     if ($result) {

?>
          <script>
               alert('Record Deleted...!');
          </script>
     <?php
     } else {
     ?>
          <script>
               alert('Failed...!');
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
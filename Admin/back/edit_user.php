<?php
include("../../db/connect.php");

if (isset($_POST['id'])  || isset($_POST['uname'])  || isset($_POST['contact_no']) || isset($_POST['pass'])  || isset($_POST['branch'])) {
  $uname = mysqli_real_escape_string($con, $_POST['uname']);
  $uname = htmlspecialchars($uname);
  $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
  $contact_no = htmlspecialchars($contact_no);
  $branch = mysqli_real_escape_string($con, $_POST['branch']);
  $branch = htmlspecialchars($branch);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);
  $pass = htmlspecialchars($pass);

  $id = mysqli_real_escape_string($con, $_POST['id']);
  $id = htmlspecialchars($id);

  echo $id;

  $sel = "update userData set uname='$uname',contact_no='$contact_no' , branch='$branch',pass='$pass' where id='$id'";
  $sql = mysqli_query($con, $sel) or die(mysqli_error($con));
  if ($sql) {
?>
    <script>
      alert('User Edit Sucessfully...!');
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
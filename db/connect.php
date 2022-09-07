

<?php
$con = mysqli_connect("localhost", "root", "", "shiv_fianance") or die("ERROR IN CONNECTION");
// $con = mysqli_connect("localhost", "vdrd6cusg1by" , "ShivFinance@@01" , "shivfinance");

date_default_timezone_set("Asia/Kolkata");
$query_date = date("Y-m-d h:i:s");
?>
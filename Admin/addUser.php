<?php

include('con/connection.php');

// $branch = "palitana";
// $uname = "dharmik";
// $pass = "123";
if (isset($_POST['submit'])) {
$branch = $_POST['b_name'];
$uname = $_POST['u_name'];
$pass = $_POST['pass'];
$contact_no = $_POST['contact_no'];

$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);

$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);


$qry = "insert into userData(branch , uname ,contact_no, pass) value('$branch','$uname','$contact_no','$pass')";
$res = mysqli_query($conn, $qry);

if ($res) {

    $create = "CREATE TABLE IF NOT EXISTS $new_loan  (
        id int(11) AUTO_INCREMENT,
        cid varchar(255) NOT NULL,
        customer_name varchar(55) NOT NULL,
        contact_no bigint(13) NOT NULL,
        loan_type varchar(55) NOT NULL,
        loan_amount int(55) NOT NULL,
        loan_duration int(55) NOT NULL,
        emi int(55) NOT NULL,
        start_date varchar(55) NOT NULL,
    end_date varchar(55) NOT NULL,
        loan_status varchar(55) NOT NULL,
        month_status int(55) NOT NULL,
        PRIMARY KEY  (ID)
        )";

    $sql = mysqli_query($conn, $create) or die(mysqli_error($conn));


    $create1 = "CREATE TABLE IF NOT EXISTS $pay_emi  (
        id int(11) AUTO_INCREMENT,
        cid varchar(255) NOT NULL,
        customer_name varchar(55) NOT NULL,
        contact_no bigint(13) NOT NULL,
        loan_type varchar(55) NOT NULL,
        loan_amount int(55) NOT NULL,
        loan_duration int(55) NOT NULL,
        emi int(55) NOT NULL,
        amount int(55) NOT NULL,
        month int(55) NOT NULL,
        date varchar(55) NOT NULL,
        paid int(55) NOT NULL,
        PRIMARY KEY  (ID)
        )";
    $sql1 = mysqli_query($conn, $create1) or die(mysqli_error($conn));

    if ($sql && $sql1) {
        // echo "Created successfully";
?>
        <script>
            alert('User Added successfully...');
            window.location = './add_user.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Failed to create table...!');
            // echo "Failed to create table";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert('Somthing went wrong!...');
        window.location = './add_user.php';
    </script>
<?php
}
} else {
    ?>
    <script>
        alert('Page Not Found...!');
        window.location = './add_user.php';
    </script>
<?php
}







?>
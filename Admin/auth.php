<?php
session_start();
include('../db/connect.php');

if (isset($_POST['send']) ) {

    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $branch = htmlspecialchars($branch);
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $username = htmlspecialchars($username);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $password = htmlspecialchars($password);
    // $branch = $_POST['branch'];
    // $username = $_POST['user'];
    // $password = $_POST['pass'];

    // $username = 'dharmik.g';
    // $password = '123456';

    //to prevent from mysqli injection  
    // $username = mysqli_real_escape_string($con, $username);
    // $username = stripcslashes($username);
    // $password = mysqli_real_escape_string($con, $password);
    // $password = stripcslashes($password);
    // $password = mysqli_real_escape_string($con, $branch);
    // $password = stripcslashes($password);

    $sql = "select * from userData where uname = '$username' and pass = '$password' and branch = '$branch'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['branch'] = base64_encode($branch);
        // echo  $_SESSION['branch'] ;
        $_SESSION['username'] = base64_encode($username);
        $_SESSION['password'] = base64_encode($password);

        ?>
    <script>
       
        window.location = './dashboard.php';
    </script>
<?php
        // header("Location: dashboard.php");
    } else {
        echo '<script type="text/JavaScript"> 
            alert("Wrong Credential , If you forgot your username password please contact your admin");
            history.go(-1)
            </script>';
    }
} else {
?>
    <script>
        alert('Somthing Went Wrong...!');
        window.location = './../login.php';
    </script>
<?php
}

$con->close();
?>
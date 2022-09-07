<?php
session_start();
$branch = base64_decode($_SESSION['branch']);
$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);
$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);
$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);
if (isset($_SESSION['branch']) && $_SESSION['username'] && $_SESSION['password']) {

      // if($branch !=''  $username !='' and $password !=''){

?>
      <?php
      include_once("./../db/connect.php");
      $cmd1 = "select * from $new_loan where loan_type='Home Loan'";
      $result1 = mysqli_query($con, $cmd1) or die(mysqli_error($con));
      $homeloan = mysqli_num_rows($result1);

      $cmd2 = "select * from $new_loan where loan_type='Car Loan'";
      $result2 = mysqli_query($con, $cmd2) or die(mysqli_error($con));
      $carloan = mysqli_num_rows($result2);

      $cmd3 = "select * from $new_loan where loan_type='Mortgage Loan'";
      $result3 = mysqli_query($con, $cmd3) or die(mysqli_error($con));
      $mortgageloan = mysqli_num_rows($result3);

      $cmd4 = "select * from $new_loan where loan_type='BT-Top up Loan'";
      $result4 = mysqli_query($con, $cmd4) or die(mysqli_error($con));
      $topuploan = mysqli_num_rows($result4);

      $cmd5 = "select * from $new_loan where loan_type='Personal Loan'";
      $result5 = mysqli_query($con, $cmd5) or die(mysqli_error($con));
      $personalloan = mysqli_num_rows($result5);

      $cmd6 = "select * from $new_loan where loan_type='Micro Loan'";
      $result6 = mysqli_query($con, $cmd6) or die(mysqli_error($con));
      $microloan = mysqli_num_rows($result6);
      // echo $homeloan;
      ?>
      <!DOCTYPE html>

      <html lang="en">



      <head>

            <meta charset="UTF-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Dashboard</title>
            
            <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

            <link rel="stylesheet" href="./dashboard.css">

            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



      </head>



      <body>

            <input type="checkbox" id="nav-toggle">

            <div class="sidebar">

                  <div class="sidebar-brand">

                        <img class="logo-img" src="../Images/shiv-finance logo.png" alt="align box" align="left">

                        <h2><span>Shiv Finance</span></h2>

                        <hr>

                  </div>






                  <div class="sidebar-menu">


                        <?php

                        if ($branch == "Bhavnagar") {
                        ?>
                              <ul>

                                    <li><a href="dashboard.php" class="active"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                                    <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                                    <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                                    <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                                    <li><a href="add_user.php"><span class="fa fa-user-plus"></span><span>Add-user</span></a></li>

                                    <li><a href="inquirey.php"><span class="fa fa-comments"></span><span>Customer Inquiry</span></a></li>
                                    <li><a href="becomepartner.php"><span class="fa fa-handshake-o"></span><span>Become Partner</span></a></li>
                                    <!-- <li><a href="becomepartner.php"><span class="far fa-handshake"></span><span>Become Partner</span></a></li> -->

                              </ul>
                        <?php
                        } else {
                        ?>
                              <ul>

                                    <li><a href="dashboard.php" class="active"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                                    <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                                    <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                                    <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                                    <!-- <li><a href="add_user.php"><span class="fa fa-user-plus"></span><span>Add-user</span></a></li> -->

                                    <!-- <li><a href="inquirey.php"><span class="fa fa-user-plus"></span><span>Customer Inquirey</span></a></li>
                        <li><a href="becomepartner.php"><span class="fa fa-user-plus"></span><span>Become Partner</span></a></li> -->

                              </ul>

                        <?php
                        }
                        ?>

                  </div>










            </div>

            <div class="main-content">

                  <header>



                        <h2>

                              <label for="nav-toggle">

                                    <span class="fa fa-align-justify"></span>

                              </label>

                              Dashboard

                        </h2>



                        <div class="user-wrapper">

                              <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                              <div>

                                    <h4><?php echo base64_decode($_SESSION['username']) ?></h4>

                                    <?php if ($branch == 'Bhavnagar') {

                                    ?>

                                          <?php if ($branch == 'Bhavnagar') {

                                          ?>

                                                <small>Finance Owner</small>

                                          <?php

                                          }
                                          ?>

                                    <?php

                                    }
                                    ?>

                              </div>

                              <div id="data-title" class="visible">

                                    <a href="./back/function/logout.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>

                              </div>

                        </div>

                  </header>



                  <main>

                        <div class="cards">

                              <a href="home_loan.php" class="card-single1">

                                    <div>

                                          <h1><?php echo $homeloan;?></h1>

                                          <span>Home Loan</span>

                                    </div>

                              </a>





                              <a href="car_loan.php" class="card-single2">

                                    <div>

                                    <h1><?php echo $carloan;?></h1>

                                          <span>Car Loan</span>

                                    </div>



                              </a>

                              <a href="mortgage_loan.php" class="card-single3">

                                    <div>

                                    <h1><?php echo $mortgageloan;?></h1>

                                          <span>Mortgage Loan</span>

                                    </div>

                              </a>

                              <a href="top-up_loan.php" class="card-single4">

                                    <div>

                                    <h1><?php echo $topuploan;?></h1>

                                          <span>BT-Top up Loan</span>

                                    </div>

                              </a>

                              <a href="personal_loan.php" class="card-single5">

                                    <div>

                                    <h1><?php echo $personalloan;?></h1>

                                          <span>Personal Loan</span>

                                    </div>

                              </a>

                              <a href="micro_loan.php" class="card-single6">

                                    <div>

                                    <h1><?php echo $microloan;?></h1>

                                          <span>Micro Loan</span>

                                    </div>

                              </a>





                        </div>

                  </main>

            </div>


            <!-- script -->

            <!-- custom javascript  -->

            <script src="./js/check_session.js"></script>




      </body>



      </html>



<?php
} else {
      echo header('Location: ../login.php');
}
?>
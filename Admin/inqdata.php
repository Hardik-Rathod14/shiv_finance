<?php 
session_start();
$branch = base64_decode($_SESSION['branch']);
$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);
if(isset($_SESSION['branch']) && $_SESSION['username']&& $_SESSION['password']){

// if($branch !=''  $username !='' and $password !=''){




?>

<!DOCTYPE html>

<html lang="en">



<head>

     <meta charset="UTF-8">

     <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Enquiry</title>
     
     <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

     <link rel="stylesheet" href="dashboard.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>







<body>

     <?php



     if (isset($_POST['view'])) {

          include_once("./../db/connect.php");

          $id = mysqli_real_escape_string($con, $_POST['id']);
          $id = htmlspecialchars($id);

          $cmd = "select * from inquirey_data  where id='$id' ";

          $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

          while ($row = mysqli_fetch_array($result)) {

               $id = $row['id'];
                   

               $name = $row['name'];

               $contact_no = $row['contact_no'];

               $email = $row['email'];
              

               $service = $row['service'];
               $servicetype = $row['servicetype'];

               $loan_amount = $row['loan_amount'];

               $r_name = $row['r_name'];
               $d_name = $row['d_name'];

               $status = $row['status'];

          }




     ?>



          <!-- sidebar -->



          <?php

          //   include_once("./sidebar.php");

          ?>

          <input type="checkbox" id="nav-toggle">

          <div class="sidebar">

               <div class="sidebar-brand">

                    <img class="logo-img" src="../Images/shiv-finance logo.png" alt="align box" align="left">

                    <h2><span>Shiv Finance</span></h2>

                    <hr>

               </div>



               <div class="sidebar-menu">

                    <ul>

                         <li><a href="dashboard.php"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                         <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                         <li><a href="report.php" class="active"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                         <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                         <li><a href="add_user.php"><span class="fa fa-user-plus"></span><span>Add-user</span></a></li>

                         <li><a href="inquirey.php"><span class="fa fa-comments"></span><span>Customer Inquiry</span></a></li>
                        <li><a href="becomepartner.php"><span class="fa fa-handshake-o"></span><span>Become Partner</span></a></li>

                    </ul>

               </div>

          </div>



          <!-- header -->



          <?php

          // include_once("./header.php");

          ?>

          <div class="main-content">

               <header>



                    <h2>

                         <label for="nav-toggle">

                              <span class="fa fa-align-justify"></span>

                         </label>

                        Customer Details

                    </h2>



                    <div class="user-wrapper">

                         <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                         <div>

                              <h4>Admin</h4>

                              <small>Finance Owner</small>

                         </div>

                         <div id="data-title" class="visible">

                              <a href="./back/function/logout.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>

                         </div>

                    </div>

               </header>

          </div>


          <br>
          <div class="position">
               <div class="container-breadcrumb">
                    <nav aria-label="Breadcrumb" class="breadcrumb">
                         <ol itemscope itemtype="https://schema.org/BreadcrumbList">
                              <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                   <a href="dashboard.php" itemprop="item">
                                        <span itemprop="name">Dashboard</span>
                                   </a>
                                   <meta itemprop="position" content="1" />
                              </li>
                              <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                   <a href="inquirey.php" itemprop="item">
                                        <span itemprop="name"> Customer Enquiry</span>
                                   </a>
                                   <meta itemprop="position" content="1" />
                              </li>
                              <li> Customer Details</li>
                         </ol>
                    </nav>
               </div>
          </div>
          <!-- <br> -->








          <form id="form" action="" class="form-details" method="post">

               <div class="container">

                    <div class="form-groups">

                         <div class="rows">

                              <div class="col">

                                   <label>Name :</label>

                                   <p><?php echo $name; ?></p>

                              </div><br>







                              <div class="col">

                                   <label>Contact No. :</label>

                                   <p><?php echo $contact_no; ?></p>

                              </div><br>

                              <div class="col">

                                   <label>Email Address :</label>

                                   <p><?php echo $email; ?></p>

                              </div><br>

                              <div class="col">

                                   <label>Service :</label>

                                   <p><?php echo $service; ?></p>

                              </div><br>

                              <div class="col">

                                   <label>Service Type :</label>

                                   <p><?php echo $servicetype; ?></p>

                              </div><br>



                              <div class="col">

                                   <label>Loan Amount :</label>
                                   <p><?php echo $loan_amount; ?></p>

                              </div><br>

                              <div class="col">
                                   <label>District Name :</label>
                                   <p><?php echo $d_name; ?></p>
                              </div><br>
                              <div class="col">
                                   <label>Referral Name :</label>
                                   <p><?php echo $r_name; ?></p>
                              </div>

                         </div>

                    </div>

               </div>

          </form>









</body>
<?php     
}
     else{

     }
     $con->close();

     ?>


</html>

<?php
}

else{
    echo header('Location: ../login.php');

}
?>
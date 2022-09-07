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

      <!DOCTYPE html>

      <html lang="en">



      <head>

            <meta charset="UTF-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Update Customer Details</title>

            <link rel="stylesheet" href="dashboard.css">
            
            <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



      </head>



      <body>

            <?php
            include_once("./../db/connect.php");

            // if (isset($_POST['edit_ctmr'])) {


                  $cstid = mysqli_real_escape_string($con, $_GET['cstid']);
                  $cstid = htmlspecialchars($cstid);
                  // echo $id;
                  $cmd = "select * from $new_loan  where cid='$cstid' ";

                  $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                  while ($row = mysqli_fetch_array($result)) {

                        $id = $row['id'];
                        $cid = $row['cid'];
                        $customer_name = $row['customer_name'];
                        $contact_no = $row['contact_no'];
                        $loan_type = $row['loan_type'];
                        $amount = $row['loan_amount'];
                        $emi = $row['emi'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];
                        $duration = $row['loan_duration'];
                        // $paid = $row['paid'];
                        // $date = $row['date'];
                        $month_status = $row['month_status'];
                        $loan_status = $row['loan_status'];
                  }

                  // echo $loan_duration;
                  // echo $emi;


            ?>


                  <!-- sidebar -->

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

                                    <li><a href="add_user.php"><span class="fa fa-user-plus"></span><span>Add User</span></a></li>
                                    <li><a href="inquirey.php"><span class="fa fa-comments"></span><span>Customer Inquiry</span></a></li>
                                    <li><a href="becomepartner.php"><span class="fa fa-handshake-o"></span><span>Become Partner</span></a></li>



                              </ul>

                        </div>

                  </div>



                  <!-- header -->

                  <div class="main-content">

                        <header>



                              <h2>

                                    <label for="nav-toggle">

                                          <span class="fa fa-align-justify"></span>

                                    </label>

                                    Update Customer Details

                              </h2>



                              <div class="user-wrapper">

                                    <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                                    <div>

                                          <h4><?php echo base64_decode($_SESSION['username']) ?></h4>

                                          <?php if ($branch == 'Bhavnagar') {

                                          ?>

                                                <small>Finance Owner</small>

                                          <?php

                                          }
                                          ?>
                                    </div>

                                    <div id="data-title" class="visible">

                                          <a href="./back/function/logout.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>

                                    </div>

                              </div>

                        </header>

                  </div>


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
                                                <a href="./add_customer.php" itemprop="item">
                                                      <span itemprop="name"> Add Customer </span>
                                                </a>
                                                <meta itemprop="position" content="1" />
                                          </li>
                                          <li> Update Customer Details</li>
                                    </ol>
                              </nav>
                        </div>
                  </div>


                  <h2 class="title">
                        <!-- Update User Details -->
                  </h2><br><br><br>
                  <div id="return"></div>

                  <form class="edituser" id="edit_ctmr" class="form-horizontal" method="post">
                        <div class="container">
                              <input type="hidden" name='cstid' id='cstid' value="<?php echo $cstid; ?>" />
                              <div class="form-group">

                                    <div class="row">

                                          <div class="col">

                                                <label>Customer Name :</label>

                                          </div>

                                          <div class="col">

                                                <input type="text" name="cname" id='cname' class="form-control" placeholder="Enter Customer Name" value="<?php echo $customer_name; ?> "><br><br>

                                          </div>



                                          <div class="col">

                                                <label>Contact no. :</label>

                                          </div>

                                          <div class="col">

                                                <input type="text" minlength="10" maxlength="10" name="contact_no" id='contact_no' class="form-control" placeholder="Enter Contact Number" value="<?php echo $contact_no; ?> "><br><br>

                                          </div>



                                          <div class="col">

                                                <label>Loan Type :</label>

                                                <div class="col">

                                                      <select name="loantype" id="loantype" required>

                                                            <option value="">Loan Type</selected disabled option>

                                                            <option value="Home Loan">Home Loan</option>

                                                            <option value="Personal Loan">Personal Loan</option>

                                                            <option value="Mortgage Loan">Mortgage Loan</option>

                                                            <option value="BT-Top up Loan">BT-Top-up Loan</option>

                                                            <option value="Micro Loan">Micro Loan</option>

                                                            <option value="Car Loan">Car Loan</option>

                                                      </select><br><br>

                                                </div>

                                          </div>


                                          <!-- <div id="EMI"></div> -->

                                          <!-- <div class="col">

</div> -->



                                          <div class="col">

                                                <label>Loan Amount :</label>

                                          </div>
                                          <div class="col">

                                                <input type="number" name="amount" id='amount' class="form-control" placeholder="Enter Loan Amount" value="<?php echo $amount; ?>"><br><br>

                                          </div>



                                          <!-- <div class="col">

    <label>EMI :</label>

</div>

<div class="col">

    <input type="number"  name="emi"  class="form-control" placeholder="Enter EMI" required><br><br>

</div> -->



                                          <!-- <div class="col">

                                                <label>Loan Start Date. :</label>

                                          </div>
                                          <div class="col">

                                                <input type="date" name="s_date" id='date' class="form-control" aria-describedby="helpId" placeholder="Starting Date of Loan" value="<?php echo $start_date; ?> "><br><br>

                                          </div> -->
                                          <!-- <div class="col">

                                                <label>Loan Duration :</label>

                                          </div>

                                          <div class="col">

                                                <input type="number" name="duration" id='duration' class="form-control" placeholder="Add total months" value="<?php echo $duration; ?>"><br><br>

                                          </div> -->









                                          <div class="col">

                                                <button type="submit" name="save" class="submit" id="save">SAVE</button>

                                          </div>

                                    </div>

                              </div>




                  </form>
                  <div id="return"></div>




                  <script src="./../assets/libs/jquery/dist/jquery.min.js"></script>

                  <script src="./../assets/extra-libs/DataTables/datatables.min.js"></script>

                  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

                  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>

                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

                  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

                  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

                  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

                  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

                  <script src="./../dist/js/pages/datatable/datatable-advanced.init.js"></script>

                  <!-- custom javascript  -->
                  <script src="./js/edit_user.js"></script>
                  <script src="./js/edit_customer.js"></script>

                  <!-- <script src="./js/fetchCtmrData.js"></script> -->

      </body>
<?php
            } else {
            }
            $con->close();

?>


      </html>

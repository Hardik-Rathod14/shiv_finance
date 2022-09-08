<?php
session_start();
include_once("./../db/connect.php");
$branch = base64_decode($_SESSION['branch']);

$new_loan = $branch . '_' . 'new_loan';
$new_loan = strtolower($new_loan);

$pay_emi = $branch . '_' . 'pay_emi';
$pay_emi = strtolower($pay_emi);

?>
<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report</title>
    <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

    <link rel="stylesheet" href="dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>







<body>

    <?php



    $cstid = mysqli_real_escape_string($con, $_GET['cstid']);
    $cstid = htmlspecialchars($cstid);

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
        $loan_duration = $row['loan_duration'];
        $month_status = $row['month_status'];
        $loan_status = $row['loan_status'];
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


            <?php

            if ($branch == "Bhavnagar") {
            ?>
                <ul>

                    <li><a href="dashboard.php"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                    <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                    <li><a href="report.php" class="active"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                    <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                    <li><a href="add_user.php"><span class="fa fa-user-plus"></span><span>Add-user</span></a></li>

                    <li><a href="inquirey.php"><span class="fa fa-comments"></span><span>Customer Inquiry</span></a></li>
                    <li><a href="becomepartner.php"><span class="fa fa-handshake-o"></span><span>Become Partner</span></a></li>
                </ul>
            <?php
            } else {
            ?>
                <ul>

                    <li><a href="dashboard.php"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                    <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                    <li><a href="report.php" class="active"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

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

                Statement of Loan

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
                    <li> Update EMI Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- <br> -->







    <!-- <div id="return"></div> -->

    <form id="form" class="form-details" method="post">
        <div class="container">

            <div class="form-groups">

                <div class="rows">

                    <div class="col">

                        <label>Customer Name :</label>

                        <p><?php echo $customer_name; ?></p>

                    </div><br>







                    <div class="col">

                        <label>Contact No. :</label>

                        <p><?php echo $contact_no; ?></p>

                    </div><br>
                    <div class="col">

                        <label>Loan Type :</label>

                        <p><?php echo $loan_type; ?></p>


                    </div><br>




                    <div class="col">

                        <label>Loan Start Date. :</label>

                        <p><?php echo $start_date; ?></p>

                    </div>
                    <!-- <br> -->
                    <br>
                    <div class="col">
                        <label>Loan Duration. :</label>
                        <p><?php echo $loan_duration; ?></p>
                    </div><br>

                    <div class="col">

                        <label>Loan Amount :</label>

                        <p><?php echo $amount; ?></p>

                    </div><br>


                    <?php

                    // echo $loan_status;

                    if ($emi == '0') {

                    ?>
                        <!-- <button type="submit" name='close' class="close" id="close">Close Loan</button> -->


                    <?php
                    } else if ($emi !== '0') {
                    ?>
                        <label>EMI :</label>
                        <p><?php echo $emi; ?></p>
                        <br>
                    <?php
                    }
                    ?>





                    <!-- <div class="col">

                            <label>Loan Close Date. :</label>
                            <p><?php echo $end_date; ?></p>

                        </div><br> -->


                    <input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>" />
                    <br>
                    <?php

                    // echo $loan_status;
                    if ($month_status == $loan_duration) {
                        if ($loan_status == 'Incomplete') {

                    ?>
                            <button type="submit" name='close' class="close" id="close">Close Loan</button>


                        <?php
                        } else if ($loan_status == 'Completed') {
                        ?>
                            <label>Loan Status :</label>
                            <p><?php echo $loan_status; ?></p>
                        <?php
                        }
                        ?>

                    <?php

                    }
                    ?>
                    <!-- <form class="edit" action="./edit_customer.php" method="post">
                        <input type="hidden" name="cstid" id="cstid" value="<?php echo $cid; ?>">

                        <button type="submit" name="edit_ctmr" id='edit_ctmr' class="edit">Edit</button>

                    </form> -->
                    <a href="./edit_customer.php?cstid=<?php echo $cid; ?>">
                        <input type="button" class="edit" value="Edit"  />
                    </a>


                </div>

            </div>

        </div>
    </form>


    <div id="return"></div>











    </form>

    <?php

    include_once("./../db/connect.php");





    ?>

    <div id="return"></div>



    <div class="responsive-table">



        <table id="file_export" class="table table-striped table-bordered display">



            <thead class="thead">

                <tr align="center">

                  
                    <th>Month</th>
                    <th>Loan Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>EMI Status</th>
                </tr>

            </thead>

            <tbody id="tbody" align="center">

                <?php

                $count = 0;

                $mnth = 0;

                $cmd1 = "select * from $pay_emi  where  cid='$cstid' ";
              
                $result1 = mysqli_query($con, $cmd1) or die(mysqli_error($con));

                while ($row = mysqli_fetch_array($result1)) {

                    $id = $row['id'];
                    $cid = $row['cid'];
                    $customer_name = $row['customer_name'];
                    $contact_no = $row['contact_no'];
                    $loan_type = $row['loan_type'];
                    $amt = $row['amount'];
                    $emi = $row['emi'];
                   
                    $loan_duration = $row['loan_duration'];
                    $paid = $row['paid'];
                    $date = $row['date'];






                ?>



                    <tr id="delete<?php echo $row['cid'] ?>">
                       



                        <td><?php echo $mnth = $mnth + 1; ?></td>

                        <td><?php echo $loan_type; ?></td>


                        <?php



                        if ($paid == '1') {

                        ?>
                            <td><?php echo $amt; ?></td>
                            <td><?php echo $date; ?></td>
                            <td>
                                <button onclick="resetEmi(<?php echo $row['id']; ?>)" class="paid" type="submit" name="id" id="id" style="background-color:#28a745;" >Paid</button>

                            </td>

                        <?php
                        } else {
                        ?>
                            <form action="./back/pay_emi.php" id="popup" method="post">

                                <td>

                                    <input id="emi" type="number" name="amount" value="<?php echo $emi; ?>">
                                </td>

                                <td><?php echo $date; ?></td>
                                <td>

                                    <input type="hidden" name="cstid" value="<?php echo $cid; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button class="paid" type="submit" name="pay" id="pay" style="background-color:#dc3545;">Pay</button>
                                </td>
                            </form>
                    <?php

                        }
                    }

                    ?>

                    </td>









                    </tr>



                    <?php






                    ?>





            </tbody>

        </table>

        <div id="output"></div>



    </div>

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

    <!-- <script src="./js/pay_emi.js"></script> -->
    <script src="./js/reset_emi.js"></script>
    <script src="./js/close_loan.js"></script>
    <script src="./js/check_session.js"></script>


</body>



</html>
<?php
session_start();

$branch = base64_decode($_SESSION['branch']);
$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);
if (isset($_SESSION['branch']) && $_SESSION['username'] && $_SESSION['password']) {

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



        <!-- sidebar -->







        <?php

        // include_once("./sidebar.php");

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
                        <li><a href="dashboard.php" class="active"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                        <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                        <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                        <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                        <li><a href="add_user.php"><span class="fa fa-user-plus"></span><span>Add-user</span></a></li>

                        <li><a href="inquirey.php"><span class="fa fa-comments"></span><span>Customer Inquiry</span></a></li>
                        <li><a href="becomepartner.php"><span class="fa fa-handshake-o"></span><span>Become Partner</span></a></li>
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

                    Statement and Report of Loan

                </h2>



                <div class="user-wrapper">

                    <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>

                    <div>

                        <h4><?php echo base64_decode($_SESSION['username']) ?></h4>

                         <?php if($branch == 'Bhavnagar'){

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
        <?php
        include_once("./../db/connect.php");
        ?>


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
                        <li> Micro Loan</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div id="return"></div>

        <div class="responsive-table">


            <table id="file_export" class="table table-striped table-bordered display">



                <thead class="thead">

                    <tr align="center">

                      

                        <th>Index</th>

                        <th>Name</th>

                        <th>Contact No.</th>

                        <th>Loan Type</th>

                        <th>Loan Amount</th>
                        
 <th>Edit</th>
                        <th>Action</th>

                        <th>Delete</th>

                    </tr>

                </thead>

                <tbody id="tbody" align="center">

                    <?php

                    $count = 0;

                    $cmd = "select * from $new_loan where loan_type='Micro Loan' ";

                    $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                    while ($row = mysqli_fetch_array($result)) {

                        $id = $row['id'];
                        $cstid = $row['cid'];

                        $customer_name = $row['customer_name'];

                        $contact_no = $row['contact_no'];

                        $loan_type = $row['loan_type'];

                        $amount = $row['loan_amount'];

                        $emi = $row['emi'];

                        $start_date = $row['start_date'];

                        $end_date = $row['end_date'];

                        $loan_duration = $row['loan_duration'];

                    ?>



                        <tr id="delete<?php echo $row['id'] ?>">

                           

                            <td><?php echo $count = $count + 1; ?></td>

                            <td><?php echo $customer_name; ?></td>

                            <td><?php echo $contact_no; ?></td>

                            <td><?php echo $loan_type; ?></td>

                            <td><?php echo $amount; ?></td>



 <td>
                                <form class="edit" action="./edit_customer.php" method="post">
                                    <input type="hidden" name="cstid" id="cstid" value="<?php echo $cstid; ?>">
                                    <center>
                                        <button type="submit" name="edit_ctmr" id='edit_ctmr' class="update">Edit</button>
                                    </center>
                                </form>
                            </td>



                            <td>

                                <form class="edit" action="editCtmr.php" method="get">

                                    <input type="hidden" name="contact_no" id="contact_no" value="<?php echo $row['contact_no']; ?>">
                                    <input type="hidden" name="cstid" id="cstid" value="<?php echo $row['cid']; ?>">

                                  

                                    <button  id="action" class="update">Action</button>

                                   

                                </form>

                            </td>

                            <td>



                                <div id="return"></div>

                                <center>

                                    <button type="button" class="delete" onclick="Removecustomer(<?php echo $row['id']; ?>)">Delete</button>

                                </center>

                            </td>

                        </tr>



                    <?php



                    }

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



        <script src="./js/remove_customer.js"></script>

        <script src="./js/check_session.js"></script>


    </body>



    </html>

<?php
} else {
    echo header('Location: ../login.php');
}
?>
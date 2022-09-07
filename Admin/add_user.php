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

        <title>Add User</title>
        
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

                        <li><a href="dashboard.php"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                        <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

                        <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                        <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                        <li><a href="add_user.php" class="active"><span class="fa fa-user-plus"></span><span>Add User</span></a></li>
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

        <!-- <div class="position">
        <div class="container-breadcrumb">
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <ol itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="dashboard.php" itemprop="item">
                            <span itemprop="name">Dashboard</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li> Add User</li>
                </ol>
            </nav>
        </div>
    </div> -->

        <!-- <h2 class="title" align="center">Fill the information of User</h2><br><br><br> -->
        <h2 class="title">Fill the information of User</h2><br><br><br>

        <form action="addUser.php" class="form-horizontal" method="post">

            <div class="container">

                <div class="form-group">

                    <div class="row">

                        <div class="col">

                            <label>Branch Name :</label>

                        </div>

                        <div class="col">

                            <input type="text" id="bname" name="b_name" class="form-control" placeholder="Enter Branch Name" required><br><br>

                        </div>


                        <div class="col">

                            <label>User Name :</label>

                        </div>

                        <div class="col">

                            <input type="text" id="uname" name="u_name" class="form-control" placeholder="Enter Username" required><br><br>

                        </div>
                        <div class="col">

                            <label>Contact No. :</label>

                        </div>

                        <div class="col">

                            <input type="text" id="contact_no" name="contact_no" class="form-control" placeholder="Enter Contact Number" required><br><br>

                        </div>



                        <div class="col">

                            <label>Password :</label>

                        </div>

                        <div class="col">

                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter Password" required minlength="6"><br><br>

                        </div>



                        <div class="col">

                            <label>Confirm Password :</label>

                        </div>

                        <div class="col">

                            <input type="password" id="confirmPass" class="form-control" placeholder="Enter Confirm Password" onblur="confirm()">

                        </div>

                        <div class="confirm">
                            <p id="error"></p>
                        </div><br><br>








                        <div class="col">

                            <button type="submit" name="submit" class="submit" id="submit">SUBMIT</button>

                        </div>

                    </div>

                </div>

            </div>



        </form>



        <?php
        ?>



        <div id="return"></div>

        <div class="responsive-table">


            <table id="file_export" class="table table-striped table-bordered display">
                <thead class="thead">
                    <tr align="center">
                        <th>Index</th>
                        <th style="display:none;">ID</th>
                        <th>Branch</th>
                        <th>UserName</th>
                        <th>Contact No</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody id="tbody" align="center">

                    <?php
                    // include_once("./../db/connect.php");


                    $count = 0;

                    $cmd = "select * from userData ";

                    $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

                    while ($row = mysqli_fetch_array($result)) {

                        $id = $row['id'];

                        $bname = $row['branch'];

                        $uname = $row['uname'];
                        $contact_no = $row['contact_no'];

                        $pass = $row['pass'];


                    ?>



                        <tr id="delete<?php echo $row['id'] ?>">

                            <td style="display:none;"><?php echo $id; ?></td>

                            <td><?php echo $count = $count + 1; ?></td>
                            <td><?php echo $bname; ?></td>

                            <td><?php echo $uname; ?></td>
                            <td><?php echo $contact_no; ?></td>

                            <td><?php echo $pass; ?></td>

                            <!-- <td><a href="edit_user.php"><button class="update">Edit</button></a></td> -->
                            <td>
                                <form class="edit" action="./edit_user.php" method="post">
                                    <input type="hidden" name="eid" id="eid" value="<?php echo $id; ?>">
                                    <center>
                                        <button type="submit" name="edit" class="update">Edit</button>
                                    </center>
                                </form>
                            </td>

                            <td>
                            <form class="edit" action="./back/delete_user.php" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                    <center>
                                        <button type="submit" name="edit" class="delete">Delete</button>
                                    </center>
                                </form>


                                <!-- <div id="return"></div>

                                <center>

                                    <button type="submit" class="delete" onclick="removeuser(<?php echo $row['id']; ?>)">Delete</button>

                                </center> -->

                               
                            </td>

                            <!-- <form id='form' class="edit" action="" method="post">
                                <td>
                                    <input type="hidden" name="uid" id="uid" value="<?php echo $id; ?>">
                                    <center>
                                        <button type="submit" name="remove" id="remove" class="delete">Delete</button>
                                    </center>

                                </td>
                            </form> -->
                            <!-- <div id="return"></div> -->


                        </tr>



                    <?php



                    }

                    ?>





                </tbody>

            </table>

            <!-- <div id="output"></div> -->
            <!-- <div id="return"></div> -->



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



        <script src="./js/remove_user.js"></script>
        <!-- <script src="./js/deleteuser.js"></script> -->
        <script src="./js/edit_user.js"></script>



        <script>
            var bname = document.getElementById('bname')
            var uname = document.getElementById('uname')
            var pass = document.getElementById('pass')
            var conPass = document.getElementById('confirmPass')
            var error = document.getElementById('error')
            var submit = document.getElementById('submit')

            function confirm() {

                if (pass.value !== null) {


                    if (pass.value !== conPass.value) {
                        error.innerHTML = "Password Not Match";
                        submit.disabled = true;

                    } else {
                        error.innerHTML = "";
                        submit.disabled = false;

                    }


                }

            }
        </script>



    </body>



    </html>

<?php
} else {
    echo header('Location: ../login.php');
}
?>
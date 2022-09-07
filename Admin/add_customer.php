<?php
session_start();
$branch = base64_decode($_SESSION['branch']);
$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);
if (isset($_SESSION['branch']) && $_SESSION['username'] && $_SESSION['password']) {

    // if($branch !=''  $username !='' and $password !=''){




?>


    <!DOCTYPE html>

    <html lang="en">



    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Add Customer</title>
        
        <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

        <link rel="stylesheet" href="dashboard.css">



        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

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

                        <li><a href="dashboard.php" ><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                        <li><a href="add_customer.php" class="active"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

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

                        <li><a href="dashboard.php" ><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>

                        <li><a href="add_customer.php" class="active"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>

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

                    Add Customer

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



        <!-- main-content -->

        <h2 class="title">Fill the information of customer</h2><br><br><br>

        <form action="./back/add_customer.php" class="form-horizontal" method="post">

            <div class="container" id="emi">

                <div class="form-group">

                    <div class="row">

                        <div class="col">

                            <label>Customer Name :</label>

                        </div>

                        <div class="col">

                            <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required><br><br>

                        </div>



                        <div class="col">

                            <label>Contact no. :</label>

                        </div>

                        <div class="col">

                            <input type="text" minlength="10" maxlength="10" name="contact_no" class="form-control" placeholder="Enter Contact Number" required><br><br>

                        </div>



                        <div class="col">

                            <label>Loan Type :</label>

                            <div class="col">

                                <select name="loan_type" id="loantype" required>

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


                        <div id="EMI"></div>

                        <!-- <div class="col">

                    </div> -->



                        <div class="col">

                            <label>Loan Amount :</label>

                        </div>

                        <div class="col">

                            <input type="number" name="amount" class="form-control" placeholder="Enter Loan Amount" required><br><br>

                        </div>



                        <!-- <div class="col">

                        <label>EMI :</label>

                    </div>

                    <div class="col">

                        <input type="number"  name="emi"  class="form-control" placeholder="Enter EMI" required><br><br>

                    </div> -->



                        <div class="col">

                            <label>Loan Start Date. :</label>

                        </div>

                        <div class="col">

                            <input type="date" name="s_date" class="form-control" placeholder="Starting Date of Loan" required><br><br>

                        </div>



                        <!-- <div class="col">

                        <label>Loan End Date. :</label>

                    </div>

                    <div class="col">

                        <input type="date" name="e_date" class="form-control" placeholder="Ending Date of Loan" required><br><br>

                    </div> -->



                        <div class="col">

                            <label>Loan Duration :</label>

                        </div>

                        <div class="col">

                            <input type="number" name="duration" class="form-control" placeholder="Add total months" required><br><br>

                        </div>

                        <div class="col">

                            <input type="submit" name="submit" class="submit" id="submit"></input>

                        </div>

                    </div>

                </div>

            </div>



        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            document.getElementById("loantype").onchange = (e) => {
                const StdVal = e.target.value;
                console.log(StdVal);
                if (document.getElementById("Emi")) document.getElementById("Emi").remove();
                if (["Micro Loan"].includes(StdVal)) {
                    $('#EMI').append(`
                    
                    <input type="number"  name="Emi" id='Emi' class="form-control" placeholder="Enter EMI" required><br><br>

                    `);
                    document.getElementById("Emi").focus();
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
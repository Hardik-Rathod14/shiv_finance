<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="dashboard.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>

<body>

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
                <li><a href="add_customer.php" class="active"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>
                <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>
                <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

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
                Add Customer
            </h2>

            <div class="user-wrapper">
                <li class="user"><img class="" src="../Images/default-user.jpg" width="40px" height="40px" alt=""></li>
                <div>
                    <h4>Admin</h4>
                    <small>Finance Owner</small>
                </div>
                <div id="data-title" class="visible">
                    <a href="../login.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>
                </div>
            </div>
        </header>
    </div>

    <!-- main-content -->
    <h2 class="title">Fill the information of customer</h2><br><br><br>
    <form action="" class="form-horizontal" method="post">
        <div class="container">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Customer Name :</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Customer Name"><br><br>
                    </div>

                    <div class="col">
                        <label>Contact no. :</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Enter Contact Number"><br><br>
                    </div>

                    <div class="col">
                        <label>Loan Type :</label>
                        <div class="col">
                            <select name="" id="">
                                <option value="" selected disabled>Loan Type</option>
                                <option value="">Home Loan</option>
                                <option value="">Personal Loan</option>
                                <option value="">Mortgage Loan</option>
                                <option value="">Top-up Loan</option>
                                <option value="">Hotel Loan</option>
                                <option value="">Industrial Loan</option>
                                <option value="">Educational Loan</option>
                                <option value="">Gold Loan</option>
                            </select><br><br>
                        </div>
                    </div>

                    <div class="col">
                        <label>Loan Amount :</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Enter Loan Amount"><br><br>
                    </div>

                    <div class="col">
                        <label>EMI :</label>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Enter EMI"><br><br>
                    </div>

                    <div class="col">
                        <label>Loan Start Date. :</label>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" placeholder="Starting Date of Loan"><br><br>
                    </div>

                    <div class="col">
                        <label>Loan Close Date. :</label>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" placeholder="Loan Close Date"><br><br>
                    </div>
                    <div class="col">
                        <button type="submit" class="submit">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>

</html>
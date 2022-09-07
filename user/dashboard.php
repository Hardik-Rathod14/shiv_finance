<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
            <ul>
                <li><a href="dashboard.php" class="active"><span class="fa fa-dashboard"></span><span>Dashboard</span></a></li>
                <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>
                <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>
                <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>
                
            </ul>
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
                    <h4>Admin</h4>
                    <small>Finance Owner</small>
                </div>
                <div id="data-title" class="visible">
                    <a href="../login.php" data-title="Log out"><span class="fa fa-sign-out"></span></a>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single1">
                    <div>
                        <h1>11</h1>
                        <span>Car Loan</span>
                    </div>
                </div>
                <div class="card-single2">
                    <div>
                        <h1>22</h1>
                        <span>Gold Loan</span>
                    </div>
                </div>
                <div class="card-single3">
                    <div>
                        <h1>33</h1>
                        <span>Mortgage Loan</span>
                    </div>
                </div>
                <div class="card-single4">
                    <div>
                        <h1>44</h1>
                        <span>Top-up Loan</span>
                    </div>
                </div>
                <div class="card-single5">
                    <div>
                        <h1>55</h1>
                        <span>Personal Loan</span>
                    </div>
                </div>
                <div class="card-single6">
                    <div>
                        <h1>66</h1>
                        <span>Houseing Loan</span>
                    </div>
                </div>
                <div class="card-single7">
                    <div>
                        <h1>77</h1>
                        <span>Hotel & Industrial Loan</span>
                    </div>
                </div>
                <div class="card-single8">
                    <div>
                        <h1>88</h1>
                        <span>Education Loan</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
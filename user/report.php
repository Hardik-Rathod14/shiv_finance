<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="dashboard.css">
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
                <li><a href="add_customer.php"><span class="fa fa-user-plus"></span><span>Add Customer</span></a></li>
                <li><a href="report.php" class="active"><span class="fa fa-list-alt"></span><span>Report</span></a></li>
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
                Statement and Report of Loan
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

    <div class="responsive-table">

        <table id="file_export" class="table table-striped table-bordered display">
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact No.</th>
                    <th>Loan Type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr>
                    <td>1</td>
                    <td>Raj</td>
                    <td>9898989898</td>
                    <td>Car Loan</td>
                    <td><a href ="edit_emi.php"><button class="update">Edit</button></a></td>
                    <td><button class="delete">Delete</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Raj</td>
                    <td>9898989898</td>
                    <td>Car Loan</td>
                    <td><a href ="edit_emi.php"><button class="update">Edit</button></a></td>
                    <td><button class="delete">Delete</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Raj</td>
                    <td>9898989898</td>
                    <td>Car Loan</td>
                    <td><a href ="edit_emi.php"><button class="update">Edit</button></a></td>
                    <td><button class="delete">Delete</button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Raj</td>
                    <td>9898989898</td>
                    <td>Car Loan</td>
                    <td><a href ="edit_emi.php"><button class="update">Edit</button></a></td>
                    <td><button class="delete">Delete</button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Raj</td>
                    <td>9898989898</td>
                    <td>Car Loan</td>
                    <td><a href ="edit_emi.php"><button class="update">Edit</button></a></td>
                    <td><button class="delete">Delete</button></td>
                </tr>
                
            </tbody>
        </table>
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

</body>

</html>
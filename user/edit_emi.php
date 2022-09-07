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
                Update EMI Details
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



    <form id="form" action="" class="form-details" method="post">
        <div class="container">
            <div class="form-groups">
                <div class="rows">
                    <div class="col">
                        <label>Customer Name :</label>
                        <p>Raj</p>
                    </div><br>
                    <div class="col">
                        <label>Contact no. :</label>
                        <p>9898989898</p>
                    </div><br>
                    <div class="col">
                        <label>Loan Type :</label>
                        <p>Car Loan</p>
                    </div><br>
                    <div class="col">
                        <label>Loan Amount :</label>
                        <p>500000</p>
                    </div><br>
                    <div class="col">
                        <label>EMI :</label>
                        <p>20834</p>
                    </div><br>
                    <div class="col">
                        <label>Loan Start Date. :</label>
                        <p>01/01/21</p>
                    </div><br>

                    <div class="col">
                        <label>Loan Close Date. :</label>
                        <p>01/01/23</p>
                    </div>
                </div>
            </div>
        </div>
    </form>






    </form>

    <div class="responsive-table">

        <table id="file_export" class="table table-striped table-bordered display">

            <thead class="thead">
                <tr>
                    <th>Index</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Loan Type</th>
                    <th>EMI</th>
                    <th>Paid Status</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2</td> 
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>3</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>4</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>5</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>6</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>7</td> 
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>8</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>9</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>10</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>11</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>12</td> 
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>13</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>14</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>15</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>16</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>17</td> 
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>18</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>19</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>20</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>21</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>22</td> 
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>23</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>24</td>
                    <td>2021</td>
                    <td>Car Loan</td>
                    <td>20834</td>
                    <td><button class="paid">Paid</button></td>
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
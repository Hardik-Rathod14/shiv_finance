<?php
// error_reporting(0);

include('con/connection.php');


?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add User</title>
    
    <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

    <style>
        .confirm {
            color: #8b0000;

        }
    </style>

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

                <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                <li><a href="add_user.php" class="active"><span class="fa fa-user-plus"></span><span>Add user</span></a></li>



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

                Add User

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

                        <button type="submit" class="submit" id="submit">SUBMIT</button>

                    </div>

                </div>

            </div>

        </div>



    </form>

    <div class="responsive-table">

        <table id="file_export" class="table table-striped table-bordered display">



            <thead class="thead">

                <tr>

                    <th>ID</th>

                    <th>Branch</th>

                    <th>UserName</th>

                    <th>Password</th>

                    <th>Edit</th>

                    <th>Delete</th>



                </tr>

            </thead>

            <tbody id="tbody">

                <?php

                $qry = "select * from userData";

                $raw = mysqli_query($conn, $qry);

                while ($res = mysqli_fetch_assoc($raw)) {

                    // $data[]=$res['id'];
                    // $data[]=$res['name'];

                    $id = $res['id'];
                    $bname = $res['branch'];
                    $uname = $res['uname'];
                    $pass = $res['pass'];




                ?>
                    <tr id="delete<?php echo $row['id'] ?>">
                        <td style="display:none;"><?php echo $id; ?></td>

                        <td><?php echo $id; ?></td>

                        <td><?php echo $bname; ?></td>

                        <td><?php echo $uname; ?></td>

                        <td><?php echo $pass; ?></td>

                        <td><a href="edit_user.php"><button class="update">Edit</button></a></td>
                        <td>
                            <div id="return"></div>
                            <center>
                                <button class="delete" onclick="RemoveUser(<?php echo $res['id']; ?>)">Delete</button>
                                <!-- <button type="submit" class="delete" onclick="RemoveUser(<?php echo $res['id']; ?>)">Delete</button> -->
                            </center>
                        </td>




                    </tr>


                <?php
                    // echo $id;
                } ?>


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

    <!-- delete user -->
    <script src="./js/remove_user.js"></script>

</body>


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



</html>
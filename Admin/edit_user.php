
<?php 
session_start();
$branch = base64_decode($_SESSION['branch']);
$username = base64_decode($_SESSION['username']);
$password = base64_decode($_SESSION['password']);
if(isset($_SESSION['branch']) && $_SESSION['username']&& $_SESSION['password']){

// if($branch !=''  $username !='' and $password !=''){




?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update User Details</title>
    
    <link rel="icon" href="../Images/shiv-finance logo.png" type="image/x-icon">

    <link rel="stylesheet" href="dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>



<body>

    <?php
    include_once("./../db/connect.php");

    if (isset($_POST['edit']) && isset($_POST['eid'])) {


        $id = mysqli_real_escape_string($con, $_POST['eid']);
        $id = htmlspecialchars($id);
        // echo $id;
        $cmd = "select * from userData  where id='$id' ";

        $result = mysqli_query($con, $cmd) or die(mysqli_error($con));

        while ($row = mysqli_fetch_array($result)) {

            $id = $row['id'];

            $contact_no = $row['contact_no'];

            $uname = $row['uname'];

            $pass = $row['pass'];

            $branch = $row['branch'];

            $status = $row['status'];
        }




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

                    <li><a href="report.php"><span class="fa fa-list-alt"></span><span>Report</span></a></li>

                    <li><a href="loan_status.php"><span class="fa fa-balance-scale"></span><span>Loan Status</span></a></li>

                    <li><a href="add_user.php" class="active"><span class="fa fa-user-plus"></span><span>Add User</span></a></li>
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

                    Update User Details

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
                        <a href="./add_user.php" itemprop="item">
                            <span itemprop="name"> Add User</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li> Add User</li>
                </ol>
            </nav>
        </div>
    </div>


        <h2 class="title">
            <!-- Update User Details -->
        </h2><br><br><br>
        <div id="return"></div>

        <form class="edituser" id="edituser" class="form-horizontal" method="post">

            <div class="container">

                <div class="form-group">

                    <div class="row">
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />

                        <div class="col">

                            <label>User Name :</label>

                        </div>

                        <div class="col">

                            <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter Username" autocomplete="" maxlength="" aria-describedby="helpId" value="<?php echo $uname; ?>"><br><br>

                        </div>



                        <div class="col">

                            <label>Password :</label>

                        </div>

                        <div class="col">

                            <input type="text" name="pass" id="pass" class="form-control" placeholder="Enter Password" autocomplete="" maxlength="" aria-describedby="helpId" value="<?php echo $pass; ?>"><br><br>

                        </div>



                        <div class="col">

                            <label>Contact Number :</label>

                        </div>

                        <div class="col">

                            <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Enter Contact Number" autocomplete="" maxlength="10" minlength="10" aria-describedby="helpId" value="<?php echo $contact_no; ?>"><br><br>

                        </div>



                        <div class="col">

                            <label>Branch Name :</label>

                        </div>

                        <div class="col">

                            <input type="text" name="branch" id="branch" class="form-control" placeholder="Enter Branch Name" autocomplete="" maxlength="" aria-describedby="helpId" value="<?php echo $branch; ?>" ><br><br>

                        </div>





                        <div class="col">

                            <button type="submit" name="edit" id="edit" class="submit">SAVE</button>

                        </div>

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

</body>
<?php
    } else {
    }
    $con->close();

?>


</html>

<?php
}

else{
    echo header('Location: ../login.php');

}
?>
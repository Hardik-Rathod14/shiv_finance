<?php

include('./db/connect.php');

$cmd = "select * from userData ";

$result = mysqli_query($con, $cmd) or die(mysqli_error($con));
?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    
    <link rel="icon" href="./Images/shiv-finance logo.png" type="image/x-icon">

    <link rel="stylesheet" href="loginform.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>



<body>

    <img class="logo-img" src="./Images/logo.webp" width="200" height="200" align box" align="center">

    <form action="./Admin/auth.php" class="form-horizontal" method="post">

        <div class="container">

            <h2>Login</h2>

            <div class="form-group">

                <div class="row">

                    <div class="col">

                        <label><span class="fa fa-home"></span>Branch Name :</label>

                    </div>

                    <div class="col">






                        <!-- <input type="text" class="form-control" placeholder="Enter Branch Name" required><br><br> -->
                        <select name="branch" class="form-control">

                            <?php

                            while ($row = mysqli_fetch_array($result)) {

                               
                                $branch = $row['branch'];


                            ?>
                                <option value="<?php echo $branch ?>" ><?php echo $branch ?></option>
                            <?php } ?>

                        </select>



                        <br><br>



                    </div>


                    <div class="col">

                        <label><span class="fa fa-user-circle"></span>User Name :</label>

                    </div>

                    <div class="col">

                        <input type="text" class="form-control" name="user" placeholder="Enter Username" required><br><br>

                    </div>



                    <div class="col">

                        <label><span class="fa fa-lock"></span>Password :</label>

                    </div>

                    <div class="col">

                        <input type="password" class="form-control" name="pass" placeholder="Enter Password" required><br><br>

                    </div>








                    <div class="col">

                        <button type="submit" name="send" class="submit" id="submit">Login</button>

                    </div>

                </div>

            </div>

        </div>



    </form>


    





</body>



</html>
<?php



session_start();

include("../../db/connect.php");

$branch = base64_decode($_SESSION['branch']);

// echo $branch;

$new_loan = $branch . '_' . 'new_loan';

$new_loan = strtolower($new_loan);

// echo $new_loan;

$pay_emi = $branch . '_' . 'pay_emi';

$pay_emi = strtolower($pay_emi);





// if (isset($_POST['submit'])) {

    if(isset($_POST['customer_name']) && isset($_POST['contact_no']) && isset($_POST['loan_type']) && isset($_POST['amount']) && isset($_POST['s_date']) && isset($_POST['duration']))

    {





    // echo "sucess";





    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);



    $customer_name = htmlspecialchars($customer_name);



    $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);



    $contact_no = htmlspecialchars($contact_no);



    $loan_type = mysqli_real_escape_string($con, $_POST['loan_type']);



    $loan_type = htmlspecialchars($loan_type);



    $amount = mysqli_real_escape_string($con, $_POST['amount']);



    $amount = htmlspecialchars($amount);





    $emi = mysqli_real_escape_string($con, isset($_POST['Emi'])) ? $_POST['Emi'] : '';

    $emi = htmlspecialchars($emi);



    // $emi = mysqli_real_escape_string($con, $_POST['emi']);



    // $emi = htmlspecialchars($emi);



    $s_date = mysqli_real_escape_string($con, $_POST['s_date']);



    $s_date = htmlspecialchars($s_date);



    // $e_date = mysqli_real_escape_string($con, $_POST['e_date']);



    // $e_date = htmlspecialchars($e_date);



    $duration = mysqli_real_escape_string($con, $_POST['duration']);



    $duration = htmlspecialchars($duration);



// echo $duration;

    $cmd = "select * from $new_loan ORDER BY id DESC LIMIT 1";

    $result21 = mysqli_query($con, $cmd) or die(mysqli_error($con));

    if (mysqli_fetch_row($result21) < 1) {

        $id = 0;

    } else {

        $cmd1 = "select * from $new_loan ORDER BY id DESC LIMIT 1";

        $result1 = mysqli_query($con, $cmd1) or die(mysqli_error($con));

        while ($row = mysqli_fetch_array($result1)) {

            $id = $row['id'];

        }

    }

    $id = $id + 1;



    $cid = 'CSTIDN' . rand(11111,99999);







    $cmd1 = "select * from $new_loan where contact_no = '$contact_no' and customer_name='$customer_name' and loan_type = '$loan_type' and start_date='$s_date' && loan_amount = '$amount' and loan_duration='$duration' && emi='$emi' ";

// echo $cmd1;

    $result1 = mysqli_query($con, $cmd1) or die(mysqli_error($con));



    if (mysqli_fetch_row($result1) < 1) {



        $cmd = "INSERT INTO `$new_loan` (`id`, `cid`, `customer_name`, 



        `contact_no`, `loan_type`, `loan_amount`, `loan_duration`, `emi`, 



         `start_date`,`loan_status`, `month_status`) VALUES ('NULL','$cid',

          '$customer_name', '$contact_no', '$loan_type', '$amount',



          '$duration', '$emi','$s_date', 'Incomplete','0')";



        $result = mysqli_query($con, $cmd) or die(mysqli_error($con));







        for ($i = 1; $i <= $duration; $i++) {



            $sel = "INSERT INTO $pay_emi (`id`, `cid`, `customer_name`, `contact_no`,



            `loan_type`, `loan_amount`, `loan_duration`, `emi`,`amount` , `month`, `date`,`paid`)

             VALUES (NULL,'$cid', '$customer_name', '$contact_no', '$loan_type', 

             '$amount','$duration','$emi','0','$i','0','0')";

            //  echo $sel;



            $sql = mysqli_query($con, $sel) or die(mysqli_error($con));

        }









        //





        if ($result && $sql) {



?>



            <script type="text/javascript">

                alert("New loan added successfully!...");



                window.location = './../report.php';

            </script>



        <?php







        } else {



        ?>



            <script type="text/javascript">

                alert('New loan added Failed... !');



                window.location = './add_customer.php';

            </script>



        <?php







        }

    } else {



        ?>



        <script type="text/javascript">

            confirm('This Number already loan resuming. Are you sure you want to add new loan ?');

        </script>



    <?php







    }

} else {

    // echo "error";



    ?>



    <script type="text/javascript">

        alert('Page Not Found... !');



        window.location = './add_customer.php';

    </script>



<?php







}







?>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<?php



$con->close();







?>
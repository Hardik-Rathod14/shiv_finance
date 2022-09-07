<?php

include("../../db/connect.php");

if (isset($_POST['edit'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);

    $id = htmlspecialchars($id);

    // echo $id;
?>
<script>
 if (confirm("Are You Sure Close the Loan ?")) {
    // </script>
<?php



    $sel = "select * from userData where id='$id'";

    $run = mysqli_query($con, $sel) or die(mysqli_error($con));

    while ($row = mysqli_fetch_array($run)) {

        $uname = $row['uname'];
    }

    $data = "delete from userData where id='$id'";

    $result = mysqli_query($con, $data) or die(mysqli_error($con));

    if ($result) {
?>

        <script>
            alert('Customer Deleted...');
            window.location = './../add_user.php';
        </script>

    <?php

    } else {

    ?>

        <script>
            alert('Customer Deleted Failed...!');
            window.location = './../add_user.php';
        </script>

    <?php

    }
?>
 } else{
    return false;
 }
</script>
<?php


} else {

    ?>

    <script>
        alert('Something Went Wrong...!');
        window.location = './../add_user.php';
    </script>

<?php

}



$con->close();

?>
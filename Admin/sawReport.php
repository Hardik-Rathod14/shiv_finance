<?php 

include('con/connection.php');

$qry ="select * from newLoan";

$raw = mysqli_query($conn , $qry);

while($res =mysqli_fetch_assoc($raw)){
    
    // $data[]=$res['id'];
    // $data[]=$res['name'];

    $id = $res['id'];
    $name = $res['name'];
    $number = $res['number'];
    $l_type = $res['l_type'];
    $l_amt = $res['l_amt'];
    $l_emi = $res['l_emi'];
    $l_sdate = $res['l_sdate'];
    $l_cdate = $res['l_cdate'];
    
}

// echo $id;
// echo (json_encode($data));

mysqli_close($conn);


?>

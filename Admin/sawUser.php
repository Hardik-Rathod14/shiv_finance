<?php 

include('con/connection.php');

$qry ="select * from userData";

$raw = mysqli_query($conn , $qry);

while($res =mysqli_fetch_assoc($raw)){
    
    // $data[]=$res['id'];
    // $data[]=$res['name'];

    $id = $res['id'];
    $bname = $res['branch'];
    $uname = $res['uname'];
    $pass = $res['pass'];

    // echo $bname; 
    echo $pass;
    
}

// echo $id;


?>

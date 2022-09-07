<?php  


include('con/connection.php');

// $name = "dharmik";
// $number = "123";
// $l_type = "car";
// $l_amt = "110cr";
// $l_sdate = "1/28/9";
// $l_ldate = "1/28/9";


$name = $_POST['name'];
$number = $_POST['num'] ;
$l_type = $_POST['loanType'];    
$l_amt = $_POST['loanAmt'];
$emi = $_POST['emi'];
$l_sdate = $_POST['sdate'];
$l_ldate = $_POST['cdate'];

$qry = "insert into newLoan(name , number , l_type , l_amt ,l_emi , l_sdate , l_ldate) value('$name','$number','$l_type','$l_amt','$emi','$l_sdate','$l_ldate')";
$res = mysqli_query($conn , $qry);

if($res){
    
    

}
else{
    echo "somthing went wrong";
}

header("Location: dashboard.php");

?>
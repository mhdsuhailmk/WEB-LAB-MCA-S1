<?php

include '../dbconnection.php';
session_start();
if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
$id=$_SESSION['login_id'];
$b_id=$_POST['reserve_details'];
// $current_date=date("y-m-d h:m:s");
$query=mysqli_query($con,"SELECT * FROM reservation_tb WHERE book_id='$b_id'AND status='1'");

$book_query=mysqli_query($con,"SELECT * FROM reservation_tb WHERE book_id='$b_id' AND login_id='$id' AND status='1'");
$reservation_count=mysqli_query($con,"SELECT * from reservation_tb where login_id='$id' and status='1'");
$no_of=mysqli_num_rows($reservation_count);
$count=mysqli_num_rows($book_query);
$n=mysqli_num_rows($query);
if($n>0)
{
 echo"<script>alert('some one alredy reserved..');</script>";
 echo"<script>window.location='search-book'</script>";
}
else
{
if($no_of=='3')
{
 echo"<script>alert('You reach the limit..');</script>";
 echo"<script>window.history.back();</script>";
}
else
{
if($count>0)
{
echo "<script>alert('You already reserved this book..');</script>";
echo"<script>window.location='search-book';</script>";
}
else
{
mysqli_query($con,"INSERT INTO `reservation_tb`(`book_id`,`login_id`,`status`) VALUES('$b_id','$id','1')");
echo "<script>alert('added to reserve successfully..');</script>";
echo"<script>window.location='search-book';</script>";
}
}
}

?>
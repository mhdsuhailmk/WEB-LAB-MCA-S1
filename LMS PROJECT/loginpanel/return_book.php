<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
$c_id=$_GET['collection_id'];
$query=mysqli_query($con,"SELECT * FROM collection_tb where collection_id='$c_id'");
$row_data=mysqli_fetch_assoc($query);
$date_taken=$row_data['date_of_collection'];
$date_return=date("y-m-d");
$start_date = strtotime($date_taken); 
                    $end_date = strtotime($date_return); 
                    $date_diff=($end_date - $start_date);
                  


mysqli_query($con,"UPDATE `collection_tb` SET `status`='2' WHERE collection_id='$c_id'");
echo "<script>alert('returned book sucessfully..');</script>";
echo "<script>window.history.back();</script>";
?>
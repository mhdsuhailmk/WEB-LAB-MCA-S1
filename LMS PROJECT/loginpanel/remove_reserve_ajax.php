<?php




include '../dbconnection.php';
session_start();
if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
$id=$_SESSION['login_id'];
$r_id=$_POST['reserved_id'];







$update_reservation_query=mysqli_query($con,"UPDATE reservation_tb SET status='2' WHERE reservation_id='$r_id'");







echo "<script>alert('remove from reservation sucessfully..');</script>";
echo"<script>window.location='search-book';</script>";
// }
?>
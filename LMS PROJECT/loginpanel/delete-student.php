<?php
include '../dbconnection.php';
session_start();
if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
$user_id=$_GET['login_id'];
mysqli_query($con,"DELETE from student_details_tb where login_id='$user_id'");
mysqli_query($con,"DELETE from login_tb where login_id='$user_id'");
if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
if(isset($_SESSION['login_id']))
{
    header("location:view-students");
}
?>
<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

if(isset($_GET['id']))
{
    $book_id   = mysqli_real_escape_string($con, $_GET['book_id']);
    $id   = mysqli_real_escape_string($con, $_GET['id']);

    $content = "Your due date exeeded for Book id : ".$book_id.", Please return the book immediately.";
   
    mysqli_query($con, "INSERT INTO `lib_alert`( `content`, `user_id`) VALUES('$content', '$id')");

    echo "<script>alert('alerted successfully!');</script>";
    echo "<script>window.history.back();</script>";
}
?>
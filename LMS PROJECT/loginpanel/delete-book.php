<?php
include '../dbconnection.php';
if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
$bk_id = $_GET['book_id'];

mysqli_query($con, "DELETE FROM book_details_tb WHERE book_id = '$bk_id'");

echo "<script>alert('Book deleted successfully!');</script>";
echo "<script>window.history.back();</script>";

?>
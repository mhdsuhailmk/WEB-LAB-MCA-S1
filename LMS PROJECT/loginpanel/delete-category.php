<?php
include '../../dbconnection.php';

$category_id  = $_GET['categ_id'];

mysqli_query($con, "DELETE FROM category_tb WHERE category_id = '$category_id'");

echo "<script>alert('Category deleted successfully!');</script>";
echo "<script>window.history.back();</script>";

?>
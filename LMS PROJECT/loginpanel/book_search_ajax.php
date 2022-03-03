<?php
$root_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'].'/ccsit_vadakara/Library_Management';
 $root = $root_url; 
include '../dbconnection.php';
session_start();
if(!isset($_SESSION['login_id']))
{
    header("location: index");
}
$sname=$_POST['book_detail'];
$book_query="";

if ($sname) 
{
$books_query = mysqli_query($con, "SELECT * FROM book_details_tb JOIN category_tb ON category_tb.category_id = book_details_tb.category_id where book_id like '$sname' or category_name like'%$sname%' or book_name like '%$sname%' or author like '%$sname%' ORDER BY book_id ASC");

}
else
{
$books_query = mysqli_query($con, "SELECT * FROM book_details_tb JOIN category_tb ON category_tb.category_id = book_details_tb.category_id ORDER BY book_id ASC");
}
?>

<div class="row">  
                    <?php 
                    $i = 0; 

                    while($row_data = mysqli_fetch_assoc($books_query))
                    { 
                    $i++; 
                    $b_id=$row_data['book_id'];
                    $reserved_query=mysqli_query($con,"SELECT * FROM reservation_tb where 
                        book_id='$b_id' and status='1'");
                    
                    $collected_query=mysqli_query($con,"SELECT * FROM collection_tb where 
                        book_id='$b_id' and status='1'");
                    $reserve_count=mysqli_num_rows($reserved_query);
                    $collected_count=mysqli_num_rows($collected_query);
                

                    //$current_quantity=$row_data['book_quantity']-$reserve_count-$collected_count;
                    ?>

                                    
                    <div class="col-xl-5 col-sm-6 col-12">
                    

                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                
                                <div class="col-10">
                                    <div class="item-content" >
                                        <div  class="item-number">Name:<?php echo $row_data['book_name']; ?></div>
                                        <div class="item-title">Author:<?php echo $row_data['author']; ?></div>
                                        <div class="item-title">Category:<?php echo $row_data['category_name']; ?>
                                        </div>
                                        <div class="item-title">Edition:<?php echo  $row_data['book_edition']; ?></div>
                                        <div class="col-12 form-group mg-t-8">
                                            <?php
                                            if(!$_SESSION['role'] =='0')
                                            {
                                            ?>
                                        <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Reserve" onclick="get_name(<?php echo $row_data['book_id']; ?>)"
                                         name="add_reserve" style="float: right;"> 
                                          <?php
                                            }
                                            ?>
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php 
                    } 
                    ?>
                </div>
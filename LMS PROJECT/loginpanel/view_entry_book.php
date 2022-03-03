<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$books_query = mysqli_query($con, "SELECT * FROM book_details_tb JOIN collection_tb ON book_details_tb.book_id = collection_tb.book_id JOIN student_details_tb ON collection_tb.login_id=student_details_tb.login_id where status='1' ORDER BY collection_id ASC");


?>

<!doctype html>
<html class="no-js" lang="">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 
<?php include ('includes/header.php'); ?>


<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->

       <?php include 'includes/navbar.php'; ?>
        
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            
            <?php include 'includes/leftbar.php'; ?>

            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Books Details</h3>
                    <ul>
                        <li>
                            <a href="dashboard">Home</a>
                        </li>
                        <li>View Students Entry Details</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Books</h3>
                            </div>
                             
                        </div>
                        
                        <div class="table-responsive">
                        <span id="get_num">
                        <div class="row">  
                    <?php 
                    $i = 0; 

                    while($row_data = mysqli_fetch_assoc($books_query))
                    { 
                    $i++;
                    $current_date=date("y-m-d");
                    $collect_date=$row_data['date_of_collection'];
                    $start_date = strtotime($collect_date); 
                    $end_date = strtotime($current_date); 
                    $date_diff=($end_date - $start_date);
                    $fine=(round($date_diff / (60 * 60 * 24)))-15;
                    ?>

                                    
                    <div class="col-xl-6 col-sm-6 col-12">
                    
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                
                                <div class="col-10">
                                    <div class="item-content" >
                                        <div class="item-number">Book Id : <?php echo $row_data['book_id']; ?></div>
                                        <div class="item-title">Name : <?php echo $row_data['book_name']; ?></div>
                                        <div class="item-title">Author : <?php echo $row_data['author']; ?></div>
                                        <div class="item-title">Student Id : <?php echo $row_data['login_id']; ?>
                                        </div>
                                        <?php
                                        if($fine>0)
                                        {
                                        ?>
                                       <label style="color: red">Fine:<span id="categErr"><?php echo $fine; ?></span></label> 
                                        <?php
                                        }
                                        ?>
                                        <div class="col-12 form-group mg-t-8">
                                        <a href="return_book.php?collection_id=<?php echo $row_data['collection_id'];?>">
                                            <input type="submit" class="btn btn-gradient-yellow btn-hover-bluedark" value="Return" name="add_reserve" > 
                                        </a>
                                        <a href="renew_book.php?c_id=<?php echo $row_data['collection_id'];?>">
                                            <input class="btn btn-gradient-yellow btn-hover-bluedark" type="submit" name="add_renew" value="Renew">
                                        </a>
                                        
                                        <a href="alert_lib.php?id=<?php echo $row_data['login_id'];?>&book_id=<?php echo $row_data['book_id'];?>">
                                            <input class="btn btn-gradient-yellow btn-hover-bluedark" type="submit" name="add_renew" value="alert book return">
                                        </a>
                                       
                                        
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
                    
                    
                </div>
                    <!--  </span>    -->            
                                
                        

                       

                    </div>
                </div>

                <footer class="footer-wrap-layout1">
                    <div class="copyright"><a href="#">CET Library Management System</a></div>
                </footer>
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    
    <?php include 'includes/scripts.php'; ?>
    

</body>

</html>
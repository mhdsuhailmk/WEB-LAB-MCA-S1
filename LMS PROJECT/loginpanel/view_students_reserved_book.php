<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$books_query = mysqli_query($con, "SELECT * FROM book_details_tb JOIN reservation_tb ON book_details_tb.book_id = reservation_tb.book_id JOIN student_details_tb ON reservation_tb.login_id=student_details_tb.login_id where status='1' ORDER BY reservation_id ASC");


?>

<!doctype html>
<html class="no-js" lang="">



 
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
                    
                    

                    $date=date("d-m-Y h:i A", strtotime($row_data['reserve_date']));
                    ?>

                                    
                    <div class="col-xl-5 col-sm-6 col-12">
                    
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                
                                <div class="col-10">
                                    <div class="item-content" >
                                        <div class="item-number">Reservation Id : <?php echo $row_data['reservation_id']; ?></div>
                                        <div class="item-title">Book Id : <?php echo $row_data['book_id']; ?></div>
                                        <div class="item-title">Name : <?php echo $row_data['book_name']; ?></div>
                                        <div class="item-title">Author : <?php echo $row_data['author']; ?></div>
                                        <div class="item-title">Student Id : <?php echo $row_data['login_id']; ?>
                                        </div>
                                        <div class="item-title">Date : <?php echo $date; ?>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                        <a href="add_to_entry_student.php?rr_id=<?php echo $row_data['reservation_id'];?>">
                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Add To Entry" name="add_entry" style="float: right;"> 
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
                     </span>               
                                
                        </div>

                       

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
    <!-- <script type="text/javascript">
        function get_name(name)
        {
            jQuery.ajax(
            {
                type:"POST",
                url:"add_reserve_book_ajax.php",
                datatype:'html',
                data:{reserve_details:name},
                success:function(data)
                {
                    jQuery("#get_num").html(data);
                },
                error:function(data)
                {
                    jQuery("#get_num").html("failed");
                }

            });
        };
    </script> -->
    <!-- <script type="text/javascript">
        function get_detail(name)
        {
            jQuery.ajax(
            {
                type:"POST",
                url:"book_search_ajax.php",
                datatype:'html',
                data:{book_detail:name},
                success:function(data)
                {
                    jQuery("#get_num").html(data);
                },
                error:function(data)
                {
                    jQuery("#get_num").html("failed");
                }

            });
        };
    </script> -->

</body>

</html>
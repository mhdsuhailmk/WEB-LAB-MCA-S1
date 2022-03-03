<?php
include '../dbconnection.php';
session_start();
$log_id=$_SESSION['login_id'];

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$books_query = mysqli_query($con, "SELECT * FROM login_tb INNER JOIN reservation_tb ON reservation_tb.login_id = login_tb.login_id INNER JOIN book_details_tb ON book_details_tb.book_id=reservation_tb.book_id where login_tb.login_id='$log_id' and status='1' ORDER BY reservation_id ASC");


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
                        <li>View Book Details</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Reserved Books</h3>
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
                    $c_id=$row_data['category_id'];
                    $category_query=mysqli_query($con,"SELECT * FROM category_tb where category_id='$c_id'");
                    while($row_data2=mysqli_fetch_assoc($category_query))
                    {
                    ?>

                                    
                    <div class="col-xl-5 col-sm-6 col-12">
                    
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                
                                <div class="col-10">
                                    <div class="item-content" >

                                        <div class="item-number">Name : <?php echo $row_data['book_name']; ?></div>
                                        <div class="item-title">Author : <?php echo $row_data['author']; ?></div>
                                        <div class="item-title">Category : <?php echo $row_data2['category_name'];?>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                        <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Remove" onclick="get_name(<?php echo $row_data['reservation_id']; ?>)"
                                         name="remove_reserve" style="float: right;"> 
                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    <?php 
                    }
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
    <script type="text/javascript">
        function get_name(name)
        {
            jQuery.ajax(
            {
                type:"POST",
                url:"remove_reserve_ajax.php",
                datatype:'html',
                data:{reserved_id:name},
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
    </script>

</body>

</html>
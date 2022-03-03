<?php
include '../dbconnection.php';
session_start();
$log_id=$_SESSION['login_id'];

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$books_query = mysqli_query($con, "SELECT * FROM `lib_alert` WHERE user_id='$log_id' ORDER BY alert_id DESC LIMIT 5");
// die($log_id);

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

                    <h3>Dashboard</h3>

                    <ul>

                        <li>

                            <a href="dashboard">Home</a>

                        </li>

                        <li>Librarian</li>

                    </ul>

                </div>

                <!-- Breadcubs Area End Here -->

                <!-- Dashboard summery Start Here -->

                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Alerts/Notifications</h3>
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

                    ?>

                                    
                    <div class="col-xl-5 col-sm-6 col-10">
                    
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                
                                <div class="col-10">
                                    <div class="item-content" >

                                        <div class="item-number"><?php echo $row_data['content']; ?></div>
                                        <div class="item-title">time : <?php echo $row_data['timeslug']; ?></div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    <?php 
                    } 
                    ?>
                </div>
   
<!--

                <footer class="footer-wrap-layout1">

                    <div class="copyright"><a href="#"><center>CET Library Management System</center></a> </div>
                    <div class="copyright"><a href="#"><center>CET Library Management System</center></a> </div>

                </footer>
-->

                <!-- Footer Area End Here -->

            </div>

        </div>

                        
                        
                        
                        
                        
                      
        <!-- Page Area End Here -->

    </div>

    

    <?php include 'includes/scripts.php'; ?>

  <footer class="footer-wrap-layout1">

                    <div class="copyright"><a href="#"><center>CET Library Management System</center></a> </div>

                </footer>

</body>



</html>
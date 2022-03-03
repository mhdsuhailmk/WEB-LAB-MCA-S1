<?php

include '../../loginpanel/connection.php';

session_start();



if(!isset($_SESSION['login_id']))

{

    header("location: ../index");

}



$category_query = mysqli_query($conn, "SELECT * FROM tbl_notification ORDER BY noti_id asc");



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

                    <h3>Notification</h3>

                    <ul>

                        <li>

                            <a href="dashboard">Home</a>

                        </li>

                        <li>View Notification</li>

                    </ul>

                </div>

                <!-- Breadcubs Area End Here -->

                <!-- Dashboard summery Start Here -->

                

                <div class="card height-auto">

                    <div class="card-body">

                        <div class="heading-layout1">

                            <div class="item-title">

                                <h3></h3>

                            </div>

                             

                        </div>

                        <form class="mg-b-20">

                            

                        </form>

                        <div class="table-responsive">

                            <table class="table display data-table text-nowrap">

                                <thead>

                                    <tr>

                                        <th>

                                            <div class="form-check">

                                                <input type="checkbox" class="form-check-input checkAll">

                                                <label class="form-check-label">Sl No</label>

                                            </div>

                                        </th>

                                        <th>Heading</th>
                                        <th>Message</th>
                                        <th>Action</th>     

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $i = 0; while($row_data = mysqli_fetch_assoc($category_query)) { $i++; ?>

                                    <tr>

                                        <td>

                                            <div class="form-check">

                                                <input type="checkbox" class="form-check-input">

                                                <label class="form-check-label"><?php echo $i; ?></label>

                                            </div>

                                        </td>                                        

                                        <td><?php echo $row_data['heading']; ?></td>
                                        <td><?php echo $row_data['message']; ?></td>


                                    </tr>

                                    <?php } ?>

                                    

                                </tbody>

                            </table>

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



</body>



</html>
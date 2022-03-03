<?php

include '../dbconnection.php';

session_start();



if(!isset($_SESSION['login_id']))

{

    header("location: index");

}



$student_query = mysqli_query($con, "SELECT * from student_details_tb");



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

                    <h3>Students Details</h3>

                    <ul>

                        <li>

                            <a href="dashboard">Home</a>

                        </li>

                        <li>View Students Details</li>

                    </ul>

                </div>

                <!-- Breadcubs Area End Here -->

                <!-- Dashboard summery Start Here -->

                

                <div class="card height-auto">

                    <div class="card-body">

                        <div class="heading-layout1">

                            <div class="item-title">

                                <h3>All Students</h3>

                            </div>

                             

                        </div>

                        <form class="mg-b-20">

                            <div class="row gutters-8">



                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">

                                <input type="text" name="search_name" onkeyup="get_name(this.value)"  placeholder="Search..." class="form-control">

                                </div>



                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">

                                </div>

                                

                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">

                                </div>



                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">

                               

                                </div>

                            </div>

                        </form>

                        <span id="get_num">

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

                                        <th>Student Name</th>

                                        <th>Phone</th>

                                        <th>Email</th>

                                        <th>Batch</th>

                                        <th>Duration</th>

                                        <th>Photo</th>

                                        <th>Action</th>     

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $i = 0; while($row_data = mysqli_fetch_assoc($student_query)) { $i++; ?>

                                    <tr>

                                        <td>

                                            <div class="form-check">

                                                <input type="checkbox" class="form-check-input">

                                                <label class="form-check-label"><?php echo $i; ?></label>

                                            </div>

                                        </td>                                        

                                        <td><?php echo $row_data['name']; ?></td>

                                        <td><?php echo $row_data['phone_no']; ?></td>

                                        <td><?php echo $row_data['mail_id']; ?></td>

                                        <td><?php echo $row_data['batch']; ?></td>

                                        <td><?php echo $row_data['duration']; ?></td>

                                        <td><img src="uploads/student/<?php echo $row_data['photo'];?>" width="100px" height="70px"></td>





                                        <td>

                                            <div class="dropdown">

                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"

                                                    aria-expanded="false">

                                                    <span class="flaticon-more-button-of-three-dots"></span>

                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a class="dropdown-item" href="<?php echo $root.'/loginpanel/delete-student?login_id='.$row_data['login_id']; ?>" onclick="return confirm('Do you want to delete?');"><i

                                                            class="fas fa-times text-orange-red" ></i>Delete</a>



                                                    <a class="dropdown-item" href="<?php echo $root.'/loginpanel/edit-student?login_id='.$row_data['login_id']; ?>" ><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>

                                                </div>

                                            </div>

                                        </td>

                                    </tr>

                                    <?php } ?>

                                    

                                </tbody>

                            </table>

                        </div>

                    </span>

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

                url:"student_search_ajax.php",

                datatype:'html',

                data:{student_name:name},

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
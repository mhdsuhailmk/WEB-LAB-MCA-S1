<?php

include '../dbconnection.php';

session_start();



if(!isset($_SESSION['login_id']))

{

    header("location: index");

}



$books_query = mysqli_query($con, "SELECT `book_id`,`book_name`, `author`, `shelf_no`, `price`, `book_edition`,`category_name` FROM book_details_tb JOIN category_tb ON category_tb.category_id = book_details_tb.category_id ORDER BY book_id ASC");



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

                                <h3>All Books</h3>

                            </div>

                             

                        </div>

                        <form class="mg-b-20">

                            <div class="row gutters-8">



                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">

                                <input type="text" placeholder="Search by Name ..." onkeyup="get_book(this.value)" class="form-control">

                                </div>



                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">

                                </div>

                                

                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">

                                </div>



                               

                            </div>

                        </form>

                        <span id="book_detail">

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

                                        <th>Category Name</th>

                                        <th>Book Name</th>

                                        <th>Author Name</th>

                                        <th>Shelf No</th>

                                        <th>Book Price</th>

                                        <th>Edition</th>

                                        <th>Action</th>     

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $i = 0; while($row_data = mysqli_fetch_assoc($books_query)) { $i++; ?>

                                    <tr>

                                        <td>

                                            <div class="form-check">

                                                <input type="checkbox" class="form-check-input">

                                                <label class="form-check-label"><?php echo $i; ?></label>

                                            </div>

                                        </td>                                        

                                        <td><?php echo $row_data['category_name']; ?></td>

                                        <td><?php echo $row_data['book_name']; ?></td>

                                        <td><?php echo $row_data['author']; ?></td>

                                        <td><?php echo $row_data['shelf_no']; ?></td>

                                        <td><?php echo $row_data['price']; ?></td>

                                        <td><?php echo $row_data['book_edition']; ?></td>



                                        <td>

                                            <div class="dropdown">

                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"

                                                    aria-expanded="false">

                                                    <span class="flaticon-more-button-of-three-dots"></span>

                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a class="dropdown-item" href="<?php echo $root.'/loginpanel/delete-book?book_id='.$row_data['book_id']; ?>" onclick="return confirm('Do you want to delete?');"><i

                                                            class="fas fa-times text-orange-red" ></i>Delete</a>



                                                    <a class="dropdown-item" href="<?php echo $root.'/loginpanel/edit-book?book_id='.$row_data['book_id']; ?>" ><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>

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

        function get_book(name)

        {

            jQuery.ajax(

            {

                type:"POST",

                url:"view_book_ajax.php",

                datatype:'html',

                data:{book_id:name},

                success:function(data)

                {

                    jQuery("#book_detail").html(data);

                },

                error:function(data)

                {

                    jQuery("#book_detail").html("failed");

                }



            });

        };

    </script>



</body>



</html>
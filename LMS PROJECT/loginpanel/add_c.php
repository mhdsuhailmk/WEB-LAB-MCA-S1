<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: ../index");
}

if(isset($_POST['add_categ']))
{
    $category_name = $_POST['category_name'];

    mysqli_query($con, "INSERT INTO category_tb (category_name) VALUES('$category_name')");

    echo "<script>alert('New category added successfully!');</script>";
    echo "<script>window.history.back();</script>";
}

?>
<!doctype html>
<html class="no-js" lang="">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 
<?php include ('includes/header.php'); ?>

<style type="text/css">
    span{color: red;}
</style>

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
                    <h3>Category</h3>
                    <ul>
                        <li>
                            <a href="dashboard">Home</a>
                        </li>
                        <li>Category</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->

                <div class="col-md-6 col-lg-6">
                <!-- Dashboard summery Start Here -->
                <div class="card height-auto">
                    
                        
                    <div class="card-body">                        
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Category</h3>
                            </div>
                            
                        </div>
                        <form class="new-added-form" autocomplete="off" method="post">
                            <div class="row">                                
                                <div class="col-md-12 col-lg-12 form-group">
                                    <label>Category Name <span id="categoryErr">*</span></label> 
                                    <input type="text" placeholder="Enter category name" id="category_name" name="category_name" class="form-control">
                                </div>     

                                <div class="col-12 form-group mg-t-8">
                                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save" name="add_categ" onclick="return categValid();" style="float: right;"> 
                                     
                                </div>
                            </div>
                        </form>
                    </div>
                
                
                <footer class="footer-wrap-layout1">
                    <div class="copyright"><a href="#">CET Library Management System</a></div>
                </footer>
                <!-- Footer Area End Here -->
            </div></div>


        </div>
        <!-- Page Area End Here -->
    </div></div>
    
    <?php include 'includes/scripts.php'; ?>

    <script type="text/javascript">
    function categValid()
    {
        var category = $("#category_name").val().trim();

        if(category == "")
        {
            $("#categoryErr").html("Category name required!");

            return false;
        }
    }
    </script>

</body>

</html>
<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

if(isset($_POST['add_stud']))
{
    $stud_name     = mysqli_real_escape_string($con, $_POST['student_name']);
    $stud_batch    = mysqli_real_escape_string($con, $_POST['batch_name']);
    $stud_duration = mysqli_real_escape_string($con, $_POST['duration']);
    $stud_phone    = mysqli_real_escape_string($con, $_POST['student_phone']);
    $stud_email    = mysqli_real_escape_string($con, $_POST['student_email']);
    $stud_photo    = mysqli_real_escape_string($con, $_FILES['student_photo']['name']);


    $stud_username = mysqli_real_escape_string($con, $_POST['student_uname']);
    $stud_password = mysqli_real_escape_string($con, $_POST['student_pass']);

    if($stud_photo!="")
    {
        $file_details       = pathinfo($stud_photo);
        $file_name          = strtolower(str_replace(" ", "_", $stud_name))."_".rand();
        $photo_file_name    = str_replace(".", "_", $file_name).'.'.$file_details['extension'];

        move_uploaded_file($_FILES['student_photo']['tmp_name'], "uploads/student/".$photo_file_name);

        mysqli_query($con, "INSERT INTO `login_tb`(`username`, `password`,`role`) VALUES ('$stud_username', '$stud_password', '2')");

        $stud_id  = mysqli_insert_id($con);

        mysqli_query($con, "INSERT INTO `student_details_tb`( `login_id`,`name`, `phone_no`, `mail_id`, `batch`, `duration`, `photo`) VALUES('$stud_id','$stud_name', '$stud_phone', '$stud_email', '$stud_batch', '$stud_duration', 
            '$photo_file_name')");        

        echo "<script>alert('Student details added successfully!');</script>";
        echo "<script>window.history.back();</script>";


        
        
    }   
    
    
}

?>
<!doctype html>
<html class="no-js" lang="">



 
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
                    <h3>Student Details</h3>
                    <ul>
                        <li>
                            <a href="dashboard">Home</a>
                        </li>
                        <li>Books</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->

                <div class="col-md-12 col-lg-12">
                <!-- Dashboard summery Start Here -->
                <div class="card height-auto">
                    
                        
                    <div class="card-body">                        
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add New Student</h3>
                            </div>
                            
                        </div>
                        <form enctype="multipart/form-data" class="new-added-form" autocomplete="off" method="post">
                            <div class="row">  

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Student Name <span id="studErr">*</span></label> 
                                    <input type="text" placeholder="Enter student name" id="student_name" name="student_name" onkeyup="clearErr('studErr');" class="form-control">
                                </div>  

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Batch <span id="batchErr">*</span></label> 
                                    <input type="text" placeholder="Enter batch details" id="batch_name" name="batch_name" onkeyup="clearErr('batchErr');" class="form-control">
                                </div>   

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Duration <span id="durationErr">*</span></label> 
                                    <input type="text" placeholder="Enter duration" id="duration" name="duration" onkeyup="clearErr('durationErr');" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Phone Number <span id="phoneErr">*</span></label> 
                                    <input type="number" placeholder="Enter phone number" id="student_phone" name="student_phone" onkeyup="clearErr('phoneErr');" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Email ID <span id="emailErr">*</span></label> 
                                    <input type="email" onkeyup="clearErr('emailErr');" placeholder="Enter email id" id="student_email" name="student_email" class="form-control">
                                </div> 
                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Photo <span id="photoErr">*</span></label> 
                                    <input type="file" onchange="clearErr('photoErr');"  id="student_photo" name="student_photo" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Username <span id="usernameErr">*</span></label> 
                                    <input type="text" onkeyup="clearErr('usernameErr');" placeholder="Enter username" id="student_uname" name="student_uname" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Password <span id="passwordErr">*</span></label> 
                                    <input type="password" onkeyup="clearErr('passwordErr');" placeholder="Enter password" id="student_pass" name="student_pass" class="form-control">
                                </div>
                                
                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Confirm Password <span id="passwordErr">*</span></label> 
                                    <input type="password" onkeyup="clearErr('passwordErr');" placeholder="Enter password" id="confirm_pass" name="confirm_pass" class="form-control">
                                </div>
                                
                                
<!--
                                <script>
                                    
                                    var p1=document.getElementById(student_pass).value;
                                    var p2=document.getElementById(confirm_pass).value;
                                    
                                    if(p1!=p2)
                                        {
                                            alert("Password and Confirm Password are not same");
                                        }
                                    
                                    
                                </script>
-->
                                
                                

                                <div class="col-12 form-group mg-t-8">
                                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save" name="add_stud" onclick="return studValid();" style="float: right;">
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
    function studValid()
    {
        var stud_name      = $("#student_name").val();
        var stud_batch     = $("#batch_name").val().trim();
        var stud_duration  = $("#duration").val().trim(); 
        var stud_phone     = $("#student_phone").val().trim(); 
        var stud_email     = $("#student_email").val().trim(); 
        var stud_photo     = $("#student_photo").val().trim(); 

        var stud_username  = $("#student_uname").val().trim();
        var stud_password  = $("#student_pass").val().trim();
        
                var conf_password  = $("#confirm_pass").val().trim();

        stud_phone = stud_phone.replace(/[^0-9]/g,'');

        if(stud_name == "")
        {
            $("#studErr").html("Student name required!");

            return false;
        }

        if(stud_batch=="")
        {
            $("#batchErr").html("Batch field required!");

            return false;
        }

        if(stud_duration == "")
        {
            $("#durationErr").html("Duration field required!");

            return false;
        }

        if(stud_phone == "" || stud_phone.length != 10)
        {
            $("#phoneErr").html("Valid phone number required!");

            return false;
        }

        if(stud_email =="")
        {
            $("#emailErr").html("Email field required!");

            return false;
        }

        if(!validateEmail(stud_email)) 
        {
            $("#emailErr").html("Enter a valid email id!");

            return false;
        }

        if(stud_photo == "")
        {
            $("#photoErr").html("Photo required!");

            return false;
        }

        if(stud_username == "")
        {
            $("#usernameErr").html("Username field required!");
            return false;
        }

        if(stud_password == "")
        {
            $("#passwordErr").html("Password field required!");
            return false;
        }
        
        
         if(stud_password != conf_password)
        {
            $("#passwordErr").html("Password and Confirm  Password fields are not matching!");
            return false;
        }
        
        
    }

    function clearErr(sp)
    {
        document.getElementById(sp).innerHTML = "";
    }

    function validateEmail($email) 
    {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    </script>

</body>

</html>
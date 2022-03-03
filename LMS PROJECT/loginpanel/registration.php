<?php
include '../dbconnection.php';
session_start();

if(isset($_SESSION['login_id']))
{
    header("location: dashboard");
}

if(isset($_POST['registerbtn']))
{
    $studPhotoFile = "";
    $student_name         = $_POST['stud_name'];
    $student_phone        = $_POST['stud_phone'];
    $student_email        = $_POST['stud_email'];
    $student_batch        = $_POST['stud_batch'];
    $student_duration     = $_POST['stud_duration'];
    $student_photo        = $_FILES['stud_photo']['name'];

    $student_username     = $_POST['stud_username'];
    $student_password     = $_POST['stud_password'];

    if($student_photo != "")
    {
        $photo_rray    = pathinfo($_FILES["stud_photo"]["name"]);
        $photo_name    = strtolower(str_replace(" ", "_", $student_name))."_".rand();
        $new_photo_name = str_replace(".", "_", $photo_name);

        $file_ext      = $photo_rray["extension"];

        $studPhotoFile = $new_photo_name.".".$file_ext;

        mysqli_query($con, "INSERT INTO login_tb (username, password,role) VALUES('$student_username', '$student_password', '2')");

        $student_id = mysqli_insert_id($con);

        mysqli_query($con, "INSERT INTO student_details_tb (`login_id`,`name`, `phone_no`, `mail_id`, `batch`, `duration`, `photo`) VALUES ( '$student_id','$student_name', '$student_phone', '$student_email', '$student_batch', '$student_duration', '$studPhotoFile')");

        move_uploaded_file($_FILES["stud_photo"]["tmp_name"], "uploads/student/".$studPhotoFile);

        header("location: index");
    }

    else
    {
       
       

        mysqli_query($con, "INSERT INTO login_tb (username, password, role) VALUES($student_username', '$student_password', '2')");

         $student_id = mysqli_insert_id($con);

         mysqli_query($con, "INSERT INTO student_details_tb (`name`,`login_id`,`phone_no`, `mail_id`, `batch`, `duration`) VALUES ('$student_name','$student_id','$student_phone', '$student_email', '$student_batch', '$student_duration')");


        header("location: index");
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
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">

            <h3>Registration Form</h3>
            <div class="container login-box">

                <div class="item-logo">
                    <img src="img/logo.png" alt="logo">
                </div>

                <form class="login-form" autocomplete="off" enctype="multipart/form-data" method="post">

                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Student Name</label> <span id="nameErr"></span>
                        <input type="text" placeholder="Enter name" name="stud_name" id="stud_name" class="form-control" onkeyup="clearErr('nameErr');">
                        <i class="far fa-user"></i>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Phone No</label> <span id="phoneErr"></span>
                        <input type="text" placeholder="Enter phone number" name="stud_phone" id="stud_phone" class="form-control" onkeyup="clearErr('phoneErr');">
                        <i class="fa fa-phone"></i>
                    </div></div></div>

                    <div class="row">
                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Email ID</label> <span id="emailErr"></span>
                        <input type="email" placeholder="Enter email id" name="stud_email" id="stud_email" class="form-control" onkeyup="clearErr('emailErr');">
                        <i class="far fa-envelope"></i>
                    </div></div>

                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Batch</label> <span id="batchErr"></span>
                        <input type="text" placeholder="Enter batch" name="stud_batch" id="stud_batch" class="form-control" onkeyup="clearErr('batchErr');">
                        <i class="fal fa-equals"></i>
                    </div></div>
                    </div>

                    <div class="row">
                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Duration</label> <span id="durationErr"></span>
                        <input type="text" placeholder="Enter duration" name="stud_duration" id="stud_duration" class="form-control" onkeyup="clearErr('durationErr');">
                       <i class="fas fa-layer-group"></i>
                    </div></div>

                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Photo</label> <span id="photoErr"></span>
                        <input type="file" name="stud_photo" onchange="clearErr('photoErr');" id="stud_photo" class="form-control">
                        <i class="far fa-image"></i>
                    </div></div>
                    </div>

                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Username</label> <span id="usernameErr"></span>
                        <input type="text" placeholder="Enter usrename" name="stud_username" id="stud_username" class="form-control" onkeyup="clearErr('usernameErr');">
                        <i class="far fa-eye"></i>
                    </div></div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label>Password</label> <span id="passwordErr"></span>
                        <input type="text" placeholder="Enter password" id="stud_password" name="stud_password" class="form-control" onkeyup="clearErr('passwordErr');">
                        <i class="fas fa-lock"></i>
                    </div></div></div>
                    
                    
                    
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label>Confirm Password</label> <span id="passwordErr"></span>
                        <input type="text" placeholder="Enter password" id="conf_password" name="conf_password" class="form-control" onkeyup="clearErr('passwordErr');">
                        <i class="fas fa-lock"></i>
                    </div></div></div>
                    
                    
                    
                    
                    
                    
                    

                    <!-- <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">                             
                        </div>
                        <a href="#" class="forgot-btn">Forgot Password?</a>
                    </div> -->
                    <div class="form-group">
                        <input type="submit" onclick="return registerValid();" name="registerbtn" class="login-btn" value="Register"> 
                    </div>
                    
                </form>
                 
            </div>
            <div class="sign-up">Already registered ? <a href="index.php">Sign In!</a></div>
        </div>
    </div>
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

    <script type="text/javascript">
        function registerValid()
        {
            var name  = $("#stud_name").val().trim();
            var phone = $("#stud_phone").val().trim();

            phone     = phone.replace(/[^0-9]/g,'');

            var file_name = $("#stud_photo").val();
           
            var email = $("#stud_email").val().trim();
            var batch = $("#stud_batch").val().trim();
            var duration = $("#stud_duration").val().trim();


            var username = $("#stud_username").val().trim();
            var password = $("#stud_password").val().trim();
            
             var conf_password = $("#conf_password").val().trim();

            if(name == "")
            {
                $("#nameErr").html("Name field required!");

                return false;
            }

            if(phone == "")
            {
                $("#phoneErr").html("Phone number field required!");

                return false;
            }

            if (phone.length != 10)
            {                 
                $('#phoneErr').html("Valid phone number required!");
                $('#stud_phone').focus();

                return false;
            }

            if(email == "")
            {
                $("#emailErr").html("Email field required!");

                return false;
            }

            if(email.indexOf("@")==-1 || email.indexOf(".")==-1)
            {
                $("#emailErr").html("Valid email id required!");

                return false;
            }

            if(batch == "")
            {
                $("#batchErr").html("Batch field required!");

                return false;
            }

            if(duration == "")
            {
                $("#durationErr").html("Duration field required!");

                return false;
            }

            if(file_name=="")
            {
                $("#photoErr").html("Photo required!");

                return false;
            }
            

            if(username == "")
            {
                $("#usernameErr").html("Username field required!");

                return false;
            }

            if(password == "")
            {
                $("#passwordErr").html("Password field required!");

                return false;
            }
            
            
             if(password != conf_password )
            {
                $("#passwordErr").html("Password and Confirm password fields are not matching!");

                return false;
            }
            
            
            

        }

        function clearErr(sp)
        {
            document.getElementById(sp).innerHTML = "";

        }
    </script>

</body>


 </html>
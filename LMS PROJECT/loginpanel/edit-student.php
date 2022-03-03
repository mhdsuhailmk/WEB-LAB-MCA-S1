<?php
include '../dbconnection.php';
session_start();
$user_id=$_GET['login_id'];

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$student_details1=mysqli_query($con,"SELECT * from student_details_tb where login_id='$user_id'");
$student_data1=mysqli_fetch_assoc($student_details1);
$student_details2=mysqli_query($con,"SELECT * from login_tb where login_id='$user_id'");
$student_data2=mysqli_fetch_assoc($student_details2);

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

        mysqli_query($con, "UPDATE login_tb set username='$stud_username',password='$stud_password' where login_id='$user_id'");


        mysqli_query($con, "UPDATE `student_details_tb` SET `name`='$stud_name',`phone_no`='$stud_phone',`mail_id`='$stud_email',`batch`=' $stud_batch',`duration`='$stud_duration',`photo`='$stud_photo' where login_id='$user_id'");   
        unlink('uploads/student/'.$student_data1['photo']);     

        echo "<script>alert('Student details successfully updated!');</script>";
        echo "<script>window.history.back();</script>";
    }
    else
    {
        mysqli_query($con, "UPDATE login_tb SET username='$stud_username',password='$stud_password' where login_id='$user_id'");


        mysqli_query($con, "UPDATE `student_details_tb` SET `name`='$stud_name',`phone_no`='$stud_phone',`mail_id`='$stud_email',`batch`=' $stud_batch',`duration`='$stud_duration' where login_id='$user_id'");
        

        echo "<script>alert('Student details successfully updated!');</script>";
        echo "<script>window.history.back();</script>";

    } 
       
 
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
                                    <input type="text" placeholder="Enter student name" id="student_name" name="student_name" value="<?php echo $student_data1['name'] ?>" onkeyup="clearErr('studErr');" class="form-control">
                                </div>  

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Batch <span id="batchErr">*</span></label> 
                                    <input type="text" placeholder="Enter batch details" id="batch_name" name="batch_name" 
                                     value="<?php echo $student_data1['batch'] ?>" onkeyup="clearErr('batchErr');" class="form-control">
                                </div>   

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Duration <span id="durationErr">*</span></label> 
                                    <input type="text" placeholder="Enter duration" id="duration" name="duration" 
                                     value="<?php echo $student_data1['duration'] ?>" onkeyup="clearErr('durationErr');" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Phone Number <span id="phoneErr">*</span></label> 
                                    <input type="number" placeholder="Enter phone number" id="student_phone" name="student_phone"  value="<?php echo $student_data1['phone_no'] ?>" onkeyup="clearErr('phoneErr');" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Email ID <span id="emailErr">*</span></label> 
                                    <input type="email" onkeyup="clearErr('emailErr');" placeholder="Enter quantity" id="student_email"  value="<?php echo $student_data1['mail_id'] ?>" name="student_email" class="form-control">
                                </div> 
                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Photo <span id="photoErr">*</span></label> 
                                    <input type="file" onchange="clearErr('photoErr');"  id="student_photo" name="student_photo"  value="<?php echo $student_data1['photo'] ?>" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Username <span id="usernameErr">*</span></label> 
                                    <input type="text" onkeyup="clearErr('usernameErr');" placeholder="Enter username" id="student_uname" value="<?php echo $student_data2['username'] ?>" name="student_uname" class="form-control">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Password <span id="passwordErr">*</span></label> 
                                    <input type="password" onkeyup="clearErr('passwordErr');" placeholder="Enter password" id="student_pass" value="<?php echo $student_data2['password'] ?>" name="student_pass" class="form-control">
                                </div>

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

        // if(stud_photo == "")
        // {
        //     $("#photoErr").html("Photo required!");

        //     return false;
        // }

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
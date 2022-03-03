<?php
include '../dbconnection.php';
session_start();

if(isset($_SESSION['login_id']))
{
    header("location: dashboard");
}

if(isset($_POST['loginbtn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $qryLogin = mysqli_query($con, "SELECT * FROM login_tb WHERE username = '$username' AND password = '$password'");

    if(mysqli_num_rows($qryLogin) > 0)
    {
        $login_data = mysqli_fetch_assoc($qryLogin);

        $login_id = $login_data['login_id'];

        $_SESSION['login_id'] = $login_id;
        $_SESSION['username'] = $login_data['username'];
        $_SESSION['role']     = $login_data['role'];

        header("location: dashboard.php");
    }

    else
    {
        $_SESSION['loginErr'] = "Invalid user credentials!";

        header("location: index.php");
    }
}

?>

<!doctype html>
<html class="no-js" lang="">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php include ('includes/header.php'); ?>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <a href="../../loginpanel/login.php"><img src="img/logo.png" alt="logo"></a>
                </div>
                <form class="login-form" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Enter usrename" name="username" id="username" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" name="password" id="password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <!-- <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">                             
                        </div>
                        <a href="#" class="forgot-btn">Forgot Password?</a>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" name="loginbtn" class="login-btn">Login</button>
                    </div>

                    <?php if(isset($_SESSION['loginErr'])) { ?>
                    <div class="form-group">
                    <span style="color: red;"><?php echo $_SESSION['loginErr']; ?></span>
                    </div>
                    <?php } ?>
                
                </form>                 
            </div>
            <div class="sign-up">Don't have an account ? <a href="registration">Signup now!</a></div>
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

</body>


 </html>
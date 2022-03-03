<?php 

$root_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?

                "https" : "http") . "://" . $_SERVER['HTTP_HOST'].'/myajas/LibraryManagement/';

 $root = $root_url;

$login_id=$_SESSION['login_id'];

$query=mysqli_query($con,"SELECT * from collection_tb where login_id='$login_id' and status=1");

$flag=0;

while($row_data=mysqli_fetch_assoc($query))

{

    $date_taken=$row_data['date_of_collection'];

    $date_return=date("y-m-d");

    $start_date = strtotime($date_taken); 

    $end_date = strtotime($date_return); 

    $date_diff=($end_date - $start_date);

    $fine=(round($date_diff / (60 * 60 * 24)))-15;

    if($fine>0)

    {

        $flag=$flag+1;

    }

}



?>

<div class="navbar navbar-expand-md header-menu-one bg-light">

            <div class="nav-bar-header-one">

                <div class="header-logo">

                    <a href="<?php echo $root.'/loginpanel/dashboard'; ?>">

<!--                        <img src="//<?php echo $root.'img/logo.png'; ?>" alt="logo">-->
                        
                        
                        <img src="img/logo.png" alt="logo">
                    </a>

                </div>

                 <div class="toggle-button sidebar-toggle">

                    <button type="button" class="item-link">

                        <span class="btn-icon-wrap">

                            <span></span>

                            <span></span>

                            <span></span>

                        </span>

                    </button>

                </div>

            </div>

            <div class="d-md-none mobile-nav-bar">

               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">

                    <i class="far fa-arrow-alt-circle-down"></i>

                </button>

                <button type="button" class="navbar-toggler sidebar-toggle-mobile">

                    <i class="fas fa-bars"></i>

                </button>

            </div>

            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">

                <ul class="navbar-nav">

                    <!-- <li class="navbar-item header-search-bar">

                        <div class="input-group stylish-input-group">

                            <span class="input-group-addon">

                                <button type="submit">

                                    <span class="flaticon-search" aria-hidden="true"></span>

                                </button>

                            </span>

                            <input type="text" class="form-control" placeholder="Find Something . . .">

                        </div>

                    </li> -->

                </ul>

                <ul class="navbar-nav">


<!--
                	<?php 

                                if($_SESSION['role'] != '0') 

                                {  ?>
                    <li class="navbar-item dropdown header-notification">

                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"

                            aria-expanded="false">

                            <i class="far fa-bell"></i>

                            <div class="item-title d-md-none text-16 mg-l-10">Notification</div>

                            <?php

                            if($flag>0)

                            {

                            ?>

                            <span>new</span>

                            <?php

                             }

                            ?>

                        </a>



                        <div class="dropdown-menu dropdown-menu-right">

                            <div class="item-header">

                                <h6 class="item-title"></h6>

                            </div>

                            <div class="item-content">

                                <div class="media">

                                    <div class="item-icon bg-skyblue">

                                        <i class="fas fa-check"></i>

                                    </div>

                                    <div class="media-body space-sm">

                                        <div class="post-title">Fine generated </div>

                                        <span><a href="collected_books">Click</a></span>

                                    </div>

                                </div>

                                 

                                

                            </div>

                        </div>

                    </li> <?php } ?>
-->



                    <li class="navbar-item dropdown header-admin">

                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"

                            aria-expanded="false">

                            <div class="admin-title">

                                <h5 class="item-title">

                                <?php 

                                if($_SESSION['role'] == '0') 

                                { 

                                    echo "Admin"; ?> <?php 

                                } 

                                elseif($_SESSION['role'] =='1') 

                                    { 

                                        echo "Teacher"; ?> <?php 

                                    } 

                                    elseif($_SESSION['role'] =='2') 

                                    { 

                                        echo "Student"; ?> <?php  

                                    } 

                                ?> 

                                </h5>

                                <span>&nbsp;</span>

                            </div>

                            <div class="admin-img">

<!--                                <img src="<?php echo $root.'/loginpanel/img/figure/admin.jpg'; ?>" >-->
                                                                <img src="img/figure/admin.jpg" >

                            </div>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right">

                            <div class="item-header">

                                <h6 class="item-title"><?php echo "Username: ". $_SESSION['username']; ?></h6>

                            </div>

                            <div class="item-content">

                                <ul class="settings-list">

                                    <!-- <li><a href="manage-profile"><i class="flaticon-user"></i>My Profile</a></li> -->

                                    <li><a href="logout"><i class="flaticon-turn-off"></i>Logout</a></li>

                                </ul>

                            </div>

                        </div>

                    </li>

                      

                </ul>

            </div>

        </div>
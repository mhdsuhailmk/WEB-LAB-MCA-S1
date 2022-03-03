
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="dashboard.php"><img src="img/logos.png" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <?php

                        if($_SESSION['role'] == '0')
                        {
                        ?>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Manage Categories</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="add_c.php" class="nav-link"><i class="fas fa-angle-right"></i>Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-category.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>View Category</a>
                                </li>                                
                            </ul>
                        </li>
                         <!-- <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Notification</span></a>
                            <ul class="nav sub-group-menu">
                            
                                <li class="nav-item">
                                    <a href="view_notification.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>View Notification</a>
                                </li>                                
                            </ul>
                        </li> -->
                        <li class="nav-item sidebar-nav-item">
                            <a href="" class="nav-link"><i class="flaticon-calendar"></i><span>Manage Books</span></a>

                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="add-books.php" class="nav-link"><i class="fas fa-angle-right"></i>Add Books</a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-books.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>View Books</a>
                                </li>
                                
                                <!--
                                <li class="nav-item">
                                    <a href="add-reference-book.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Add Reference Books</a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-reference-book.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>View Reference Books</a>
                                </li>

                             EDITED ON 28.2.22.21.21
                             -->

                            </ul>

                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="" class="nav-link"><i class="flaticon-calendar"></i><span>Manage Students</span></a>

                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="add-students.php" class="nav-link"><i class="fas fa-angle-right"></i>Add Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-students.php" class="nav-link"><i class="fas fa-angle-right"></i>View Students</a>
                                </li>                                
                            </ul>
                        </li>
                        
                        
                        <!--

                        <li class="nav-item sidebar-nav-item">
                            <a href="" class="nav-link"><i class="flaticon-calendar"></i><span>Manage Teachers</span></a>

                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="add-teacher.php" class="nav-link"><i class="fas fa-angle-right"></i>Add Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-teachers.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>View Teachers</a>
                                </li>                                
                            </ul>
                        </li>
EDITED ON 28.2.22 

-->
                        <li class="nav-item sidebar-nav-item">
                            <a href="" class="nav-link"><i class="flaticon-calendar"></i><span>Manage library</span></a>

                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="search-book.php" class="nav-link"><i class="fas fa-angle-right"></i>Search_Book</a>
                                </li>
                                <li class="nav-item">
                                    <a href="add_to_entry_book.php" class="nav-link"><i class="fas fa-angle-right"></i>Add To Entry Book</a>
                                </li>
                                <li class="nav-item">
                                    <a href="view_entry_book.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Students Entry Book</a>
                                </li>
                                
                                <!--
                                <li class="nav-item">
                                    <a href="view_teachers_entry_book.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Teachers Entry Book</a>
                                </li> 
                               EDITED ON 28.2.22
                               -->
                             
                                 <li class="nav-item">
                                    <a href="view_students_reserved_book.php" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Students Reserved Book</a>
                                </li>
                                
                                

                        <?php
                        }
                        if($_SESSION['role'] == '1')
                        {
                        ?>
                                
                                
                                
                                

                                
                                
                         <?php
                        }
                        if($_SESSION['role'] == '2')
                        {
                        ?>
                        <li class="nav-item sidebar-nav-item">
                            <a href="" class="nav-link"><i class="flaticon-calendar"></i><span>Books</span></a>

                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="search-book.php" class="nav-link">
                                        <i class="fas fa-angle-right"></i>Search</a>
                                </li>
                                <li class="nav-item">
                                    <a href="reserved_books.php" class="nav-link">
                                        <i class="fas fa-angle-right"></i>Reserved</a>
                                </li>
                                <li class="nav-item">
                                    <a href="collected_books.php" class="nav-link">
                                        <i class="fas fa-angle-right"></i>Collected</a>
                                </li>
                               
                                                                
                            </ul>
                        </li>
                         <?php
                        }
                    
                       ?> 

                        
                    </ul>
                    
                </div>
            </div>
<?php

//$root_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
//                "https" : "http") . "://" . $_SERVER['HTTP_HOST'].'/ccsit_vadakara/Library_Management';
// $root = $root_url;



include '../dbconnection.php';

session_start();



if(!isset($_SESSION['login_id']))

{

    header("location: index");

}



$sname=$_POST['book_id'];

$books_query="";



if ($sname) 

{

	$books_query = mysqli_query($con, "SELECT `book_id`,`book_name`, `author`, `shelf_no`, `price`, `book_edition`,`category_name` FROM book_details_tb JOIN category_tb ON category_tb.category_id = book_details_tb.category_id where book_id like '%$sname%' or  category_tb.category_name like '%$sname%' or book_name like '%$sname%' or author like '%$sname%' ORDER BY book_id ASC");



}

else

{

$books_query = mysqli_query($con, "SELECT `book_id`,`book_name`, `author`, `shelf_no`, `price`, `book_edition`,`category_name` FROM book_details_tb JOIN category_tb ON category_tb.category_id = book_details_tb.category_id ORDER BY book_id ASC");	

}

?>



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
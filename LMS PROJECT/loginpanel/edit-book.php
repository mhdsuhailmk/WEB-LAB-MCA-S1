<?php
include '../dbconnection.php';
session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$book_id = $_GET['book_id'];

if(isset($_POST['upd_book']))
{
    $category_id   = mysqli_real_escape_string($con, $_POST['sel_category']);
    $book_name     = mysqli_real_escape_string($con, $_POST['book_name']);
    $author_name   = mysqli_real_escape_string($con, $_POST['author_name']);
    $shelf_number  = mysqli_real_escape_string($con, $_POST['shelf_no']);
    $book_price    = mysqli_real_escape_string($con, $_POST['book_price']);
    $book_quantity = mysqli_real_escape_string($con, $_POST['book_qty']);

    mysqli_query($con, "UPDATE `book_details_tb` SET category_id = '$category_id' , book_name = '$book_name', author = '$author_name', shelf_no = '$shelf_number', price = '$book_price', book_edition = '$book_quantity' WHERE book_id = '$book_id'");

    echo "<script>alert('Book details updated successfully!');</script>";
    echo "<script>window.history.back();</script>";
}

$categ_query = mysqli_query($con, "SELECT * FROM category_tb ORDER BY category_name ASC");
$book_qry    = mysqli_query($con, "SELECT `book_id`, category_tb.category_id, `book_name`, `author`, `shelf_no`, `price`, `book_edition`,`category_name` FROM book_details_tb JOIN category_tb ON category_tb.category_id = book_details_tb.category_id WHERE book_id = '$book_id'");

$book_data   = mysqli_fetch_assoc($book_qry);

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
                    <h3>Book Details</h3>
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
                                <h3>Update Book Details</h3>
                            </div>
                            
                        </div>
                        <form class="new-added-form" autocomplete="off" method="post">
                            <div class="row">  

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Category Name <span id="categErr">*</span></label> 
                                    <select id="sel_category" name="sel_category" onchange="clearErr('categErr');" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php while ($row_data = mysqli_fetch_assoc($categ_query)) 
                                        {                                        
                                        ?>
                                        <option value="<?php echo $row_data['category_id']; ?>" <?php if($row_data['category_id'] == $book_data['category_id']) { ?> selected <?php } ?>><?php echo $row_data['category_name']; ?></option>    
                                        <?php } ?>        
                                    </select>
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Book Name <span id="bookErr">*</span></label> 
                                    <input type="text" placeholder="Enter book name" id="book_name" name="book_name" onkeyup="clearErr('bookErr');" class="form-control" value="<?php echo $book_data['book_name']; ?>">
                                </div>  

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Author Name <span id="authErr">*</span></label> 
                                    <input type="text" placeholder="Enter author name" id="author_name" name="author_name" onkeyup="clearErr('authErr');" class="form-control" value="<?php echo $book_data['author']; ?>">
                                </div>   

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Shelf Number <span id="shelfErr">*</span></label> 
                                    <input type="number" placeholder="Enter shelf number" id="shelf_no" name="shelf_no" onkeyup="clearErr('shelfErr');" class="form-control" value="<?php echo $book_data['shelf_no']; ?>">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Book Price <span id="priceErr">*</span></label> 
                                    <input type="number" placeholder="Enter book price" id="book_price" name="book_price" onkeyup="clearErr('priceErr');" class="form-control" value="<?php echo $book_data['price']; ?>">
                                </div> 

                                <div class="col-md-6 col-lg-6 form-group">
                                    <label>Book edition <span id="qtyErr">*</span></label> 
                                    <input type="number" onkeyup="clearErr('qtyErr');" placeholder="Enter edition" id="book_qty" value="<?php echo $book_data['book_edition']; ?>" name="book_qty" class="form-control">
                                </div> 

                                <div class="col-12 form-group mg-t-8">
                                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update" name="upd_book" onclick="return bookValid();" style="float: right;"> 
                                     
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
    function bookValid()
    {
        var category      = $("#sel_category").val();
        var book_name     = $("#book_name").val().trim();
        var author_name   = $("#author_name").val().trim(); 
        var shelf_no      = $("#shelf_no").val().trim(); 
        var book_price    = $("#book_price").val().trim(); 
        var book_quantity = $("#book_qty").val().trim(); 

        if(category == "")
        {
            $("#categErr").html("Please select a category!");

            return false;
        }

        if(book_name=="")
        {
            $("#bookErr").html("Book name required!");

            return false;
        }

        if(author_name == "")
        {
            $("#authErr").html("Author name required!");

            return false;
        }

        if(shelf_no == "")
        {
            $("#shelfErr").html("Shelf number required!");

            return false;
        }

        if(book_price =="")
        {
            $("#priceErr").html("Price field required!");

            return false;
        }

        if(book_quantity == "")
        {
            $("#qtyErr").html("Quantity filed required!");

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
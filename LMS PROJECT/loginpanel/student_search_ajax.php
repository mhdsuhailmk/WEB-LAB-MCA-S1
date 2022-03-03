<?php

include '../dbconnection.php';



$sname=$_POST['student_name'];

$student_query="";



if ($sname) 

{

$student_query=mysqli_query($con, "SELECT * from student_details_tb where name like '%$sname%' or phone_no like '%$sname%' or mail_id like '%$sname%'");	

}

else

{

$student_query=mysqli_query($con, "SELECT * from student_details_tb");	

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

                                        <th>Student Name</th>

                                        <th>Phone</th>

                                        <th>Email</th>

                                        <th>Batch</th>

                                        <th>Duration</th>

                                        <th>Photo</th>

                                        <th>Action</th>     

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $i = 0; while($row_data = mysqli_fetch_assoc($student_query)) { $i++; ?>

                                    <tr>

                                        <td>

                                            <div class="form-check">

                                                <input type="checkbox" class="form-check-input">

                                                <label class="form-check-label"><?php echo $i; ?></label>

                                            </div>

                                        </td>                                        

                                        <td><?php echo $row_data['name']; ?></td>

                                        <td><?php echo $row_data['phone_no']; ?></td>

                                        <td><?php echo $row_data['mail_id']; ?></td>

                                        <td><?php echo $row_data['batch']; ?></td>

                                        <td><?php echo $row_data['duration']; ?></td>

                                        <td><img src="uploads/student/<?php echo $row_data['photo'];?>" width="100px" height="70px"></td>





                                        <td>

                                            <div class="dropdown">

                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"

                                                    aria-expanded="false">

                                                    <span class="flaticon-more-button-of-three-dots"></span>

                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a class="dropdown-item" href="<?php echo $root.'/loginpanel/delete-student?login_id='.$row_data['login_id']; ?>" onclick="return confirm('Do you want to delete?');"><i

                                                            class="fas fa-times text-orange-red" ></i>Delete</a>



                                                    <a class="dropdown-item" href="<?php echo $root.'/loginpanel/edit-student?login_id='.$row_data['login_id']; ?>" ><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>

                                                </div>

                                            </div>

                                        </td>

                                    </tr>

                                    <?php } ?>

                                    

                                </tbody>

                            </table>

                        </div>
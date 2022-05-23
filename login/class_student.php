<?php
$get_id = $_GET['id'];

include('header2.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from student where student_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
?>

<?php
$query_class = mysqli_query($conn,"select * from class where class_id='$get_id'") or die(mysqli_error());
$row_class = mysqli_fetch_array($query_class);
$teacher_id = $row_class['teacher_id'];

$teacher_query=mysqli_query($conn,"select *from teacher where teacher_id='$teacher_id'")or die(mysqli_error());
$teacher_row=  mysqli_fetch_array($teacher_query);
?>
<body>

    <?php include('navhead_student.php'); ?>

    <div class="container">
        <div class="row-fluid">

            <div class="span12">

                <a href="student_class.php" class="btn btn-info"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                <br><br>
                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <strong>&nbsp;Class Content</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Lession Name</th>
                                <th>Learning Tropics</th>
                                <th>Quiz/Lession Test</th>
                                <th>Assingment</th>
                                <th>Previous Q/A Marks</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn,"select * from files where class_id = '$get_id'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $file_id = $row['file_id'];
                                ?>
                                <tr class="odd gradeX">


                            <script type="text/javascript">
                                $(document).ready(function(){
                                                                    
                                    $('#d<?php echo $file_id; ?>').tooltip('show')
                                    $('#d<?php echo $file_id; ?>').tooltip('hide')
                                });
                            </script>


                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['fdesc']; ?></td>      
                            <td><a href="<?php echo $row['ftest'] ?>">Check for Test</a></td>       
                            <td><a href="<?php echo $row['fassingment'] ?>">Check for Assingment</a></td> 
                            <td><?php echo $row['fmarks']; ?></td>      
                            <td><?php echo $row['fdatein']; ?></td>
                            <td width="50">
                                <a href="<?php echo $row['floc']; ?>" rel="tooltip"  title="View File" id="d<?php echo $file_id; ?>"  role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-eye-open icon-large"></i></a>

                            </td>


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
</div>
</div>






</body>
</html>



<?php
$get_id = $_GET['id'];
include('header2.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);

$course_query = mysqli_query($conn,"select * from class where teacher_id='$session_id' and class_id='$get_id'") or die(mysqli_error());
$course_row = mysqli_fetch_array($course_query);
$course_id = $course_row['course_id'];
?>
<?php
$query_class = mysqli_query($conn,"select * from class where teacher_id='$session_id' and class_id='$get_id'") or die(mysqli_error());
$row_class = mysqli_fetch_array($query_class);
$id_class = $row_class['class_id'];
?>
<body>

    <?php include('navhead_user.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">

                <div class="hero-unit-3">
                    <ul class="nav  nav-pills nav-stacked">


                        <li><a href="teacher_home.php"><i class="icon-home icon-large"></i>&nbsp;&nbsp;&nbsp;Home
                            </a></li>

                        <li><a href="teacher_class.php"><i class="icon-list-alt icon-large"></i>&nbsp;&nbsp; Class</a>                
                        </li>

                        <li><a href="teacher_subject.php"><i class="icon-book icon-large"></i>&nbsp;&nbsp; Subject</a>                
                        </li>

                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;&nbsp; Student</a>                
                        </li>

                    </ul>
                </div>


                <br>

            </div>


            <div class="span9">
                <a href="teacher_class.php" class="btn btn-info"><i class="icon-arrow-left"></i>&nbsp;Back</a>
                <br><br>


                <div class="hero-unit-3">
                    <div class="alert alert-info">
                    <strong>&nbsp;<?php echo $course_row['subject_id']; ?></strong>
                    </div>

                    <div class="row-fluid">
                        <div class="span7">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <a href="add_student.php<?php echo '?id=' . $id_class; ?>" class="btn btn-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Student</a>
                                <br><br>
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from sws where cys = '$course_id' and class_id='$get_id'") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['sws_id'];
                                        $student_id = $row['student_id'];

                                        $student_query = mysqli_query($conn,"select * from student where student_id='$student_id'") or die(mysqli_error());
                                        $student_row = mysqli_fetch_array($student_query);
                                        ?>
                                        <tr class="odd gradeX">

                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#e<?php echo $student_id; ?>').tooltip('show')
                                            $('#e<?php echo $student_id; ?>').tooltip('hide')
                                        });
                                    </script>

                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#d<?php echo $student_id; ?>').tooltip('show')
                                            $('#d<?php echo $student_id; ?>').tooltip('hide')
                                        });
                                    </script>

                                    <td width="50"><img class="img-rounded" src="<?php echo $student_row['location']; ?>" height="50" width="50"></td>
                                    <td><a href="">&nbsp;<i class="icon-user icon-large"></i>&nbsp;<?php echo $student_row['firstname'] . " " . $student_row['lastname']; ?></a></td>


                                    <td width="50">



                                        <a rel="tooltip"  title="Delete Student" id="d<?php echo $student_id; ?>" href="#delete<?php echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-trash icon-large"></i></a>
                                    </td>

                                    <div id="delete<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-info">Are you sure want to <strong>Delete</strong>&nbsp;this Student?</div>
                                        </div>
                                        <div class="modal-footer">

                                            <form method="post" action="delete_student1.php">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                <input type="hidden" name="class_id" value="<?php echo $id_class; ?>">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

                                                <button class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="span5">


                            <a href="upload.php<?php echo '?id=' . $id_class; ?>" class="btn btn-info"><i class="icon-upload"></i>&nbsp;Upload a File</a>
                            <br><br>
                            <div class="alert alert-info"><i class="icon-file icon-large"></i>&nbsp;Uploaded Files</div>
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $file_query = mysqli_query($conn,"select * from files where class_id='$id_class'") or die(mysqli_error());
                                    while ($file_row = mysqli_fetch_array($file_query)) {
                                        $file_id = $file_row['file_id'];
                                        ?>

                                    
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#d<?php echo $file_id; ?>').tooltip('show')
                                            $('#d<?php echo $file_id; ?>').tooltip('hide')
                                        });
                                    </script>


                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                                                                                
                                            $('#de<?php echo $file_id; ?>').tooltip('show')
                                            $('#de<?php echo $file_id; ?>').tooltip('hide')
                                        });
                                    </script>


                                    <tr>
                                        <td><?php echo $file_row['fname']; ?>&nbsp;<i class="icon-file"></i></td>
                                        <td width="90">
                                            <a rel="tooltip"  title="Delete File" id="d<?php echo $file_id; ?>" href="#delete<?php echo $file_id; ?>" role="button"  data-toggle="modal"class="btn btn-info"><i class="icon-trash icon-large"></i></a>
                                            <a rel="tooltip"  title="View File" id="de<?php echo $file_id; ?>" href="<?php echo $file_row['floc']; ?>" role="button"  data-toggle="modal"class="btn btn-info"><i class="icon-trash icon-eye-open"></i></a>
                                        </td>
                                    </tr>

                                    <div id="delete<?php echo $file_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-info">Are you sure want to <strong>Delete</strong>&nbsp;this File?</div>
                                        </div>
                                        <div class="modal-footer">

                                            <form method="post" action="delete_file.php">
                                                <input type="hidden" name="file_id" value="<?php echo $file_id; ?>">
                                                <input type="hidden" name="class_id" value="<?php echo $id_class; ?>">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

                                                <button class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>






</body>
</html>



<?php include('header2.php'); ?>
<?php include('session.php'); ?>
<body>


<?php include('navbar.php'); ?>

     <div class="container">

         <div class="row-fluid">

            <div class="span3">

                <div class="hero-unit-3">
                    <ul class="nav  nav-pills nav-stacked">


                        <li><a href="home.php"><i class="icon-home icon-large"></i>&nbsp;&nbsp;&nbsp;Home
                            </a></li>

                        <li><a href="file.php" role="button"><i class="icon-folder-open icon-large"></i>&nbsp;&nbsp;File
                            </a></li>

                        <li><a href="course.php"><i class="icon-tag icon-large"></i>&nbsp;&nbsp;Course
                            </a>                
                        </li>

                        <li><a  href="subject.php" role="button"><i class="icon-book icon-large"></i>&nbsp;&nbsp;Subject
                            </a></li>

                        <li><a href="department.php" role="button"><i class="icon-hospital icon-large"></i>&nbsp;&nbsp;Department
                            </a></li>

                        <li><a href="student.php" role="button"><i class="icon-group icon-large"></i>&nbsp;&nbsp;Student
                            </a></li>

                        <li><a href="teacher.php" role="button"><i class="icon-user icon-large"></i>&nbsp;&nbsp;Teacher
                            </a></li>

                        <li><a href="user.php" role="button"><i class="icon-user-md icon-large"></i>&nbsp;&nbsp;User
                            </a></li>

                        <li><a href="logout.php" role="button"><i class="icon-signout icon-large"></i>&nbsp;&nbsp;Logout
                            </a></li>

                    </ul>
                </div>

                <br>

            </div>

                    <div class="span9">
                        <div class="hero-unit-3">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <strong>Files</strong>
                                </div>
                                <thead>
                                    <tr>


                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Date Upload</th>
                                        <th>Upload By</th>               
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from files") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $file_id = $row['file_id'];
                                        $teacher_id = $row['teacher_id'];
                                        $class_id = $row['class_id'];

                                        $teacher_query = mysqli_query($conn,"select * from teacher where teacher_id='$teacher_id'") or die(mysqli_error());
                                        $teacher_row = mysqli_fetch_array($teacher_query);

                                        $class_query = mysqli_query($conn,"select * from class where class_id='$class_id'") or die(mysqli_error());
                                        $class_row = mysqli_fetch_array($class_query);
                                        ?>
                                        <tr class="odd gradeX">


                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                    
                                            $('#d<?php echo $file_id; ?>').tooltip('show')
                                            $('#d<?php echo $file_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    
                                    <td width="80"><?php echo $row['fname']; ?></td> 
                                    <td width="100"><?php echo $row['fdesc']; ?></td> 
                                    <td width="80"><?php echo $row['fdatein']; ?></td> 
                                    <td width="60"><?php echo $teacher_row['firstname'] . "" . $teacher_row['lastname']; ?></td> 
                                    <td width="80"><?php echo $class_row['course_id']; ?></td> 
                                    <td width="50">
                                        <a rel="tooltip"  title="Delete Material" id="d<?php echo $file_id; ?>" href="#course_id<?php echo $file_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-trash icon-large"></i></a>
                                  
                                    </td>

                                    <div id="course_id<?php echo $file_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-info">Are you sure w to <strong>Delete</strong>&nbsp; this File?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_file.php<?php echo '?id=' . $file_id; ?>" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                        </div>
                                    </div>

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>






</body>
</html>



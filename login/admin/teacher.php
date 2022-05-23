<?php include('header2.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">

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

                    <div class="span2">

                    <a href="add_teacher.php" class="btn btn-info"><i class="icon-plus-sign-alt"></i>&nbsp;Add Teacher</a>
                    <br><br>

                    </div>

                    <div class="span9">
                        <div class="hero-unit-3">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <strong>&nbsp;Teachers</strong>
                                </div>
                                <thead>
                                    <tr>


                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Telegram</th>
                                        <th>Department</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from teacher") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $teacher_id = $row['teacher_id'];
                                        ?>
                                        <tr class="odd gradeX">


                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                
                                            $('#e<?php echo $teacher_id; ?>').tooltip('show')
                                            $('#e<?php echo $teacher_id; ?>').tooltip('hide')
                                        });
                                    </script>

                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                
                                            $('#d<?php echo $teacher_id; ?>').tooltip('show')
                                            $('#d<?php echo $teacher_id; ?>').tooltip('hide')
                                        });
                                    </script>


                                    <td width="40"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="30"></td> 
                                    <td><?php echo $row['username']; ?></td> 
                                    <td><?php echo $row['password']; ?></td> 
                                    <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td> 
                                    <td><?php echo $row['telegram']; ?></td> 
                                    <td><?php echo $row['department']; ?></td> 

                                    <td width="100">
                                        <a rel="tooltip"  title="Delete Teacher" id="d<?php echo $teacher_id; ?>" href="#course_id<?php echo $teacher_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;</a>
                                        <a rel="tooltip"  title="Edit Teacher" id="e<?php echo $teacher_id; ?>" href="edit_teacher.php<?php echo '?id='.$teacher_id; ?>" class="btn btn-info"><i class="icon-pencil icon-large"></i>&nbsp;</a>
                                    </td>

                                    <div id="course_id<?php echo $teacher_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-info">Are you sure want to <strong>Delete</strong>&nbsp;this Teacher?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_teacher.php<?php echo '?id=' . $teacher_id; ?>" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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
        </div>
    </div>





</body>
</html>



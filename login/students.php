<?php
include('header2.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
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



                <a href="teacher_add_student.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Student</a>
                <br>
                <br>

                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <strong>&nbsp;Students</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Name</th>

                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn,"select * from teacher_student where teacher_id = '$session_id'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $student_id = $row['student_id'];
                                $student_query = mysqli_query($conn,"select * from student where student_id = '$student_id'") or die(mysqli_error());
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


                            <td><?php echo $student_row['firstname'] . " " . $student_row['middle_name'] . " " . $student_row['lastname']; ?></td>

                            <td width="50"><img class="img img-rounded" src="<?php echo $student_row['location']; ?>" width="50" height="50"></td>
                            <td width="100">
                                <a rel="tooltip"  title="View More Info" id="e<?php echo $student_id; ?>" href="#view<?php echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-align-justify icon-large"></i></a>
                                <a  rel="tooltip"  title="Delete Student" id="d<?php echo $student_id; ?>" href="#teacher<?php echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;</a>

                            </td>

                            <div id="teacher<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">Are you sure w to <strong>Delete</strong>&nbsp;this Student?</div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="delete_teacher_students.php<?php echo '?id=' . $student_id; ?>" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                </div>
                            </div>



                            <div id="view<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info"> <strong>Student Information</strong></div>
                                    <div class="span12">
                                        <div class="span6">
                                            <p>  Name:&nbsp;<strong><?php echo $student_row['firstname'] . " " . $student_row['middle_name'] . " " . $student_row['lastname']; ?></strong> </p>
                                        </div>
                                        <div class="span6">
                                            <img class="img img-rounded" src="<?php echo $student_row['location']; ?>" width="250">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

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



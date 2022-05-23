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

                <a href="teacher_add_subject.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Subject</a>
                <br>
                <br>
                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <strong>&nbsp;Subjects</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Course Code</th>
                                <th>Course Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $teacher_subject_query = mysqli_query($conn,"select * from teacher_subject where teacher_id='$session_id'") or die(mysqli_error());
                            $teacher_row = mysqli_fetch_array($teacher_subject_query);
                            $subject_id = $teacher_row['subject_id'];

                            $query = mysqli_query($conn,"select * from subject where subject_id  in (select subject_id from teacher_subject where teacher_id='$session_id')") or die(mysqli_error());
                            while ($row = mysqli_fetch_assoc($query)) {
                                $id = $row['subject_id'];
                                ?>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                
                                    $('#d<?php echo $subject_id; ?>').tooltip('show')
                                    $('#d<?php echo $subject_id; ?>').tooltip('hide')
                                });
                            </script>


                            <script type="text/javascript">
                                $(document).ready(function(){
                                
                                    $('#e<?php echo $subject_id; ?>').tooltip('show')
                                    $('#e<?php echo $subject_id; ?>').tooltip('hide')
                                });
                            </script>


                                <tr class="odd gradeX">

                                    <td><?php echo $row['subject_code']; ?></td> 
                                    <td><?php echo $row['subject_title']; ?></td> 

                                    <td width="50">
                                        <a rel="tooltip"  title="Delete Subject" id="d<?php echo $subject_id; ?>" href="#id<?php echo $id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;</a>
                                       
                                    </td>

                            <div id="id<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">Are you sure want to <strong>Delete</strong>&nbsp; this Subject?</div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="delete_teacher_course.php<?php echo '?id='.$subject_id; ?>" class="btn btn-info"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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



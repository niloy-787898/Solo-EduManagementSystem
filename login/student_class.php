<?php
include('header2.php');
include ('session.php');
$user_query = mysqli_query($conn,"select * from student where student_id='$session_id'") or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
?>
<body>

    <?php include('navhead_student.php'); ?>

    <div class="container">
        <div class="row-fluid">


            <div class="span12">

                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <strong>&nbsp;My Classes</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Whatsapp Number</th>
                                <th>Telegram Group</th>
                                <th>Class Link</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = mysqli_query($conn,"select * from sws where  student_id='$session_id'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $class_id = $row['class_id'];
                                $teacher_id = $row['teacher_id'];

                                $teacher_query = mysqli_query($conn,"select * from teacher where teacher_id='$teacher_id'") or die(mysqli_error());
                                $teacher_row = mysqli_fetch_array($teacher_query);
                                ?>
                                <tr class="odd gradeX">


                                    <td><?php echo $row['cys']; ?></td>
                                    <td><a rel="tooltip"  title="View Class" id="v<?php echo $class_id; ?>"  href="class_student.php<?php echo '?id=' . $class_id; ?>" class="btn btn-info">&nbsp;<i class="icon-file-alt icon-large"></i>&nbsp;<?php echo $row['subject_id']; ?></a></td> 
                                    <td><?php echo $teacher_row['firstname'] . " " . $teacher_row['lastname']; ?></td>   
                                    <td><?php echo $teacher_row['whatsapp'] ?></a></td>    
                                    <td><a href="http://<?php echo $teacher_row['telegram'] ?>"><?php echo $teacher_row['telegram'] ?></a></td>     
                                    <td><a href="http://<?php echo $teacher_row['class_link'] ?>"><?php echo $teacher_row['class_link'] ?></a></td>   


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



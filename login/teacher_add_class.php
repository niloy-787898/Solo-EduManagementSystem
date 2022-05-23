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

                        <li><a href="teacher_subject.php"><i class="icon-book icon-large"></i>&nbsp;&nbsp; Subjects</a>                
                        </li>

                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;&nbsp; Students</a>                
                        </li>

                    </ul>
                </div>


                <br>

            </div>


            <div class="span9">

                <a href="teacher_class.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                <br>
                <br>

                <div class="hero-unit-3">
                <div class="alert alert-info">
                    <strong>&nbsp;Add Class</strong>
                </div>
                    <form class="form-horizontal" method="POST">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Class</label>
                            <div class="controls">

                                <select name="cys" class="span5" required>
                                    <option></option>
                                    <?php
                                    $query = mysqli_query($conn,"select * from course") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <option><?php echo $row['cys']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Subject</label>
                            <div class="controls">

                                <select name="subject" class="span6" required>
                                    <option></option>
                                    <?php
                                    $teacher_subject_query = mysqli_query($conn,"select * from teacher_subject") or die(mysqli_error());
                                    $teacher_row = mysqli_fetch_array($teacher_subject_query);
                                    $subject_id = $teacher_row['subject_id'];

                                    $query = mysqli_query($conn,"select * from subject where subject_id in (select subject_id from teacher_subject)") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <option><?php echo $row['subject_title']; ?></option>
                                    <?php } ?>
                                    <input type="hidden" name="teacher_id" value="<?php echo $session_id; ?>">
                                </select>
                            </div>
                        </div>

                     


                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="save_class" class="btn btn-info"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Class</button>
                            </div>
                            <?php
                            if (isset($_POST['save_class'])) {
                               
                                $subject = $_POST['subject'];
                                $cys = $_POST['cys'];
                                $teacher_id = $_POST['teacher_id'];

                                mysqli_query($conn,"insert into class (subject_id,course_id,teacher_id) values('$subject','$cys','$teacher_id')") or die(mysqli_error());
                                echo('<script>location.href = "teacher_class.php"</script>');
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
</div>


</body>
</html>


